<?php

namespace App\Http\Controllers\Admin\Rest\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogContent;
use App\Models\Blog\BlogDoubleImage;
use App\Models\Blog\BlogText;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogImagesController extends Controller{
    use FileTrait, ResponseTrait;
    protected string $_path = 'admin.pages.blog.includes.double-images.';
    protected string $_source = 'files/images/blog/';

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function saveImage(Request $request): JsonResponse{
        try{
            $file = $this->saveFile($request, 'photo-input', 'blog_category');
            return $this->uploadImageResponse($file->id, $file->name);
        }catch (\Exception $e){
            return $this->jsonError("6000", __("Greška prilikom upload-a slike!!"));
        }
    }

    /**
     * @param $post_id
     * @return View
     */
    public function create($post_id): View{
        return view($this->_path.'.create', [
            'post' => Blog::where('id', '=', $post_id)->first(),
            'create' => true,
            'source' => $this->_source,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse{
        try{
            $connection = BlogContent::create([
                'category' => 'double__images',
                'post_id' => $request->post_id
            ]);

            $text = BlogDoubleImage::create([
                'content_id' => $connection->id,
                'image_left' => $request->image_left,
                'image_right' => $request->image_right
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano !!'), route('system.blog.preview-post', ['id' => $request->post_id ]));
        }catch (\Exception $e){
            return $this->jsonError('6100', __('Greška prilikom obrade podataka!'));
        }
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id): View{
        $content = BlogContent::where('id', '=', $id)->first();
        $post    = Blog::where('id', '=', $content->post_id )->first();

        return view($this->_path.'.create', [
            'post' => $post,
            'images' => BlogDoubleImage::where('content_id', '=', $id)->first(),
            'content' => $content,
            'edit' => true,
            'source' => $this->_source
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse{
        try{
            $text = BlogDoubleImage::where('id', '=', $request->id)->first();

            $text->update([
                'image_left' => $request->image_left,
                'image_right' => $request->image_right
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano !!'), route('system.blog.preview-post', ['id' => $request->post_id ]));
        }catch (\Exception $e){
            return $this->jsonError('6100', __('Greška prilikom obrade podataka!'));
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse{
        $content = BlogContent::where('id', '=', $id)->first();
        $post    = Blog::where('id', '=', $content->post_id )->first();

        $content->delete();

        return redirect()->route('system.blog.preview-post', ['id' => $post->id ]);
    }
}
