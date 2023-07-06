<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class ArticleService{

    /**
     * 記事一覧をページネーション込みで取得.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArticles()
    {
        $articlesPerPage = 10;

        return Article::orderBy('updated_at', 'desc')->paginate($articlesPerPage);
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

}
