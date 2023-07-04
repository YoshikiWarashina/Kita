<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService{

    public function getAdminUsers()
    {
        $pageNum = 6;

        return Admin::orderBy('updated_at', 'desc')->paginate($pageNum);
    }


}
