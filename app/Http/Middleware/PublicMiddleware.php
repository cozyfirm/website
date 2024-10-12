<?php

namespace App\Http\Middleware;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PublicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        \View::share([
            'blogCategories' => BlogCategory::get(),
            'lastPosts' => Blog::orderBy('id', 'DESC')->take(4)->get()
        ]);

        return $next($request);
    }
}
