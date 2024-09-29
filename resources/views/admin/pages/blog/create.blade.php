<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') @isset($project) {{ $project->title }} @else {{ __('Add new post') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.blog') }}">{{ __('Blog') }}</a> /
    @if(isset($create))
        <a href="#">{{ __('Add new post') }}</a>
    @else
        <a href="{{ route('system.blog.preview-post', ['id' => $post->id ]) }}">{{ $post->title }}</a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.blog') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($preview)
        <a href="{{ route('system.blog.edit-post', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-edit"></i>
                <span>{{ __('Edit') }}</span>
            </button>
        </a>
        <a href="{{ route('system.blog.delete-post', ['id' => $post->id ]) }}">
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
                <form action="@if(isset($create)) {{ route('system.blog.save-post') }} @else {{ route('system.blog.update-post') }} @endif" method="POST" id="js-form">
                    @if(isset($post))
                        {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                    @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorije posta'))->for('category') }}</b>
                                {{ html()->select('category', $categories)->class('form-control form-control-sm mt-1')->required()->value(isset($post) ? $post->category : '')->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Status'))->for('published') }}</b>
                                {{ html()->select('published', [0 => 'Ne', 1 => 'Da'])->class('form-control form-control-sm mt-1')->required()->value(isset($post) ? $post->published : '')->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov posta'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($post) ? $post->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov posta (EN)'))->for('title_en') }}</b>
                                {{ html()->text('title_en')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($post) ? $post->title_en : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kratki opis'))->for('short_description') }}</b>
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($post) ? $post->short_description : ''))->isReadonly(isset($preview))->style('height : 120px;') }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kratki opis (EN)'))->for('short_description_en') }}</b>
                                {{ html()->textarea('short_description_en')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($post) ? $post->short_description_en : ''))->isReadonly(isset($preview))->style('height : 120px;') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description_en"> {{__('Fotografija za naslovnu')}} </label>
                            </div>
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {{ html()->hidden('home_image_id')->class('form-control')->value($post->home_image_id ?? '')->id("first-photo-input") }}
                                <img src="{{isset($post) ? $post->homeImageObject() : ''}}" id="first-photo" alt="">
                                @if(!isset($preview))
                                    <label for="photo-return-id-first">
                                        <div class="input-image-shadow t-3">
                                            <h1>450 x 300</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description_en"> {{__('Fotografija')}} </label>
                            </div>
                            <div class="product-photo">
                                <!-- Hidden element for file id -->
                                {{ html()->hidden('image_id')->class('form-control')->value($post->image_id ?? '')->id("second-photo-input") }}
                                <img src="{{isset($post) ? $post->imageObject() : ''}}" id="second-photo" alt="">
                                @if(!isset($preview))
                                    <label for="photo-return-id-second">
                                        <div class="input-image-shadow t-3">
                                            <h1>900 x 360</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-second" class="photo-return-id" path="{{$source}}" category="blog-home-image" photo-name="second-photo" name="photo-input" url="{{route('system.blog.save-blog-image')}}">
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
