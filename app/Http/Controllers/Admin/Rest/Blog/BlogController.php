<?php

namespace App\Http\Controllers\Admin\Rest\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Rest\Blog\BlogCategoriesController;
use App\Models\Blog\Blog;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller{
    use FileTrait, ResponseTrait;
    /* Path to views */
    protected string $_path = 'admin.pages.blog.';
    /* Path for image save */
    protected string $_source = 'files/images/blog/';

    public function getCategories(){ return BlogCategoriesController::getCategories(); }

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
     * Save image for blog category; Return
     * @param Request $request
     * @return JsonResponse
     */
    public function saveBlogImage(Request $request): JsonResponse{
        try{
            $file = $this->saveFile($request, 'photo-input', 'blog_category');
            return $this->uploadImageResponse($file->id, $file->name);
        }catch (\Exception $e){
            return $this->jsonError("6000", __("Greška prilikom upload-a slike!!"));
        }
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
            'post' => Blog::where('id', '=', $id)->first(),
            // 'content' => BlogContent::where('post_id', $id)->orderBy('id')->get()
        ];
    }

    /**
     * @return View
     */
    public function createPost(): View{
        return view($this->_path.'.create', [
            'categories' => $this->getCategories(),
            'source' => $this->_source,
            'create' => true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function savePost(Request $request){
        try{
            $request->request->add(['created_by' => Auth::id()]);
            $blogPost = Blog::create(
                $request->except(['_token', 'photo_input'])
            );

            return $this->jsonSuccess(__('Uspješno ažurirano !!'), route('system.blog.preview-post', ['id' => $blogPost->id ]));
        }catch (\Exception $e){}
    }

    /**
     * @param $id
     * @return View
     */
    public function previewPost($id): View{
        return view($this->_path.'create',
            $this->getData('preview', $id)
        );
    }

    /**
     * @param $id
     * @return View
     */
    public function editPost($id): View{
        return view($this->_path.'create',
            $this->getData('edit', $id)
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function updatePost(Request $request){
        try{
            Blog::find($request->id)->update(
                $request->except(['_token', 'id', 'photo-input'])
            );

            return $this->jsonSuccess(__('Uspješno ažurirano !!'), route('system.blog.preview-post', ['id' => $request->id ]));
        }catch (\Exception $e){}
    }

    public function deletePost($id): RedirectResponse{
        try{
            /**
             *  ToDo - Delete images and all relationships :)
             */
            Blog::where('id', '=', $id)->delete();
        }catch (\Exception $e){  }
        return redirect()->route('system.blog');
    }
}
