<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ArticleService{

    /**
     * 記事一覧をページネーション込みで取得.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArticles()
    {
        $articlesPerPage = 10;

        return Article::orderBy('updated_at', 'asc')->paginate($articlesPerPage);
    }

    /**
     * 記事の部分一致検索結果一覧をページネーション込みで取得.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedArticles($keyword)
    {
        $articlesPerPage = 10;

        return Article::where('title', 'like', "%$keyword%")
            ->orWhere('contents', 'like', "%$keyword%")
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
}
