<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\UpdatepassRequest;
use App\Services\PasswordService;

class PasswordController extends Controller
{
    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param PasswordService $passwordService;
     * @param UpdatepassRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PasswordService $passwordService, UpdatepassRequest $request)
    {
        $validatedData = $request->validated();

        $passwordService->updatePassword($validatedData);

        return redirect('profile')->with('message', 'パスワードを更新しました');
    }
}
