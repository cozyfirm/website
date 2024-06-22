<?php

namespace App\Http\Controllers\Admin\Rest;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Other\SinglePage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller{
    use ResponseTrait;
    protected string $_path = 'admin.pages.single-pages.';
    protected string $_destination_path = "files/images/pages";

    public function index(): View{
        $singlePages = SinglePage::where('id', '>', 0);
        $singlePages = Filters::filter($singlePages);
        $filters = [
            'category' => __('Kategorija'),
            'title' => __('Naslov')
        ];

        return view($this->_path . 'index', [
            'singlePages' => $singlePages,
            'filters' => $filters
        ]);
    }
    public function create(): View{
        return view($this->_path . 'create', [
            'create' => true
        ]);
    }
    public function save(Request $request){
        try{
            $page = SinglePage::create($request->except(['_token', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.single-pages.preview', ['id' => $page->id ]));
        }catch (\Exception $e){ }
    }
    public function preview($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'page' => SinglePage::where('id', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'page' => SinglePage::where('id', $id)->first()
        ]);
    }
    public function update(Request $request){
        try{
            $page = SinglePage::where('id', $request->id)->update($request->except(['_token', 'id', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.single-pages.preview', ['id' => $request->id ]));
        }catch (\Exception $e){ }
    }

    public function updateImage(Request $request){
        $file = $request->file('photo_uri');
        $ext  = $file->getClientOriginalExtension();
        if($ext != 'png' and $ext != 'jpg' and $ext != 'jpeg' and $ext != 'svg') return back()->with('error', __('Format slike nije podržan !'));
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $ext;
        $file->move(public_path($this->_destination_path), $fileName);

        SinglePage::where('id', $request->id)->update([
            'image_id' => $fileName
        ]);

        return back();
    }
}
