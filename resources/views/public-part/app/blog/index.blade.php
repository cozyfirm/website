@extends('public-part.layout.layout')

@section('content')
    @section('breadcrumbs')
        @section('bc-page') {{__('Novosti')}} @endsection
        @section('bc-navigation')
            <span>/</span>
            <a href="#" class="active-l"> {{__('Novosti')}} </a>
        @endsection
    @endsection

{{--    <div class="top-image">--}}
{{--        <img src="{{ $headerImage->getImg() }}" alt="">--}}
{{--        <div class="top-image-shadow">--}}
{{--            <div class="image-shadow-text">--}}
{{--                <h5> {{ env('APP_NAME') }} </h5>--}}
{{--                <h1> @if(isset($categoryName)) {{ $categoryName->title ?? __('NOVOSTI') }} @else {{__('NOVOSTI')}} @endif</h1>--}}
{{--                <div class="shadow-image-lines">--}}
{{--                    <div class="long-line"></div>--}}
{{--                    <div class="short-line"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="split-on-two">
        <div class="posts-part">
            @foreach($posts as $post)
                <div class="post-wrapper preview-single-post" post-id="{{ $post->id }}">
                    <div class="post-date">
                        <div class="vertical-line"></div>
                        <div class="horizontal-line"></div>
                        <div class="date-value">
                            <h5>{{$post->created_at->format('d')}}</h5>
                            <p>{{$post->created_at->format('M')}}</p>
                        </div>
                    </div>
                    <div class="post">
                        <img class="desktop-image" src="{{ asset($post->imageObject()) }}" alt="">
                        <img class="mobile-image" src="{{ asset($post->homeImageObject()) }}" alt="">

                        <h3>{{$post->title}}</h3>
                        <div class="more-details">
                            <div class="details details-zero">
                                <i class="fas fa-user"></i>
                                <p> {{ $post->userRel->name ?? '' }} </p>
                            </div>
                            <div class="details details-one">
                                <i class="fas fa-folder-open"></i>
                                <p> {{ $post->categoryRel->title ?? '' }} </p>
                            </div>
                            <div class="details details-two">
                                <i class="fas fa-clock"></i>
                                <p> {{$post->created_at->format('d.M.Y H:i') }} </p>
                            </div>
                        </div>

                        <p> {!! $post->short_description ?? '' !!} </p>

                        <div class="inline-link">
                            <div class="line"></div>
                            <a href="{{route('public-part.blog.preview', ['id' => $post->id ?? ''])}}"> {{__('VIŠE INFORMACIJA')}} </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('public-part.app.blog.includes.categories')
    </div>

    <div class="pages">
        @for($i=1; $i<=$noPages; $i++)
            <div class="single-blog-page {{ ($i == $current) ? 'focus' : '' }} " page="1">
                <a href="{{ isset($category) ? route('public-part.blog.with-categories', ['id' => $category]) : route('public-part.blog') }}?&page={{$i}}">
                    <p> {{$i}} </p>
                </a>
            </div>
        @endfor

        <div class="single-blog-page next-one">
            <a href="{{ isset($category) ? route('public-part.blog.with-categories', ['id' => $category]) : route('public-part.blog') }}?&page={{$nextPage}}">
                <p>Sljedeća stranica</p>
            </a>
        </div>
    </div>
@endsection
