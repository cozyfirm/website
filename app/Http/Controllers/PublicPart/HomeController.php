<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\Project;
use App\Models\Other\SinglePage;
use App\Traits\Common\VisitorTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    use VisitorTrait;

    protected string $_path = 'public-part.home.';
    protected string $_pages_path = 'public-part.app.pages.';

    public function home(): View{
        $this->updateVisitor('web');

        return view($this->_path . 'home', [
            'HomeController' => SinglePage::where('id', 1)->first(),
            'inProgress' => Project::where('state','=', 'in-progress')->get(),
            'beta' => Project::where('state', '=', 'beta')->get(),
            'production' => Project::where('state', '', 'production')->orderBy('title')->get()
        ]);
    }

    /**
     *  Single pages
     */
    public function aboutUs(): View{
        $this->updateVisitor('single-page', 2);

        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id',  '=', 2)->first()
        ]);
    }
    public function privacyPolicy(): View{
        $this->updateVisitor('single-page', 3);

        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', '=', 3)->first()
        ]);
    }
    public function termsAndConditions(): View{
        $this->updateVisitor('single-page', 4);

        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', '=', 4)->first()
        ]);
    }
    public function cookies(): View{
        $this->updateVisitor('single-page', 5);

        return view($this->_pages_path . 'single-page', [
            'page' => SinglePage::where('id', '=', 5)->first()
        ]);
    }
}
