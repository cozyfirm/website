<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand p-3" href="#">{{__('Sadržaj posta')}}</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('system.blog.text-content.create', ['post_id' => $post->id ?? '0'])}}">{{__('Tekstualni dio')}}</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('system.blog.double-images.create',['post_id' => $post->id ?? '0'] )}}">{{__('Dvije fotografije')}}</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('Slider')}}</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#"> / </a> </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('system.blog.text-content.create',['post_id' => $post->id ?? '0'] )}}">{{__('Dokumenti')}}</a>
                </li>
            </ul>
        </form>
    </div>
</nav>
