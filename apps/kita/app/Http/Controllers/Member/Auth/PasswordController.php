<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\UpdatepassRequest;
use App\Services\PasswordService;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param PasswordService $passwordService;
     * @param UpdatepassRequest $request
     * @return RedirectResponse
     */
    public function update(PasswordService $passwordService, UpdatepassRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $passwordService->updatePassword($validatedData);

        return redirect('profile')->with('message', 'パスワードを更新しました');
    }
}
