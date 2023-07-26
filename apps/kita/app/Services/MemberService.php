<?php

namespace App\Services;


use App\Models\Member;

class MemberService{

    /**
     * 会員を各ページ10で取得
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getMembers()
    {
        $membersPerPage = 10;

        return Member::orderBy('created_at', 'desc')->paginate($membersPerPage);
    }

    /**
     * 検索ワードそれぞれをescapeして、associative arrayで返す
     * @param array $keywords
     * @return array
     */
    public function escapeKeyword(array $keywords)
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedMembers(array $keywords)
    {
        $query = Member::query();

        $membersPerPage = 10;

        // 各フィールドに対して部分一致の検索条件を追加
        foreach ($keywords as $field => $keyword) {
            $query->where($field, 'LIKE', '%' . $keyword . '%');
        }

        // 検索結果を取得
        $results = $query->paginate($membersPerPage);

        return $results;
    }
}
