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
     * adminの情報を更新
     *
     * @param int $id
     * @param array $data
     * @return Admin
     */
    public function updateAdmin(int $id, array $data)
    {
        $admin = $this->getAdminById($id);

        $admin->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

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

    public function escapeKeyword(array $keywords)
    {
        $escapedKeywords = [];
        foreach ($keywords as $field => $keyword) {
            $escapedKeywords[$field] = '%' . addcslashes($keyword, '%_\\') . '%';
        }
        return $escapedKeywords;
    }

    public function getSearchedAdmins(array $keywords)
    {
        $query = Admin::query();

        $adminPerPage = 6;

        // 各フィールドに対して部分一致の検索条件を追加
        foreach ($keywords as $field => $keyword) {
            $query->where($field, 'LIKE', '%' . $keyword . '%');
        }

        // 検索結果を取得
        $results = $query->paginate($adminPerPage);

        return $results;
    }
}
