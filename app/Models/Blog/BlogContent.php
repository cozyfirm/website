<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $id)
 */
class BlogContent extends Model{
    use HasFactory;

    protected $table = 'blog__content';
    protected $guarded = ['id'];

    public function postRel(): HasOne{
        return $this->hasOne(Blog::class, 'id', 'post_id');
    }

    public function textRel(): HasOne{
        return $this->hasOne(BlogText::class, 'content_id', 'id');
    }
}
