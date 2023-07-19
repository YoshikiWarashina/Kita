<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     *ユーザー用プロフィール画面の表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $member = Auth::user();
        return view('user.profile', compact('member'));
    }


    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     *
     * @param ProfileService $profileService;
     * @param UpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileService $profileService, UpdateRequest $request)
    {
        $validatedData = $request->validated();

        $profileService->updateMemberProfile($validatedData);

        return redirect('profile')->with('message', 'プロフィールを更新しました');
    }
}
