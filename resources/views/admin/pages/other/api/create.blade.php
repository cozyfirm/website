<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="far fa-file-alt"></i> @endsection
@section('c-title') @isset($api) {{ $api->title }} @else {{ __('Add new API') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.api-system.api.index') }}">{{ __('API System') }}</a> /
    @if(isset($create))
        <a href="{{ route('system.api-system.api.create') }}">{{ __('Add new API') }}</a>
    @else
        <a href="{{ route('system.api-system.api.preview', ['id' => $api->id ]) }}">{{ $api->title }}</a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.api-system.api.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($preview)
        <a href="{{ route('system.api-system.api.edit', ['id' => $api->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-edit"></i>
                <span>{{ __('Edit') }}</span>
            </button>
        </a>
        <a href="{{ route('system.api-system.api.delete', ['id' => $api->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endisset
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@isset($preview) col-md-8 @else col-md-12 @endif">
                @if(isset($create))
                    <form action="{{ route('system.api-system.api.save') }}" method="POST" id="js-form">
                @else
                    <form action="{{ route('system.api-system.api.update') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($api->id) }}
                @endif
                @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($api) ? $api->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Opis'))->for('description') }}</b>
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($api) ? $api->description : ''))->isReadonly(isset($preview))->style('height:120px; resize:none;') }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('Ažurirajte') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            @if(isset($preview))
                <div class="col-md-4 d-flex flex-wrap gap-3">
                    @include('admin.pages.other.api.snippets.right-menu')
                </div>
            @endif
        </div>
    </div>
@endsection
