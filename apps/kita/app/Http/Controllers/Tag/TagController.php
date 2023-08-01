<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\SearchRequest;
use App\Http\Requests\Tag\UpdateRequest;
class TagController extends Controller
{
    /**
     * タグ一覧表示
     * @param App\Services\TagService
     * @param App\Http\Requests\Tag\SearchRequest
     * @return \Illuminate\Contracts\View\View
     */
    public function index(TagService $tagService, SearchRequest $request)
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
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.article_tags.create');
    }

    /**
     * タグ新規登録
     *
     * @param App\Http\Requests\Tag\CreateRequest
     * @param App\Services\TagService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request, TagService $tagService)
    {
        $validatedData = $request->validated();
        $tag = $tagService->saveNewTag($validatedData);

        $tagId = $tag->id;

        return redirect('admin/article_tags/' . $tagId . '/edit')->with([
            'message' => '登録処理が完了しました',
            'tag' => $tag,
        ]);
    }

    /**
     * タグ編集画面表示
     * @param App\Services\TagService
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(TagService $tagService, int $id)
    {
        $tag = $tagService->getTagById($id);

        return view('admin.article_tags.edit',compact('tag'));
    }

    /**
     * タグをアップデートし、リダイレクト
     *
     * @param App\Services\TagService
     * @param App\Http\Requests\Tag\UpdateRequest
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagService $tagService, UpdateRequest $request, int $id)
    {
        $validatedData = $request->validated();

        $tag = $tagService->updateTag($id, $validatedData);

        $tagId = $tag->id;

        return redirect('admin/article_tags/'.$tagId.'/edit')->with([
            'message' => '更新処理が完了しました',
            'tag' => $tag,
        ]);
    }
}
