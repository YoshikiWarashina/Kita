<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService{

    /**
     * 記事一覧をページネーション込みで取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArticles()
    {
        $articlesPerPage = 10;

        return Article::orderBy('updated_at', 'desc')->paginate($articlesPerPage);
    }

    /**
     * 自分自身の記事をページネーション込みで取得
     *
     * @return LengthAwarePaginator
     */

    public function getMyArticles()
    {
        $articlesPerPage = 10;
        $user = auth()->user();

        return $user->articles()->orderBy('updated_at', 'desc')->paginate($articlesPerPage);

    }

    /**
     * 検索ワードをエスケープ
     *
     * @param string $keyword
     * @return string
     */
    private function escapeKeyword(string $keyword)
    {
        $escapedKeyword = '%' . addcslashes($keyword, '%_\\') . '%';

        return $escapedKeyword;
    }

    /**
     * 記事の部分一致検索結果一覧をページネーション込みで取得
     *
     * @param string $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedArticles(string $keyword)
    {
        $articlesPerPage = 10;

        $escapedKeyword = $this->escapeKeyword($keyword);

        return Article::where('title', 'like', "%$escapedKeyword%")
            ->orWhere('contents', 'like', "%$escapedKeyword%")
            ->orderBy('updated_at', 'desc')
            ->paginate($articlesPerPage);
    }

    /**
     * 新しい記事を保存したあと、タグを関連付ける
     *
     * @param array $data
     * @return Article
     * @throws Exception
     */
    public function saveNewArticle(array $data)
    {
        DB::beginTransaction();

        try {
            $article = new Article();

            $article->fill([
                'title' => $data['title'],
                'contents' => $data['contents'],
                'member_id' => Auth::id(),
            ]);

            $article->save();

            // タグの関連付け(created_at updated_at込み)
            if (isset($data['tags']) && is_array($data['tags'])) {
                $tags = $data['tags'];

                foreach ($tags as $tag) {
                    $article->tags()->attach($tag);
                }
            }
            // トランザクションのコミット
            DB::commit();
            return $article;

        } catch (\Exception $e) {
            // トランザクションのロールバック
            DB::rollback();
            throw $e;
        }
    }

    /**
     * 投稿後の記事を編集ページで表示
     *
     * @param int $article_id
     * @return Article
     */

    public function getArticleById($article_id)
    {
        $article = Article::find($article_id);

        return $article;
    }

    /**
     * 認証ユーザーと記事が一致している場合取得
     *
     * @param int $article_id
     * @param int $userId
     * @return Article
     */

    public function isUserArticle(int $articleId, int $userId)
    {
        $article = Article::where('id', $articleId)->where('member_id', $userId)->exists();
        return $article;
    }

    /**
     * 更新する記事を保存
     *
     * @param int $articleId;
     * @param array $data
     * @return Article
     * @@throws Exception
     */
    public function updateArticle(int $articleId, array $data)
    {
        DB::beginTransaction();

        try {
            $article = $this->getArticleById($articleId);

            $article->update([
                'title' => $data['title'],
                'contents' => $data['contents'],
            ]);

            $tags = [];

            // タグの関連付け(if文: タグあり、それ以外: タグなし)
            if (isset($data['tags']) && is_array($data['tags'])) {
                $tags = $data['tags'];
            }

            $article->tags()->sync($tags);
            DB::commit();

            return $article;

        } catch (\Exception $e) {
            // トランザクションのロールバック
            DB::rollback();
            throw $e;
        }
    }

    /**
     * 記事を削除
     *
     * @param int $articleId;
     * @return void
     */
    public function deleteArticle(int $articleId)
    {
        $article = $this->getArticleById($articleId);
        $article->delete();
    }

    /**
     * 記事とコメントを同時取得
     *
     * @param int $article_id
     * @return \Illuminate\Database\Eloquent\Model
     *
     **/
    public function getArticleWithCommentsById(int $article_id)
    {
        $article = Article::with(['comments' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])
            ->find($article_id);

        return $article;
    }
}
