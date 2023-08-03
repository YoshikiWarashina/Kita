<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Services\ArticleService;
use App\Services\TagService;
use App\Http\Requests\Article\CreateRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * 記事一覧表示/検索
     *
     * @param App\Services\ArticleService $articleService
     * @param App\Http\Requests\Article\SearchRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ArticleService $articleService, SearchRequest $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $articles = $articleService->getSearchedArticles($search);
        }else{
            $articles = $articleService->getArticles();

        }

        return view('articles.articles', compact('articles'));
    }

    /**
     * タグとともに新規投稿ページを表示
     *
     * @param \App\Services\TagService
     * @return \Illuminate\Contracts\View\View
     */
    public function create(TagService $tagService)
    {
        $tags = $tagService->getTagsForArticle();

        return view('articles.create', compact('tags'));
    }


    /**
     * 記事をテーブルに保存
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

        return redirect('articles/'.$articleId.'/edit')->with([
            'message' => '記事投稿が完了しました',
            'article' => $article
        ]);
    }

    /**
     * 記事詳細ページ表示
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
     * 記事編集ページ表示
     *
     * @param  \App\Services\ArticleService $articleService
     * @param  \App\Services\TagService $tagService
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(ArticleService $articleService, TagService $tagService, int $id)
    {
        $article = $articleService->getArticleById($id);
        $tags = $tagService->getTagsForArticle();

        return view('articles.edit', compact('article', 'tags'));
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

        $article = $articleService->updateArticle($id, $validatedData);

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

}
