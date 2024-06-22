<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="far fa-file-alt"></i> @endsection
@section('c-title') @isset($page) {{ $page->title }} @else {{ __('Add new page') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.single-pages.index') }}">{{ __('Single pages') }}</a> /
    @if(isset($create))
        <a href="{{ route('system.single-pages.create') }}">{{ __('Add new page') }}</a> /
    @else
        <a href="{{ route('system.single-pages.preview', ['id' => $page->id ]) }}">{{ $page->title }}</a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.single-pages.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($preview)
        <a href="{{ route('system.single-pages.edit', ['id' => $page->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-edit"></i>
                <span>{{ __('Edit') }}</span>
            </button>
        </a>
        <a href="{{ route('system.single-pages.delete', ['id' => $page->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endisset
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@isset($preview) col-md-9 @else col-md-12 @endisset">
                @if(isset($create))
                    <form action="{{ route('system.single-pages.save') }}" method="POST" id="js-form">
                @else
                    <form action="{{ route('system.single-pages.update') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($page->id) }}
                @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($page) ? $page->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorija'))->for('category') }}</b>
                                {{ html()->select('category', ['basic' => 'Basic', 'it' => 'IT', 'engineering' => 'Engineering'])->class('form-control form-control-sm mt-1')->required()->value(isset($page) ? $page->category : '')->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Sadržaj'))->for('description') }}</b>
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-1 summernote')->required()->maxlength(3000)->value((isset($page) ? $page->description : ''))->style('height:160px;')->isReadonly(isset($preview)) }}
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

            @if(isset($preview))
                <div class="col-md-3 border-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-0 m-0" title="#">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                                    <i class="fas fa-info mt-1 mr-1"></i>
                                </div>
                            </div>

                            <form action="{{ route('system.single-pages.update-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
                                @csrf
                                {{ html()->hidden('id')->class('form-control')->value($page->id) }}
                                <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program') }}">
                                    <div class="card-body d-flex justify-content-between">
                                        <label for="photo_uri" >
                                            <p class="m-0">{{ __('Ažurirajte fotografiju') }}</p>
                                        </label>
                                        <i class="fas fa-image mt-1"></i>
                                    </div>
                                    <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
