<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\SearchRequest;
use App\Http\Requests\Tag\UpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * タグ一覧表示
     * @param TagService $tagService
     * @param SearchRequest $request
     * @return View
     */
    public function index(TagService $tagService, SearchRequest $request): View
    {
        $keyword = $request->input('name');

        if(!empty($keyword)){
            $tags = $tagService->getSearchedTags($keyword);
        }else{
            $tags = $tagService->getTags();
        }

        return view('admin.article_tags', compact('tags'));
    }

    /**
     * タグ新規登録ページ表示
     * @return View
     */
    public function create(): View
    {
        return view('admin.article_tags.create');
    }

    /**
     * タグ新規登録
     *
     * @param CreateRequest $request
     * @param TagService $tagService
     * @return RedirectResponse
     */
    public function store(CreateRequest $request, TagService $tagService): RedirectResponse
    {
        $validatedData = $request->validated();
        $tag = $tagService->saveTag($validatedData);

        $tagId = $tag->id;

        return redirect('admin/article_tags/' . $tagId . '/edit')->with([
            'message' => '登録処理が完了しました',
            'tag' => $tag,
        ]);
    }

    /**
     * タグ編集画面表示
     * @param TagService $tagService
     * @param int $id
     * @return View
     */
    public function edit(TagService $tagService, int $id): View
    {
        $tag = $tagService->getTagById($id);

        return view('admin.article_tags.edit',compact('tag'));
    }

    /**
     * タグをアップデートし、リダイレクト
     *
     * @param TagService $tagService
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TagService $tagService, UpdateRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $tag = $tagService->updateTag($id, $validatedData);

        $tagId = $tag->id;

        return redirect('admin/article_tags/'.$tagId.'/edit')->with([
            'message' => '更新処理が完了しました',
            'tag' => $tag,
        ]);
    }

    /**
     * タグ削除
     * @param TagService $tagService
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(TagService $tagService, int $id): RedirectResponse
    {
        $tagService->deleteTag($id);

        return redirect('admin/article_tags')->with('message', 'タグを削除しました');
    }
}
