<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    /**
     * 記事投稿する際に表示するタグ(アルファベット順)
     *
     *@return  App\Models\Tag
     */
    public function getTagsForArticle()
    {
        return Tag::orderBy('name', 'asc')->get();
    }

    /**
     * タグをページネーション込みで取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTags()
    {
        $tagsPerPage = 10;

        return Tag::orderby('updated_at', 'desc')->paginate($tagsPerPage);
    }

    /**
     * タグをページネーション込みで取得
     *
     * @param string $keyword
     * @return string
     */
    private function escapeKeyword(string $keyword)
    {
        $escapedKeyword = '%' . addcslashes($keyword, '%_\\') . '%';

        return $escapedKeyword;
    }

    /**
     * タグの部分一致検索を行い、ページネーション込みで取得
     *
     * @param string $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedTags(string $keyword)
    {
        $tagsPerPage = 10;

        $escapedKeyword = $this->escapeKeyword($keyword);

        return Tag::where('name', 'like', "%$escapedKeyword%")
            ->orderBy('updated_at', 'desc')
            ->paginate($tagsPerPage);
    }

    /**
     * タグをテーブルに保存
     *
     * @param array $data
     * @return \App\Models\Tag
     */
    public function saveTag(array $data)
    {
        $tag = new Tag();

        $tag->fill([
            'name' => $data['tag_name'],
        ]);

        $tag->save();

        return $tag;
    }

    /**
     * idをベースにタグを取得
     *
     * @param int $id
     * @return \App\Models\Tag
     */
    public function getTagById(int $id)
    {
        $tag = Tag::find($id);

        return $tag;
    }

    /**
     * タグをアップデート
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Tag
     */
    public function updateTag(int $id, array $data)
    {
        $tag = $this->getTagById($id);

        $tag->name = $data['tag_name'];
        $tag->save();

        return $tag;
    }


    /**
     * idをベースにタグを取得し、
     * 記事との中間テーブルレコードを削除、かつタグ自体も削除
     *
     * @param int $id
     * @return void
     */
    public function deleteTag(int $id)
    {
        $tag = $this->getTagById($id);
        $tag->articles()->detach();
        $tag->delete();
    }
}
