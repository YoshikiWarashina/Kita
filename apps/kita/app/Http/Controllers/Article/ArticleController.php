<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Services\ArticleService;
use App\Services\TagService;
use App\Http\Requests\Article\CreateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Article\DeleteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * 記事一覧表示/検索
     *
     * @param ArticleService $articleService
     * @param SearchRequest $request
     * @return View
     */
    public function index(ArticleService $articleService, SearchRequest $request): View
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
     * @param TagService $tagService
     * @return View
     */
    public function create(TagService $tagService): View
    {
        $tags = $tagService->getTagsForArticle();

        return view('articles.create', compact('tags'));
    }


    /**
     * 記事をテーブルに保存
     *
     * @param ArticleService $articleService
     * @param CreateRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(ArticleService $articleService, CreateRequest $request): RedirectResponse
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
     * @param ArticleService $articleService
     * @param  int  $id
     * @return View
     */
    public function show(ArticleService $articleService, int $id): View
    {
        $article = $articleService->getArticleWithCommentsById($id);

        return view('articles.detail', compact('article'));
    }

    /**
     * 記事編集ページ表示
     *
     * @param ArticleService $articleService
     * @param TagService $tagService
     * @param  int  $id
     * @return View
     */
    public function edit(ArticleService $articleService, TagService $tagService, int $id): View
    {
        $article = $articleService->getArticleById($id);
        $tags = $tagService->getTagsForArticle();

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * 記事の更新
     *
     * @param ArticleService $articleService
     * @param UpdateRequest $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(ArticleService $articleService, UpdateRequest $request, int $id): RedirectResponse
    {
        if (!$articleService->isUserArticle($id, Auth::id())) {
            return redirect('articles/'.$id)->withErrors(['error' => '他のユーザーの記事は編集できません']);
        }

        $validatedData = $request->validated();

        $article = $articleService->updateArticle($id, $validatedData);

        $articleId = $article->id;

        return redirect('articles/'.$articleId.'/edit')->with([
            'message'=> '記事編集が完了しました',
            'article'=> $article
        ]);
    }

    /**
     * 記事削除
     *
     * @param ArticleService $articleService
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(ArticleService $articleService, int $id): RedirectResponse
    {
        if (!$articleService->isUserArticle($id, Auth::id())) {
            return redirect('articles/'.$id)->withErrors(['error' => '他のユーザーの記事は削除できません']);
        }
        $articleService->deleteArticle($id);

        return redirect('articles')->with('message', '記事を削除しました');
    }

    /**
     * 自分自身の記事一覧
     *
     * @param ArticleService $articleService
     * @return View
     */
    public function listMyArticles(ArticleService $articleService): View
    {
        $articles = $articleService->getMyArticles();

        return view('articles.mypage', compact('articles'));
    }


    /**
     * 自分自身の記事削除
     *
     * @param ArticleService $articleService
     * @param DeleteRequest $request
     * @return JsonResponse
     */

    public function deleteSelected(ArticleService $articleService, DeleteRequest $request): JsonResponse
    {
        $selectedArticles = $request->input('selected_articles', []);

        // 選択された記事を削除
        $articleService->deleteSelectedArticles($selectedArticles);

        Session::flash('message', '選択した記事の削除が完了しました');

        return response()->json();
    }

}
