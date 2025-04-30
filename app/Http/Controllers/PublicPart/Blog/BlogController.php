<?php

namespace App\Http\Controllers\PublicPart\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogContent;
use App\Models\Core\Hashtags\Hashtag;
use App\Traits\Common\VisitorTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller{
    use VisitorTrait;

    protected string $_path = 'public-part.app.blog.';

    /**
     * @return mixed
     */
    public function popularTags(): mixed{
        return Hashtag::where('lang', '=', $this->_lang)->whereHas('tagsRel', function ($query){
            $query->where('category', 'LIKE', '%blog%')->where('parent', null);
        })->orderBy('views', 'DESC')->take(6)->get();
    }

    public function getData($keyword = null, $action = 'category'): View{
        $posts = Blog::where('published', '=', 1);

        /*
         *  Search for specific category
         */
        (isset($keyword) and $action == 'category') ? $posts->where('category', $keyword) : $posts->orderBy('id', 'DESC');

        /*
         *  Search by hashtags
         */

        if(isset($keyword) and $action == 'tags'){
            if($this->_lang == 'bs') $posts->where('title', 'LIKE', '%'.$keyword.'%')->orWhere('short_description', 'LIKE', '%'.$keyword.'%');
            else $posts->where('title_en', 'LIKE', '%'.$keyword.'%')->orWhere('short_description_en', 'LIKE', '%'.$keyword.'%');
        }

        $popular = Blog::where('published', '=', 1)->orderBy('views', 'DESC')->take(3)->get();
        $posts = Filters::filter($posts, 3);

        $noPages  = (($posts->total() / 3) === (int)($posts->total() / 3)) ? ($posts->total() / 3) : ((int)($posts->total() / 3) + 1);
        $nextPage = isset($_GET['page']) ? ($_GET['page'] + 1) : 2;
        $nextPage = ($nextPage > $noPages) ? $nextPage = $noPages : $nextPage;
        $current  = isset($_GET['page']) ? $_GET['page'] : 1;
        $headerImage = (isset($keyword) and $action == 'category') ? BlogCategory::where('id', '=', $keyword)->first() : BlogCategory::inRandomOrder()->first();

        return view($this->_path . 'index', [
            'posts' => $posts,
            'categories' => BlogCategory::get(),
            'popular' => $popular,
            'noPages'  => $noPages,
            'nextPage' => $nextPage,
            'current' => $current,
            'category' => $keyword,
            'categoryName' => BlogCategory::find($keyword),
            'headerImage' => $headerImage,
            'white' => true,
            'popularTags' => $this->popularTags()
        ]);
    }

    /**
     * @return View
     */
    public function index(): View{
        return $this->getData();
    }

    /**
     * @param $category
     * @return View
     */
    public function indexWithCategories($category): View{
        return $this->getData($category);
    }

    /**
     * @param $id
     * @return View
     */
    public function preview ($id): View{
        $post = Blog::where('id', '=', $id)->first()->tags();

        /* Increase number of views on post */
        Blog::where('id', '=', $id)->update(['views' => ($post->views + 1)]);

        $popular = Blog::where('published', '=', 1)->orderBy('views', 'DESC')->take(3)->get();

        $this->updateVisitor('blog', $id);

        return view($this->_path.'preview', [
            'content' => BlogContent::where('post_id', '=', $id)->orderBy('id')->get(),
            'categories' => BlogCategory::get(),
            'category' => BlogCategory::where('id', '=', $post->category)->first(),
            'post' => $post,
            'popular' => $popular,
            'popularTags' => $this->popularTags(),
            'postTags' => $post->getAllTags(),
            'white' => true
        ]);
    }

    public function tags($tag): View{
        return $this->getData($tag, 'tags');
    }
}
