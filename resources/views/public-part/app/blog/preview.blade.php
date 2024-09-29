@extends('public-part.layout.layout')

@section('content')
    @section('breadcrumbs')
        @section('bc-page') {!! nl2br($post->title ?? '') !!} @endsection
        @section('bc-navigation')
            <span>/</span>
            <a href="{{route('public-part.blog')}}"> {{__('Novosti')}} </a>
            <span>/</span>
            <a href="{{route('public-part.blog.preview', ['id' => $post->id])}}" class="active-l"> {!! nl2br($post->title ?? '') !!} </a>
        @endsection
    @endsection

    <div class="top-image">
        <img src="{{ $category->getImg() }}" alt="">
        <div class="top-image-shadow">
            <div class="image-shadow-text">
                <h5> {{ env('APP_NAME') }} </h5>
                <h1> {!! nl2br($post->title ?? '') !!} </h1>
                <div class="shadow-image-lines">
                    <div class="long-line"></div>
                    <div class="short-line"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="split-on-two">
        <div class="posts-part">
            <div class="post-wrapper preview-post-wrapper">
                <div class="post">
                    @foreach($content as $cont)
                        @if($cont->category == 'text')
                            {!! nl2br($cont->textRel->text ?? '') !!}
                        @elseif($cont->category == 'double__images')
                            <div class="border">
                                <div class="double-image">
                                    <div class="single-image">
                                        <img src="{{asset( $cont->doubleImageRel->leftImageObject() ?? '' )}}">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset( $cont->doubleImageRel->rightImageObject() ?? '' )}}">
                                    </div>
                                </div>
                            </div>
                        @elseif($cont->category == 'slider')
                            <div class="single_image">
                                <div class="swiper-container preview-s-container swiper-{{$cont->id}}">
                                    <div class="swiper-wrapper">
                                        @foreach($cont->sliderRel as $img)
                                            <div class="swiper-slide">
                                                <img src="{{asset(($img->imageRel->path ?? '').($img->imageRel->file ?? ''))}}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <script>
                                    let swiper_{{$cont->id}} = new Swiper('.swiper-{{$cont->id}}', {
                                        slidesPerView: 1,
                                        spaceBetween: 30,
                                        autoplay: true,
                                        speed: 2000,
                                        navigation: {
                                            nextEl: '.swiper-button-next',
                                            prevEl: '.swiper-button-prev',
                                        }
                                    });
                                </script>
                            </div>
                        @endif
                    @endforeach

                    @if(0)

                        <div class="download-files">
                            <div class="distance-div"></div>
                            <div class="rest-header">
                                <i class="fas fa-cloud-download-alt"></i>
                                <div class="v-line"></div>
                                <div class="link-w">
                                    <a href="">
                                        <p>{{__('Priloženi dokumenti')}}</p>
                                    </a>
                                </div>
                            </div>

                            <div class="rest-body">
                                <ul>
                                    @foreach($post->filesRel as $file)
                                        <a href="{{ isset($file->fileRel) ? asset($file->fileRel->path.$file->fileRel->file) : '' }} " target="_blank">
                                            <li class="element-with-icon">
                                                @if(isset($file->fileRel))
                                                    @if($file->fileRel->extension == 'dwg')
                                                        <img src="{{ asset('images/blog/icons/dwg.png') }}" alt="">
                                                    @elseif($file->fileRel->extension == 'dxf')
                                                        <img src="{{ asset('images/blog/icons/dxf.png') }}" alt="">
                                                    @elseif($file->fileRel->extension == 'crv3d')
                                                        <img src="{{ asset('images/blog/icons/aspire.png') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('images/blog/icons/file.png') }}" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('images/blog/icons/file.png') }}" alt="">
                                                @endif
                                                <p>{{$file->file_title ?? ''}}</p>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <br>

                    <div class="tags-wrapper">
                        @foreach($postTags as $tag)
                            <div class="tag">
                                <a href="">{{ $tag->tag ?? '' }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('public-part.app.blog.includes.categories')
    </div>
@endsection
