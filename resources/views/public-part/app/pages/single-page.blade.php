@extends('public-part.layout.layout')

@section('content')
    <div class="page__wrapper">
        <div class="page__inner_w">
            @isset($page->image_id)
                <div class="image__wrapper">
                    <img src="{{ asset('files/images/pages/' . $page->image_id ) }}" alt="">
                </div>
            @endisset

            <div class="page__content">
                {!! nl2br($page->description) !!}
            </div>
        </div>
    </div>
@endsection
