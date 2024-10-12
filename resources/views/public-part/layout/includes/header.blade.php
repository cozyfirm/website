<header class="@isset($white) force-white @endisset">
    <div class="inner__header">
        <div class="inner__h__links">
            <div class="ihl__logo">
                <a href="{{ route('public-part.home') }}">
                    <img class="white-logo" src="{{ asset('files/images/default/logo_white.png') }}" alt="">
                    <img class="black-logo" src="{{ asset('files/images/default/logo.png') }}" alt="">
                </a>
            </div>
            <div class="ihl__links">
                <div class="ihl__link">
                    <a href="{{ route('public-part.pages.about-us') }}">{{ __('O nama') }}</a>
                </div>
                <div class="ihl__link">
                    <p>{{ __('Naši proizvodi i usluge') }}</p>
                    <i class="fas fa-chevron-down"></i>

                    <div class="submenu__wrapper">
                        <div class="submenu__link">
                            <h6>{{ __('IT') }}</h6>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Web Development') }}</a>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Mobilne aplikacije') }}</a>
                        </div>

                        <hr>

                        <div class="submenu__link">
                            <h6>{{ __('Inženjering') }}</h6>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Embedded systems') }}</a>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('PCBs') }}</a>
                        </div>
                    </div>
                </div>
                <div class="ihl__link">
                    <a href="{{ route('public-part.blog') }}">{{ __('Blog') }}</a>
                    <i class="fas fa-chevron-down"></i>

                    <div class="submenu__wrapper">
                        <div class="submenu__link">
                            <h6>{{ __('Najnovije') }}</h6>
                        </div>
                        @foreach($lastPosts as $post)
                            <div class="submenu__link">
                                <a href="{{ route('public-part.blog.preview', ['id' => $post->id ]) }}">{{ $post->title ?? '' }}</a>
                            </div>
                        @endforeach

                        <hr>

                        <div class="submenu__link">
                            <h6>{{ __('Kategorije') }}</h6>
                        </div>
                        @foreach($blogCategories as $category)
                            <div class="submenu__link">
                                <a href="{{ route('public-part.blog.with-categories', ['id' => $category->id ]) }}">{{ $category->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="ihl__link">
                    <a href="{{ route('public.part.contact-us') }}">{{ __('Kontaktirajte nas') }}</a>
                </div>
            </div>
        </div>
        <div class="inner__h__btns">
            <a href="#" class="desktop__version">
                <div class="ihb__btn ihb__btn_borderless">
                    {{ __('FAQs') }}
                </div>
            </a>
            <a href="{{ route('public-part.auth') }}" class="desktop__version">
                <div class="ihb__btn">
                    {{ __('Prijavite se') }}
                </div>
            </a>

            <div class="ihb__btn ihb__btn_borderless open__mobile_menu">
                <img class="burger-white" src="{{ asset('files/images/default/burger.png') }}" alt="">
                <img class="burger-black" src="{{ asset('files/images/default/burger_black.png') }}" alt="">
            </div>
        </div>
    </div>
</header>

<div class="mobile__header @isset($white) force-white @endisset">
    <div class="mh__header">
        <div class="logo_wrapper">
            <img src="{{ asset('files/images/default/logo.png') }}" alt="">
        </div>

        <i class="fas fa-times close__mobile_menu"></i>
    </div>

    <div class="mh__body">
        <div class="single_link">
            <div class="link__text">
                <a href="{{ route('public-part.pages.about-us') }}">
                    <h4>{{ __('O nama') }}</h4>
                </a>
            </div>
        </div>

        <div class="single_link single_link_clickable active" id="mm-our-products">
            <div class="link__text">
                <h4>{{ __('Naši proizvodi i usluge') }}</h4>
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="submenu__wrapper">
                <div class="submenu__link">
                    <h6>{{ __('IT') }}</h6>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Web Development') }}</a>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Mobilne aplikacije') }}</a>
                </div>

                <hr>

                <div class="submenu__link">
                    <h6>{{ __('Inženjering') }}</h6>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Embedded systems') }}</a>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('PCBs') }}</a>
                </div>
            </div>
        </div>

        <div class="single_link">
            <div class="link__text">
                <a href="#">
                    <h4>{{ __('FAQs') }}</h4>
                </a>
            </div>
        </div>

        <div class="single_link">
            <div class="link__text">
                <a href="{{ route('public.part.contact-us') }}">
                    <h4>{{ __('Kontaktirajte nas') }}</h4>
                </a>
            </div>
        </div>

        <div class="single_link single_link_clickable" id="mm-blog">
            <div class="link__text">
                <h4>{{ __('Blog') }}</h4>
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="submenu__wrapper">
                @foreach($lastPosts as $post)
                    <div class="submenu__link">
                        <a href="{{ route('public-part.blog.preview', ['id' => $post->id ]) }}">{{ $post->title ?? '' }}</a>
                    </div>
                @endforeach

                <hr>

                <div class="submenu__link">
                    <h6>{{ __('Kategorije') }}</h6>
                </div>
                @foreach($blogCategories as $category)
                    <div class="submenu__link">
                        <a href="{{ route('public-part.blog.with-categories', ['id' => $category->id ]) }}">{{ $category->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="single_link">
            <a href="{{ route('public-part.auth') }}">
                <button>{{ __('Prijavite se') }}</button>
            </a>
        </div>
    </div>
</div>

