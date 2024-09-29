<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, mixed $id)
 */
class BlogText extends Model{
    use HasFactory;

    protected $table = 'blog__text';
    protected $guarded = ['id'];
}
