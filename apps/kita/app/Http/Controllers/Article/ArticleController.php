<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 記事一覧表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getArticles();

        return view('articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * keywordを受け取り、返ってきた検索結果をview渡す。
     *
     * @param  ArticleService  $articleService
     * @param  SearchRequest  $searchRequest
     * @return \Illuminate\Contracts\View\View
     */
    public function search(ArticleService $articleService, SearchRequest $searchRequest)
    {
        $keyword = $searchRequest->input('keyword');
        $articles = $articleService->getSearchedArticles($keyword);

        return view('articles.articles', compact('articles'));
    }
}
