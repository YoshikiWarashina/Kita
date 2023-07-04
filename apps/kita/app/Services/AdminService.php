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

    public function getNewAdmin(array $data)
    {
        $admin = new Admin();

        $admin->first_name = $data['first_name'];
        $admin->last_name = $data['last_name'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);

        return $admin;
    }


}
