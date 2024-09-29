<?php

namespace App\Http\Controllers\Admin\Rest\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller{
    /* Path to views */
    protected string $_path = 'admin.pages.blog.';
    /* Path for image save */
    protected string $_source = 'files/images/blog/';

    /**
     * List all blog posts
     * @return View
     */
    public function index(): View{
        $posts = Blog::where('id', '>', 0);
        $posts = Filters::filter($posts);
        $filters = [
            'title' => 'Naslov',
            'categoryRel.title' => 'Kategorija',
            'short_description' => 'Kratki opis',
        ];

        return view($this->_path . 'index', [
            'posts' => $posts,
            'filters' => $filters
        ]);
    }

    /**
     * Get data for all create | preview | update views
     * @param string $action
     * @param int $id
     * @return array
     */
    public function getData($action, $id = null): array{
        return [
            $action => true,
            'categories' => $this->getCategories(),
            'source' => 'images/blog/',
            'post' => Blog::where('id', $id)->first(),
            'content' => BlogContent::where('post_id', $id)->orderBy('id')->get()
        ];
    }
}
