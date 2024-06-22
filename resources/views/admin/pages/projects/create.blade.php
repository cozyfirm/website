<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="far fa-file-alt"></i> @endsection
@section('c-title') @isset($project) {{ $project->title }} @else {{ __('Add new project') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.projects.index') }}">{{ __('Projects') }}</a> /
    @if(isset($create))
        <a href="{{ route('system.projects.create') }}">{{ __('Add new project') }}</a>
    @else
        <a href="{{ route('system.projects.preview', ['id' => $project->id ]) }}">{{ $project->title }}</a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.projects.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @isset($preview)
        <a href="{{ route('system.projects.edit', ['id' => $project->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-edit"></i>
                <span>{{ __('Edit') }}</span>
            </button>
        </a>
        <a href="{{ route('system.projects.delete', ['id' => $project->id ]) }}">
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
                    <form action="{{ route('system.projects.save') }}" method="POST" id="js-form">
                @else
                    <form action="{{ route('system.projects.update') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($project->id) }}
                @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($project) ? $project->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Status'))->for('state') }}</b>
                                {{ html()->select('state', ['in-progress' => 'In progress', 'beta' => 'Beta', 'production' => 'Production'])->class('form-control form-control-sm mt-1')->required()->value(isset($project) ? $project->state : '')->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorija'))->for('category') }}</b>
                                {{ html()->text('category')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($project) ? $project->category : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Broj komita'))->for('commits') }}</b>
                                {{ html()->text('commits')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($project) ? $project->commits : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kolaboratori'))->for('collaborators') }}</b>
                                {{ html()->text('collaborators')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($project) ? $project->collaborators : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Link'))->for('link') }}</b>
                                {{ html()->text('link')->class('form-control form-control-sm mt-1')->maxlength(100)->value((isset($project) ? $project->link : ''))->isReadonly(isset($preview)) }}
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
