<?php

namespace App\Services;


use App\Models\Member;

class MemberService{

    /**
     * 会員を各ページ10で取得
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getMembers()
    {
        $membersPerPage = 10;

        return Member::orderBy('created_at', 'desc')->paginate($membersPerPage);
    }
}
