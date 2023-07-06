<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService{

    /**
     * 管理者ユーザーをページネーション込みで取得。
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAdminUsers()
    {
        $pageNum = 6;

        return Admin::orderBy('updated_at', 'desc')->paginate($pageNum);
    }


}
