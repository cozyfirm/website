<?php

namespace App\Http\Controllers\Admin\Other\API;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\Other\API\APICalls;
use App\Models\Other\API\APISystem;
use App\Models\Other\Project;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class APIController extends Controller{
    use ResponseTrait;
    protected string $_path = 'admin.pages.other.api.';

    public function index(): View{
        $apis = APISystem::where('id', '>', 0);
        $apis = Filters::filter($apis);
        $filters = [
            'title' => __('Naslov'),
            'description' => __('Opis')
        ];

        return view($this->_path . 'index', [
            'apis' => $apis,
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
            $page = APISystem::create($request->except(['_token', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.api-system.api.preview', ['id' => $page->id ]));
        }catch (\Exception $e){ }
    }
    public function preview($id): View{
        $calls = APICalls::where('api_id', '=', $id)
            ->select('type')
            ->groupBy('type')
            ->pluck('type');;

        return view($this->_path . 'create', [
            'preview' => true,
            'api' => APISystem::where('id', '=',$id)->first(),
            'calls' => $calls,
            'success' => APICalls::where('api_id', '=', $id)->where('status', '=', 'success')->count(),
            'error' => APICalls::where('api_id', '=', $id)->where('status', '=', 'error')->count()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'api' => APISystem::where('id','=', $id)->first()
        ]);
    }
    public function update(Request $request){
        try{
            APISystem::where('id', '=',$request->id)->update($request->except(['_token', 'id', 'undefined', 'files']));

            return $this->jsonSuccess(__('Informacije uspješno ažurirane'), route('system.api-system.api.preview', ['id' => $request->id ]));
        }catch (\Exception $e){ }
    }
    public function delete($id): RedirectResponse{
        APISystem::where('id', '=', $id)->delete();
        return redirect()->route('system.api-system.api.index');
    }
}
