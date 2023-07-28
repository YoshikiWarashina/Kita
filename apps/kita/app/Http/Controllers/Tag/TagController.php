<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\TagService;
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
}
