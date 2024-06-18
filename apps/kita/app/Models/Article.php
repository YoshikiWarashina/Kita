<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'contents',
        'member_id',
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';


    /**
     * 記事を保有しているメンバーの取得
     *
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }


    /**
     * 複数コメントが紐付けられる記事の取得
     *
     * @return hasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * 記事が紐つけられるタグの取得
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_article_tag', 'article_id', 'article_tag_id')->withTimestamps();
    }
}
