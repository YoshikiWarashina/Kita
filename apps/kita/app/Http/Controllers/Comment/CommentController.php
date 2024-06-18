<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Services\CommentService;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param CommentService $commentService
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CommentService $commentService, CreateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $comment = $commentService->saveNewComment($validatedData);

        return redirect()->route('article.show', $comment->article_id)
            ->with('message', 'コメントを投稿しました。')
            ->with('comment', $comment);
    }
}
