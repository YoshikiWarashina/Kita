<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Services\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     *ユーザー用プロフィール画面の表示
     *
     * @return View
     */
    public function edit(): View
    {
        $member = Auth::user();
        return view('user.profile', compact('member'));
    }


    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param ProfileService $profileService;
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileService $profileService, UpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $profileService->updateMemberProfile($validatedData);

        return redirect('profile')->with('message', 'プロフィールを更新しました');
    }
}
