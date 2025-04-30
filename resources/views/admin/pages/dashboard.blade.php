@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-home"></i> @endsection
@section('c-title') {{ __('Dashboard') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Upravljačka tabla admin panela') }}</p> </a>
@endsection
@section('c-buttons')
    <a href="#">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection

@section('content')
    <div class="homepage">
        <div class="homepage-main">
            <div class="home-row home-row-top">
                <div class="home-row-header">
                    <h4> {{__('OSNOVNE INFORMACIJE')}} </h4>
                </div>

                <div class="home-row-body">
                    <div class="home-row-items">
                        <div class="home-icon go-to" link="" title="{{__('Broj posjeta web stranici')}}">
                            <h1> {{ $visits ?? '0' }} </h1>
                            <p>{{__('Posjeta')}}</p>
                        </div>
                        <div class="home-icon go-to" link="" title="{{__('Broj pregleda postova')}}">
                            <h1> {{ $blogVisits ?? '0' }} </h1>
                            <p>{{__('Pregleda postova')}}</p>
                        </div>
                        <div class="home-icon go-to" link="" title="{{__('Broj postova')}}">
                            <h1> {{ $totalPosts ?? '0' }} </h1>
                            <p>{{__('Postova')}}</p>
                        </div>
                        <div class="home-icon go-to" link="" title="{{__('Broj projekata')}}">
                            <h1> {{ $projects ?? '0' }} </h1>
                            <p>{{__('Projekata')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-row">
                <div class="home-row-header">
                    <h4> {{__('OSTALO')}} </h4>
                </div>

                <div class="home-row-body">
                    <div class="home-row-items">
                        <div class="home-icon go-to" link="{{ route('system.users.index') }}" title="{{__('Pregled korisnika')}}">
                            <i class="fas fa-users"></i>
                            <p> {{__('Korisnici')}} </p>
                        </div>
                        <div class="home-icon" link="">
                            <i class="fas fa-chart-area"></i>
                            <p> {{__('Izvještaji')}} </p>
                        </div>
                        <div class="home-icon go-to" link="{{ route('system.blog') }}" title="{{ __('Pregled bloga') }}">
                            <i class="fas fa-blog"></i>
                            <p> {{__('Blog')}} </p>
                        </div>
                        <div class="home-icon go-to" link="{{ route('system.projects.index') }}" title="{{ __('Pregled projekata') }}">
                            <i class="far fa-edit"></i>
                            <p> {{__('Projekti')}} </p>
                        </div>
                    </div>
                    <div class="home-row-items">
                        <div class="home-icon go-to" link="">
                            <i class="fas fa-server"></i>
                            <p>{{ __('Integracije') }}</p>
                        </div>
                        <div class="home-icon go-to" link="">
                            <i class="fas fa-cogs"></i>
                            <p>{{ __('Postavke') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="homepage-side">

            <div class="reminders home-right-wrapper">
                <div class="home-right-header">
                    <p>{{ __('Blog - Posljednje objave') }}</p>
                </div>
                @foreach($posts as $post)
                    <div class="home-right-element go-to" link="" title="{{ __('Više informacija') }}">
                        {{ $post->title ?? '' }}
                        {{-- <i><small>{{ $user->createdAt() }}</small></i>--}}
                    </div>
                @endforeach
            </div>

            <div class="reminders home-right-wrapper">
                <div class="home-right-header">
                    <p> {{__('Brzi linkovi')}} </p>
                </div>
                <div class="home-right-element">
                    <a href="https://cozyfirm.com/" target="_blank"> {{__('Website naslovna')}} </a>
                </div>
                <div class="home-right-element">
                    <a href="https://support.cozyfirm.com" target="_blank"> {{__('CozyFirm Podrška')}} </a>
                </div>
            </div>

        </div>
    </div>
@endsection
