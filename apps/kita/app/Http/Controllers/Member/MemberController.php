<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\MemberService;

class MemberController extends Controller
{
    /**
     * 会員一覧表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(MemberService $memberService)
    {
        $members = $memberService->getMembers();

        return view('admin.users', compact('members'));
    }
}
