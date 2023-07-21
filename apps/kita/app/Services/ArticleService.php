<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
class ArticleService{

    /**
     * 記事一覧をページネーション込みで取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArticles()
    {
        $articlesPerPage = 10;

        return Article::orderBy('updated_at', 'asc')->paginate($articlesPerPage);
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

        return Article::where('title', 'like', "%$keyword%")
            ->orWhere('contents', 'like', "%$keyword%")
            ->orderBy('updated_at', 'desc')
            ->paginate($articlesPerPage);
    }

    /**
     * 新しい記事を保存
     *
     * @param array $data
     * @return Article
     */
    public function saveNewArticle(array $data)
    {
        $article = new Article();

        $article->fill([
            'title' => $data['title'],
            'contents' => $data['contents'],
            'member_id' => Auth::id(),
        ]);

        $article->save();

        return $article;
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
     */
    public function updateArticle(int $articleId, array $data)
    {
        $article = $this->getArticleById($articleId);


        $article->update([
            'title' => $data['title'],
            'contents' => $data['contents'],
        ]);

        return $article;
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
