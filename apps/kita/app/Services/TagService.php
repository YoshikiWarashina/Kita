<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    /**
     * タグをページネーション込みで取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTags()
    {
        $tagsPerPage = 10;

        return Tag::orderby('updated_at', 'desc')->paginate($tagsPerPage);
    }
}
