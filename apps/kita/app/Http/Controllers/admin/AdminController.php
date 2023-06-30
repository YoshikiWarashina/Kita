<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
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
