<?php

namespace App\Services;


use App\Models\Member;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;

class MemberService{

    /**
     * 会員を各ページ10で取得
     *
     * @return View
     */
    public function getMembers(): View
    {
        $membersPerPage = 10;

        return Member::orderBy('created_at', 'desc')->paginate($membersPerPage);
    }

    /**
     * 検索ワードそれぞれをescapeして、associative arrayで返す
     * @param array $keywords
     * @return array
     */
    private function escapeKeyword(array $keywords): array
    {
        $escapedKeywords = [];
        foreach ($keywords as $field => $keyword) {
            $escapedKeywords[$field] = '%' . addcslashes($keyword, '%_\\') . '%';
        }
        return $escapedKeywords;
    }


    /**
     * escape後の検索ワードで検索をかけ、合致したものを返す
     * @param array $keywords
     * @return LengthAwarePaginator
     */
    public function getSearchedMembers(array $keywords): LengthAwarePaginator
    {
        $query = Member::query();

        $membersPerPage = 10;

        $escapedKeywords = $this->escapeKeyword($keywords);

        // 各フィールドに対して部分一致の検索条件を追加
        foreach ($escapedKeywords as $field => $keyword) {
            $query->where($field, 'LIKE', '%' . $keyword . '%');
        }

        // 検索結果を取得
        return $query->paginate($membersPerPage);
    }
}
