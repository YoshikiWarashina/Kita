<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
    /**
     * password更新
     * @param array $data
     * @return Authenticatable
     */
    public function updatePassword(array $data): Authenticatable
    {
        $member = Auth::user();

        $member->update([
            'password' => Hash::make($data['password']),
        ]);

        return $member;
    }
}

