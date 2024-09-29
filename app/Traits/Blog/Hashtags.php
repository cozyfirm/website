<?php

namespace App\Traits\Blog;

use App\Http\Controllers\Admin\Core\HashtagController;

trait Hashtags{
    protected function getRoute($tag): string {
        return isset($this->tagsRoute) ? route($this->tagsRoute, ['tag' => str_replace('#', '', $tag)]) : '#';
    }

    protected function scopetags(): static{
        $columns    = $this->taggable;
        $attributes = $this->getAttributes();

        foreach ($attributes as $key => $val){
            if(in_array($key, $columns)){
                $tags = HashtagController::extractTags($val);
                if(count($tags)){
                    foreach ($tags as $tag){
                        $this->$key = str_replace($tag, '<a href="' . $this->getRoute($tag) .'" class="hashtag"> '.$tag.' </a>', $this->$key);
                    }
                }
            }
        }

        return $this;
    }
}
