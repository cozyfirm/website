<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Other\Project;
use App\Models\Other\Visits\Visit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller{
    protected string $_path = 'admin.pages.';

    public function dashboard(): View{
        return view($this->_path . 'dashboard', [
            'posts' => Blog::orderBy('id', 'desc')->take(6)->get(),
            'visits' => Visit::where('type', '=', 'web')->sum('views'),
            'blogVisits' => Visit::where('type', '=', 'blog')->sum('views'),
            'totalPosts' => Blog::count(),
            'projects' => Project::count()
        ]);
    }
}
