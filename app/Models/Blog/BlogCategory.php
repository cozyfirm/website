<?php

namespace App\Models\Blog;

use App\Models\Core\File;
use App\Traits\Common\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $except)
 * @method static pluck(string $string, string $string1)
 * @method static get()
 * @method static find(mixed $keyword)
 * @method static inRandomOrder()
 */
class BlogCategory extends Model{
    use HasFactory, SoftDeletes, FileTrait;

    protected $table = 'blog__categories';
    protected $guarded = ['id'];

    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function getImg(): string{
        return $this->getImage($this->image_id);
    }
    public function postRel(): HasMany{
        return $this->hasMany(Blog::class,'category', 'id');
    }
}
