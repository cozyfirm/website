<?php

namespace App\Models\Blog;

use App\Models\Core\File;
use App\Traits\Common\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $except)
 * @method static find(mixed $id)
 */
class Blog extends Model{
    use HasFactory, FileTrait;

    protected $table = 'blog';
    protected $guarded = ['id'];

    public function categoryRel(): HasOne{
        return $this->hasOne(BlogCategory::class, 'id', 'category');
    }
    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function imageObject(): string{
        return $this->getImage($this->image_id);
    }
    public function homeImageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'home_image_id');
    }
    public function homeImageObject(): string{
        return $this->getImage($this->home_image_id);
    }
}
