<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
class CommentService
{
    /**
     * 新しいコメントを保存。
     *
     * @param array $data
     * @return Comment
     */
    public function saveNewComment(array $data)
    {
        $comment = new Comment();

        $comment->fill([
            'contents' => $data['comment'],
            'member_id' => Auth::id(),
            'article_id' => $data['article_id'],
        ]);

        $comment->save();

        return $comment;
    }
}
