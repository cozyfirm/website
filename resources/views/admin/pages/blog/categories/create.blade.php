<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') @isset($category) {{ $category->title }} @else {{ __('Add new category') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.blog.categories') }}">{{ __('Blog categories') }}</a>
    @if(isset($create))
        / <a href="#">{{ __('Add new category') }}</a>
    @else
        / <a href="{{ route('system.blog.categories.edit', ['id' => $category->id ]) }}">{{ $category->title }}</a>
    @endif
@endsection

@section('c-buttons')
    <a href="{{ route('system.blog.categories') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($edit)
        <a href="{{ route('system.blog.categories.delete', ['id' => $category->id ]) }}">
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
                @if(isset($create))
                    <form action="{{ route('system.blog.categories.save') }}" method="POST" id="js-form">
                @else
                    <form action="{{ route('system.blog.categories.update') }}" method="POST" id="js-form">
                        {{ html()->hidden('id')->class('form-control')->value($category->id) }}
                @endif
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-photo">
                                    {{ html()->hidden('image_id')->class('form-control')->id('first-photo-input')->value($category->image_id ?? '') }}
                                    <img src="{{ isset($category->imageRel) ? $category->getImg() : ''}}" id="first-photo" alt="">
                                    <label for="photo-return-id-first">
                                        <div class="input-image-shadow t-3">
                                            <h1>1920 x 450</h1>
                                        </div>
                                    </label>
                                    <input type="file" id="photo-return-id-first" class="photo-return-id" path="{{$source}}" category="blog-front-image" photo-name="first-photo" name="photo-input" url="{{route('system.blog.categories.save-image')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <b>{{ html()->label(__('Naziv kategorije'))->for('title') }}</b>
                                            {{ html()->text('title')->class('form-control form-control-sm mt-1')->maxlength(100)->value((isset($category) ? $category->title : ''))->isReadonly(isset($preview)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <b>{{ html()->label(__('Naziv kategorije (EN)'))->for('title_en') }}</b>
                                            {{ html()->text('title_en')->class('form-control form-control-sm mt-1')->maxlength(100)->value((isset($category) ? $category->title_en : ''))->isReadonly(isset($preview)) }}
                                        </div>
                                    </div>
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
