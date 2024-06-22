<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="far fa-file-alt"></i> @endsection
@section('c-title') {{ __('Single pages') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.single-pages.index') }}">{{ __('Single pages') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.single-pages.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.single-pages.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Create New') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filters-header', ['var' => $singlePages])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($singlePages as $page)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $page->category ?? ''}} </td>
                    <td> {{ $page->title ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{ route('system.single-pages.preview', ['id' => $page->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>w
        @include('admin.layout.snippets.filters.pagination', ['var' => $singlePages])
    </div>

@endsection
