<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
    public function updatePassword(array $data)
    {
        $member = Auth::user();

        $member->update([
            'password' => Hash::make($data['password']),
        ]);

        return $member;
    }
}

