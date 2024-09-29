<?php

namespace App\Http\Controllers\Admin\Rest;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Other\Project;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectsController extends Controller{
    use ResponseTrait;
    protected string $_path = 'admin.pages.projects.';
    protected string $_destination_path = "files/images/pages";

    public function index(): View{
        $singlePages = Project::where('id', '>', 0);
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
            $page = Project::create($request->except(['_token', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.projects.preview', ['id' => $page->id ]));
        }catch (\Exception $e){ }
    }
    public function preview($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'project' => Project::where('id', '=',$id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'project' => Project::where('id','=', $id)->first()
        ]);
    }
    public function update(Request $request){
        try{
            $page = Project::where('id', '=',$request->id)->update($request->except(['_token', 'id', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.projects.preview', ['id' => $request->id ]));
        }catch (\Exception $e){ }
    }
    public function delete($id): RedirectResponse{
        Project::where('id', '=', $id)->delete();
        return redirect()->route('system.projects.index');
    }
}
