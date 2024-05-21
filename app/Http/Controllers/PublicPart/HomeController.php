<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Other\SinglePage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.home.';

    public function home(): View{
        return view($this->_path . 'home', [
            'HomeController' => SinglePage::where('id', 1)->first()
        ]);
    }
}
