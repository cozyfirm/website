<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') {{ __('Duple fotografije') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.blog') }}">{{ __('Blog') }}</a> /
    <a href="{{ route('system.blog.preview-post', ['id' => $post->id ]) }}">{{ $post->title }}</a> /
    <a href="#">{{ __('Duple fotografije')}}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.blog') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($edit)
        <a href="{{ route('system.blog.preview-post', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-chevron-left"></i>
                <span>{{ __('Back') }}</span>
            </button>
        </a>
        <a href="{{ route('system.blog.text-content.delete', ['id' => $content->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endisset
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="@if(isset($create)) {{ route('system.blog.double-images.save') }} @else {{ route('system.blog.double-images.update') }} @endif" method="POST" id="js-form">
                    @if(isset($images))
                        {{ html()->hidden('id')->class('form-control')->value($images->id) }}
                    @endif

                    {{ html()->hidden('post_id')->class('form-control')->value($post->id) }}
                    @csrf

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="product-photo">
                                    <!-- Hidden element for file id -->
                                    {{ html()->hidden('image_left')->class('form-control')->value($images->image_left ?? '')->id("first-photo-input") }}
                                    <img src="{{isset($images) ? $images->leftImageObject() : ''}}" id="first-photo" alt="">
                                    @if(!isset($preview))
                                        <label for="photo-return-id-first">
                                            <div class="input-image-shadow t-3">
                                                <h1>700 x 700</h1>
                                            </div>
                                        </label>
                                        <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('system.blog.double-images.save-image')}}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-photo">
                                    <!-- Hidden element for file id -->
                                    {{ html()->hidden('image_right')->class('form-control')->value($images->image_right ?? '')->id("second-photo-input") }}
                                    <img src="{{isset($images) ? $images->rightImageObject() : ''}}" id="second-photo" alt="">
                                    @if(!isset($preview))
                                        <label for="photo-return-id-second">
                                            <div class="input-image-shadow t-3">
                                                <h1>700 x 700</h1>
                                            </div>
                                        </label>
                                        <input type="file" id="photo-return-id-second" class="photo-return-id" path="{{$source}}" category="blog-home-image" photo-name="second-photo" name="photo-input" url="{{route('system.blog.double-images.save-image')}}">
                                    @endif
                                </div>
                            </div>
                        </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('Ažurirajte') }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
