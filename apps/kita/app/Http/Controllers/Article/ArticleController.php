<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Requests\Article\DeleteRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Requests\Article\CreateRequest;
use Illuminate\Support\Facades\Auth;

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
        $article = $articleService->getArticleWithCommentsById($id);

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
     * @param  \App\Services\ArticleService  $articleService
     * @param  \App\Http\Requests\Article\UpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleService $articleService, UpdateRequest $request, int $id)
    {
        if (!$articleService->isUserArticle($id, Auth::id())) {
            return redirect('articles/'.$id)->withErrors(['error' => '他のユーザーの記事は編集できません']);
        }

        $validatedData = $request->validated();

        $article = $articleService->saveUpdatedArticle($id, $validatedData);

        $articleId = $article->id;
        return redirect('articles/'.$articleId.'/edit')->with('message', '記事編集が完了しました')->with('article', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ArticleService $articleService
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArticleService $articleService, int $id)
    {
        if (!$articleService->isUserArticle($id, Auth::id())) {
            return redirect('articles/'.$id)->withErrors(['error' => '他のユーザーの記事は削除できません']);
        }
        $articleService->deleteArticle($id);

        return redirect('articles')->with('message', '記事を削除しました');
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
