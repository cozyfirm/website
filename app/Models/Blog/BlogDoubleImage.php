<?php

namespace App\Models\Blog;

use App\Models\Core\File;
use App\Traits\Common\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $id)
 */
class BlogDoubleImage extends Model{
    use HasFactory, FileTrait;

    protected $table = 'blog__double_images';
    protected $guarded = ['id'];

    public function leftImageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_left');
    }
    public function leftImageObject(): string{
        return $this->getImage($this->image_left);
    }
    public function rightImageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_right');
    }
    public function rightImageObject(): string{
        return $this->getImage($this->image_right);
    }
}
