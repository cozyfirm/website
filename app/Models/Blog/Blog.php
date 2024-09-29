<?php

namespace App\Models\Blog;

use App\Models\Core\File;
use App\Models\Core\Hashtags\Hashtag;
use App\Traits\Blog\Hashtags;
use App\Traits\Common\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $except)
 * @method static find(mixed $id)
 */
class Blog extends Model{
    use HasFactory, FileTrait, Hashtags;

    protected $table = 'blog';
    protected $guarded = ['id'];

    protected array $taggable = ['title', 'title_en', 'short_description', 'short_description_en'];
    public function getTaggable(): array {return $this->taggable; }

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

    public function contentRel(): HasMany{
        return $this->hasMany(BlogContent::class, 'post_id', 'id')->orderBy('id');
    }

    /*
 *  Get all tags -- tags could be contained inside blog post, header or paragraph
 */
    public function getAllTags(){

        $id = $this->id;

        return Hashtag::where('lang', '=', 'bs')->whereHas('tagsRel', function ($query) use ($id){
            $query->where(function ($query) use ($id){
                $query->where('post_id', $id)->where('category', 'blog');
            })->orWhere(function ($query) use ($id){
                $query->where('parent', $id)->where('category', 'LIKE', '%blog%');
            });
        })->get();
    }
}
