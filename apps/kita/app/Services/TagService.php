<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TagService
{
    /**
     * 記事投稿する際に表示するタグ(アルファベット順)
     *
     *@return  Tag
     */
    public function getTagsForArticle(): Tag
    {
        return Tag::orderBy('name', 'asc')->get();
    }

    /**
     * タグをページネーション込みで取得
     *
     * @return LengthAwarePaginator
     */
    public function getTags(): LengthAwarePaginator
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
    private function escapeKeyword(string $keyword): string
    {
        return '%' . addcslashes($keyword, '%_\\') . '%';
    }

    /**
     * タグの部分一致検索を行い、ページネーション込みで取得
     *
     * @param string $keyword
     * @return LengthAwarePaginator
     */
    public function getSearchedTags(string $keyword): LengthAwarePaginator
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
     * @return Tag
     */
    public function saveTag(array $data): Tag
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
     * @return Tag
     */
    public function getTagById(int $id): Tag
    {
        return Tag::find($id);
    }

    /**
     * タグをアップデート
     *
     * @param int $id
     * @param array $data
     * @return Tag
     */
    public function updateTag(int $id, array $data): Tag
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
    public function deleteTag(int $id): void
    {
        $tag = $this->getTagById($id);
        $tag->articles()->detach();
        $tag->delete();
    }
}
