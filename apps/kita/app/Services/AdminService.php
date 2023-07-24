<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService{

    /**
     * 管理者ユーザーをページネーション込みで取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAdminUsers()
    {
        $pageNum = 6;

        return Admin::orderBy('updated_at', 'desc')->paginate($pageNum);
    }

    /**
     * 新しい管理者を保存
     *
     * @param array $data
     * @return Admin
     */

    public function saveNewAdmin(array $data)
    {
        $admin = new Admin();

        $admin->fill([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $admin->save();

        return $admin;
    }

    /**
     * idをベースにadminを取得
     *
     * @param int $id
     * @return Admin
     */
    public function getAdminById(int $id)
    {
        $admin = Admin::find($id);

        return $admin;
    }

    /**
     * adminを削除
     *
     * @param int $id;
     * @return void
     */
    public function deleteAdmin(int $id)
    {
        $admin = $this->getAdminById($id);
        $admin->delete();
    }
}
