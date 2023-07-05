<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * admin users一覧表示(ページネーション6)
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pageNum = 6;
        $admins = Admin::orderBy('updated_at', 'desc')->paginate($pageNum);

        return view('admin.admin_users', compact('admins'));
    }

    public function create() : object
    {
        return view('admin.admin_users.create');
    }
}
