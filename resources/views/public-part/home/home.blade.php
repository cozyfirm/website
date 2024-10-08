@extends('public-part.layout.layout')

@section('content')
    <div class="background_image">
        <img class="right__img" src="{{ asset('files/images/icons/network_2.png') }}" alt="">
    </div>

    <div class="slider">
        <div class="slider__inner inner_wrapper">
            <div class="slider__inner_center">
                <div class="slider__left__line">
                    <div class="circle__wrapper">
                        <div class="circle__"></div>
                    </div>
                    <div class="line__ line__top"></div>
                    <div class="middle__icon">
                        <img src="{{ asset('files/images/icons/code.png') }}" alt="">
                    </div>
                    <div class="line__ line__bottom"></div>
                </div>
                <div class="slider__right__text">
                    <h1> {{ __("Let's build it together") }} </h1>
                    <h4> {{ __('Taking to long? Contact us to improve your software') }} </h4>

                    <div class="forms__wrapper">
                        <input type="text" name="chat" id="chat" placeholder="{{ __('Pišite nam ..') }}">
                        <button>{{ __('Kontaktirajte nas') }}</button>
                    </div>

                    <h4> {{ __('We use') }} </h4>
                    <div class="technologies__wrapper">
                        <img src="{{ asset('files/images/icons/laravel.png') }}" alt="">
                        <img src="{{ asset('files/images/icons/php.png') }}" alt="">
                        <img src="{{ asset('files/images/icons/jquery.png') }}" alt="">
                        <img src="{{ asset('files/images/icons/cpp.png') }}" alt="">
                        <img src="{{ asset('files/images/icons/reaact_n.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="experience__tab">
        <div class="experience__inner inner_wrapper">
            <div class="experience__left__line">
                <div class="top__icon">
                    <img src="{{ asset('files/images/icons/atom.png') }}" alt="">
                </div>
                <div class="line__ line__bottom"></div>
            </div>
            <div class="experience__text">
                <h4>{{ __('Višegodišnje iskustvo') }}</h4>
                <h1 class="gloving__blue">{{ __('10+ godina u industriji') }}</h1>
                <h1>{{ __('Iskustvo koje unapređuje tehnologiju i ') }} <br> {{ __('transformiše vaš biznis') }} </h1>
            </div>
        </div>
    </div>

    <!-- Text editor -->
    @include('public-part.home.includes.text-editor')

    <div class="experience__tab">
        <div class="experience__inner inner_wrapper">
            <div class="experience__left__line experience__left__line__second">
                <div class="line__ line__top"></div>
                <div class="top__icon">
                    <img src="{{ asset('files/images/icons/atom.png') }}" alt="">
                </div>
                <div class="line__ line__bottom"></div>
            </div>
            <div class="experience__text experience__text__padding">
                <h4>{{ __('Cutting edge') }}</h4>
                <h1 class="gloving__blue">{{ __('Digitalna transformacija') }}</h1>
                <h1>{{ __('Transformišemo ideje u digitalna rešenja') }} <br> {{ __('Vaš partner u IT inovacijama') }} </h1>
            </div>
        </div>
    </div>

    @include('public-part.home.includes.contact-us')

    <div class="experience__tab">
        <div class="experience__inner inner_wrapper">
            <div class="experience__left__line experience__left__line__second">
                <div class="line__ line__top"></div>
                <div class="top__icon">
                    <img src="{{ asset('files/images/icons/atom.png') }}" alt="">
                </div>
                <div class="line__ line__bottom"></div>
            </div>
            <div class="experience__text experience__text__padding">
                <h4>{{ __('Projekti') }}</h4>
                <h1 class="gloving__blue">{{ __('Različite branše') }}</h1>
                <h1>{{ __('Inovativna rješenja za projekte koji ') }} <br> {{ __('pomjeraju granice tehnologije') }} </h1>
            </div>
        </div>
    </div>

    @include('public-part.home.includes.projects')
@endsection
