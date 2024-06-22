<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Project;
use App\Models\Other\SinglePage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.home.';
    protected string $_pages_path = 'public-part.app.pages.';

    public function home(): View{
        return view($this->_path . 'home', [
            'HomeController' => SinglePage::where('id', 1)->first(),
            'inProgress' => Project::where('state', 'in-progress')->get(),
            'beta' => Project::where('state', 'beta')->get(),
            'production' => Project::where('state', 'production')->orderBy('title')->get()
        ]);
    }

    /**
     *  Single pages
     */
    public function aboutUs(): View{
        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', 2)->first()
        ]);
    }
    public function privacyPolicy(): View{
        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', 3)->first()
        ]);
    }
    public function termsAndConditions(): View{
        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', 4)->first()
        ]);
    }
    public function cookies(): View{
        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', 5)->first()
        ]);
    }
}
