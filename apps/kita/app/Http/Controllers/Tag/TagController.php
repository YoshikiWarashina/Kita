<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\TagService;

class TagController extends Controller
{
    /**
     * タグ一覧表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(TagService $tagService)
    {
        $tags = $tagService->getTags();

        return view('admin.article_tags', compact('tags'));
    }
}
