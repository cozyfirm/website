<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') {{ __('Tekstualni sadržaj') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.blog') }}">{{ __('Blog') }}</a> /
    <a href="{{ route('system.blog.preview-post', ['id' => $post->id ]) }}">{{ $post->title }}</a> /
    <a href="#">{{ __('Tekstualni sadržaj')}}</a>
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
                <form action="@if(isset($create)) {{ route('system.blog.text-content.save') }} @else {{ route('system.blog.text-content.update') }} @endif" method="POST" id="js-form">
                    @if(isset($post))
                        {{ html()->hidden('id')->class('form-control')->value($text->id) }}
                    @endif

                    {{ html()->hidden('post_id')->class('form-control')->value($post->id) }}
                    @csrf

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Sadržaj'))->for('text') }}</b>
                                {{ html()->textarea('text')->class('form-control form-control-sm mt-1 summernote')->required()->maxlength(3000)->value((isset($text) ? $text->text : ''))->id("text")->style('height:160px;')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Sadržaj'))->for('text_en') }}</b>
                                {{ html()->textarea('text_en')->class('form-control form-control-sm mt-1 summernote')->required()->maxlength(3000)->value((isset($text) ? $text->text_en : ''))->id("text_en")->style('height:160px;')->isReadonly(isset($preview)) }}
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
