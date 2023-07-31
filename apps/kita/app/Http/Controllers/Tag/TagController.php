<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\SearchRequest;
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

    public function edit(TagService $tagService, int $id)
    {
        $tag = $tagService->getTagById($id);

        return view('admin.article_tags.edit',compact('tag'));
    }
}
