<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchRequest;
use App\Services\AdminService;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\UpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * admin users一覧表示(ページネーション6)
     * @param AdminService $adminService
     * @param SearchRequest $searchRequest
     * @return View
     */
    public function index(AdminService $adminService, SearchRequest $searchRequest): View
    {
        $keywords = $searchRequest->only(['last_name', 'first_name', 'email']);

        //if 検索機能, else 一覧表示
        if (!empty($keywords)) {
            $admins = $adminService->getSearchedAdmins($keywords);
        }else{
            $admins = $adminService->getAdminUsers();

        }
        return view('admin.admin_users', compact('admins'));
    }


    /**
     * admin users新規登録ページへの遷移
     *
     * @return View
     */

    public function create(): View
    {
        return view('admin.admin_users.create');
    }

    /**
     * 新規のadmin userをテーブルに格納し、編集画面にリダイレクト
     *
     * @param CreateRequest $request
     * @param AdminService $adminService
     * @return RedirectResponse
     */
    public function store(CreateRequest $request, AdminService $adminService): RedirectResponse
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
     * @param AdminService $adminService
     * @param int $adminId
     * @return View
     */
    public function edit(AdminService $adminService, int $adminId): View
    {
        $admin = $adminService->getAdminById($adminId);

        // 編集画面の表示処理
        return view('admin.admin_users.edit', compact('admin'));
    }

    /**
     * admin userの情報を更新し、編集ページへ遷移
     *
     * @param AdminService $adminService
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(AdminService $adminService, UpdateRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $admin = $adminService->updateAdmin($id, $validatedData);

        $adminId = $admin->id;

        return redirect('admin/admin_users/'.$adminId.'/edit')->with([
            'message' => '更新処理が完了しました',
            'admin' => $admin,
        ]);
    }


    /**
     * admin userを削除し、一覧へ遷移
     *
     * @param AdminService $adminService
     * @param int $adminId
     * @return RedirectResponse
     */
    public function destroy(AdminService $adminService, int $adminId): RedirectResponse
    {
        $adminService->deleteAdmin($adminId);

        return redirect('admin/admin_users')->with('message', '削除処理が完了しました');
    }

}
