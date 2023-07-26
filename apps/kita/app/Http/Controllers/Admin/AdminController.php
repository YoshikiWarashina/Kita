<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchRequest;
use App\Services\AdminService;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\UpdateRequest;

class AdminController extends Controller
{
    /**
     * admin users一覧表示(ページネーション6)
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $adminService = new AdminService();
        $admins = $adminService->getAdminUsers();

        return view('admin.admin_users', compact('admins'));
    }


    /**
     * admin users新規登録ページへの遷移
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function create() : object
    {
        return view('admin.admin_users.create');
    }

    /**
     * 新規のadmin userをテーブルに格納し、編集画面にリダイレクト
     *
     * @param \App\Http\Requests\Admin\CreateRequest $request
     * @param \App\Services\AdminService $adminService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request, AdminService $adminService)
    {
        $validatedData = $request->validated();
        $admin = $adminService->saveNewAdmin($validatedData);

        // 保存した後のIDを取得する
        $adminId = $admin->id;

        // 編集画面にリダイレクトする
        return redirect('admin/admin_users/'.$adminId.'/edit')->with('message', '登録処理が完了しました')->with('admin', $admin);
    }


    /**
     * admin userの編集ページ表示
     *
     * @param \App\Services\AdminService $adminService
     * @param int $adminId
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(AdminService $adminService, int $adminId)
    {
        $admin = $adminService->getAdminById($adminId);

        // 編集画面の表示処理
        return view('admin.admin_users.edit', compact('admin'));
    }

    /**
     * admin userの情報を更新し、編集ページへ遷移
     *
     * @param \App\Services\AdminService $adminService
     * @param App\Http\Requests\Admin\UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminService $adminService, UpdateRequest $request, int $id)
    {
        $validatedData = $request->validated();

        $admin = $adminService->updateAdmin($id, $validatedData);

        $adminId = $admin->id;

        return redirect('admin/admin_users/'. $adminId . '/edit')->with('message', '更新処理が完了しました')->with('admin', $admin);
    }


    /**
     * admin userを削除し、一覧へ遷移
     *
     * @param \App\Services\AdminService $adminService
     * @param int $adminId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AdminService $adminService, int $adminId)
    {
        $adminService->deleteAdmin($adminId);

        return redirect('admin/admin_users')->with('message', '削除処理が完了しました');
    }


    /**
     * 検索ワードを受け取って検索に合致するものをViewに返す
     *
     * @param \App\Services\AdminService $adminService
     * @param App\Http\Requests\Admin\SearchRequest $searchRequest
     * @return \Illuminate\Contracts\View\View
     */
    public function search(AdminService $adminService, SearchRequest $searchRequest)
    {
        $keywords = $searchRequest->only(['last_name', 'first_name', 'email']);

        $escapedKeyword = $adminService->escapeKeyword($keywords);

        $admins = $adminService->getSearchedAdmins($escapedKeyword);

        return view('admin.admin_users', compact('admins'));
    }

}
