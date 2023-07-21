<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Services\CommentService;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \App\Services\CommentService  $commentService
     * @param  App\Http\Requests\Comment\CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentService $commentService, CreateRequest $request)
    {
        $validatedData = $request->validated();
        $comment = $commentService->saveNewComment($validatedData);

        return redirect()->route('article.show', $comment->article_id)
            ->with('message', 'コメントを投稿しました。')
            ->with('comment', $comment);
    }
}
