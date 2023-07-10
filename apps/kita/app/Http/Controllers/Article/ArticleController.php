<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Requests\Article\CreateRequest;

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
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Services\ArticleService  $articleService
     * @param  App\Http\Requests\Article\CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleService $articleService, CreateRequest $request)
    {
        $validatedData = $request->validated();
        $article = $articleService->saveNewArticle($validatedData);

        $articleId = $article->id;
        return redirect('articles/'.$articleId.'/edit')->with('message', '記事投稿が完了しました')->with('article', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\ArticleService  $articleService
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(ArticleService $articleService, int $id)
    {
        $article = $articleService->getArticleById($id);

        return view('articles.detail', compact('article'));
    }

    /**
     *
     * @param  \App\Services\ArticleService  $articleService
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     * Show the form for editing the specified resource.
     *
     */
    public function edit(ArticleService $articleService, int $id)
    {
        $article = $articleService->getArticleById($id);

        return view('articles.edit', ['article' => $article]);
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
        $search = $searchRequest->input('search');
        $articles = $articleService->getSearchedArticles($search);

        return view('articles.articles', compact('articles'));
    }
}
