<?php

namespace App\Services;

use App\Models\Member;
class ProfileService
{
    /**
     * 現在のユーザー情報を取得
     *
     * @param int $memberId
     * @return Member
     */
    public function getMemberById(int $memberId)
    {
        $member = Member::find($memberId);

        return $member;
    }
}
