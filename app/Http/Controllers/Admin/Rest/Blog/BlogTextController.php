<?php

namespace App\Http\Controllers\Admin\Rest\Blog;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogContent;
use App\Models\Blog\BlogText;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogTextController extends Controller{
    use ResponseTrait;
    protected string $_path = 'admin.pages.blog.includes.text.';

    /**
     * @param $post_id
     * @return View
     */
    public function create($post_id): View{
        return view($this->_path.'.create', [
            'post' => Blog::where('id', '=', $post_id)->first(),
            'create' => true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse{
        try{
            $connection = BlogContent::create([
                'category' => 'text',
                'post_id' => $request->post_id
            ]);

            $text = BlogText::create([
                'content_id' => $connection->id,
                'text' => $request->text,
                'text_en' => $request->text_en
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
            'text' => BlogText::where('content_id', '=', $id)->first(),
            'content' => $content,
            'edit' => true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse{
        try{
            $text = BlogText::where('id', '=', $request->id)->first();

            $text->update([
                'text' => $request->text,
                'text_en' => $request->text_en
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano !!'), route('system.blog.preview-post', ['id' => $request->post_id ]));
        }catch (\Exception $e){
            return $this->jsonError('6100', __('Greška prilikom obrade podataka!'));
        }
    }

    public function delete($id): RedirectResponse{
        $content = BlogContent::where('id', '=', $id)->first();
        $post    = Blog::where('id', '=', $content->post_id )->first();

        $content->delete();

        return redirect()->route('system.blog.preview-post', ['id' => $post->id ]);
    }
}
