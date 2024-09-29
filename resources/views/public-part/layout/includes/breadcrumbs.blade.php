@if(View::hasSection('breadcrumbs'))
    <div class="breadcrumbs-w">
        <div class="breadcrumbs">
            <div class="bc-left">
                <h2>@yield('bc-page')</h2>
            </div>
            <div class="bc-right">
                <p>
                    <a href="{{route('public-part.home')}}">Naslovna</a>
                    @yield('bc-navigation')
                </p>
            </div>
        </div>
    </div>
@endif
