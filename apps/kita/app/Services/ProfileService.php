<?php

namespace App\Services;

use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param array $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function updateMemberProfile(array $data)
    {
        $member = Auth::user();

        $member->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $member->save();

        return $member;
    }
}
