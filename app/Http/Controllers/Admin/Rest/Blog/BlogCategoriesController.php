<?php

namespace App\Http\Controllers\Admin\Rest\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoriesController extends Controller{
    use FileTrait, ResponseTrait;

    /* Path to views */
    protected string $_path = 'admin.pages.blog.categories.';
    /* Path for image save */
    protected string $_source = 'files/images/blog/categories/';

    public function index (): View{
        $categories = BlogCategory::where('id', '>', 0);
        $categories = Filters::filter($categories);

        $filters = [
            'title' => 'Naslov',
            'title_en' => 'Naslov (EN)',
        ];

        return view($this->_path . 'index', [
            'categories' => $categories,
            'filters' => $filters
        ]);
    }

    /**
     * Save image for blog category; Return
     * @param Request $request
     * @return JsonResponse
     */
    public function saveImage(Request $request): JsonResponse{
        try{
            $file = $this->saveFile($request, 'photo-input', 'blog_category');
            return $this->uploadImageResponse($file->id, $file->name);
        }catch (\Exception $e){}
    }
    /**
     * Create new blog category
     * @return View
     */
    public function create (): View{
        return view($this->_path.'create', [
            'source' => $this->_source,
            'create' => true
        ]);
    }

    /**
     * Save category with image id, that is returned from saveImage function
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse{
        try{
            $category = BlogCategory::create($request->except(['_token', 'photo-input']));

            return $this->jsonSuccess(__('Kategorija uspješno spremljena! '), route('system.blog.categories.edit', ['id' => $category->id ]));
        }catch (\Exception $e){ }
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id): View{
        return view($this->_path.'create', [
            'source' => $this->_source,
            'edit' => true,
            'category' => BlogCategory::where('id', '=', $id)->first()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse{
        try{
            BlogCategory::where('id', '=', $request->id)->update($request->except(['id', '_token', 'photo-input']));

            return $this->jsonSuccess(__('Kategorija uspješno spremljena! '), route('system.blog.categories.edit', ['id' => $request->id ]));
        }catch (\Exception $e){}
    }

    public function delete ($id): RedirectResponse{
        try{
            BlogCategory::where('id', '=', $id)->delete();
        }catch (\Exception $e){}
        return redirect()->route('system.blog.categories');
    }
}
