<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\SearchRequest;
use App\Services\MemberService;
use Illuminate\Contracts\View\View;

class MemberController extends Controller
{
    /**
     * 会員一覧表示
     *
     * @param MemberService $memberService
     * @param SearchRequest $searchRequest
     * @return View
     */
    public function index(MemberService $memberService, SearchRequest $searchRequest): View
    {
        $keywords = $searchRequest->only(['name', 'email']);

        if (!empty($keywords)) {
            $members = $memberService->getSearchedMembers($keywords);
        }else{
            $members = $memberService->getMembers();
        }

        return view('admin.users', compact('members'));
    }
}
