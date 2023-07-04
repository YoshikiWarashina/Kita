<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\CreateRequest;

class AdminController extends Controller
{
    /**
     * admin users一覧表示
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
     * dmin users新規登録ページへの遷移
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create() : object
    {
        return view('admin.admin_users.create');
    }
}
