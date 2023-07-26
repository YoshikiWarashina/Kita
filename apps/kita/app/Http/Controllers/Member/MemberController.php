<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\SearchRequest;
use App\Services\MemberService;

class MemberController extends Controller
{
    /**
     * 会員一覧表示
     *
     * @param App\Services\MemberService $memberService
     * @param App\Http\Requests\Member\SearchRequest $searchRequest
     * @return \Illuminate\Contracts\View\View
     */
    public function index(MemberService $memberService, SearchRequest $searchRequest)
    {
        $keywords = $searchRequest->only(['name', 'email']);

        if (!empty($keywords)) {
            $escapedKeyword = $memberService->escapeKeyword($keywords);
            $members = $memberService->getSearchedMembers($escapedKeyword);
        }else{
            $members = $memberService->getMembers();
        }

        return view('admin.users', compact('members'));
    }
}
