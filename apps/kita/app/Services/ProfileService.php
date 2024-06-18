<?php

namespace App\Services;

use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param array $data
     * @return Authenticatable
     */
    public function updateMemberProfile(array $data): Authenticatable
    {
        $member = Auth::user();

        $member->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return $member;
    }
}
