<header>
    <div class="inner__header">
        <div class="inner__h__links">
            <div class="ihl__logo">
                <img src="{{ asset('files/images/default/logo_white.png') }}" alt="">
            </div>
            <div class="ihl__links">
                <div class="ihl__link">
                    <a href="#">{{ __('O nama') }}</a>
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
                    <p>{{ __('Blog') }}</p>
                    <i class="fas fa-chevron-down"></i>

                    <div class="submenu__wrapper">
                        <div class="submenu__link">
                            <h6>{{ __('Najnovije') }}</h6>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Software') }}</a>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Embedded Systems') }}</a>
                        </div>

                        <hr>

                        <div class="submenu__link">
                            <h6>{{ __('Tehnologije') }}</h6>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('Web Based') }}</a>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('React Native') }}</a>
                        </div>
                        <div class="submenu__link">
                            <a href="#">{{ __('C / C++') }}</a>
                        </div>
                    </div>
                </div>
                <div class="ihl__link">
                    <a href="#">{{ __('Kontaktirajte nas') }}</a>
                </div>
            </div>
        </div>
        <div class="inner__h__btns">
            <a href="#" class="desktop__version">
                <div class="ihb__btn ihb__btn_borderless">
                    {{ __('FAQs') }}
                </div>
            </a>
            <a href="#" class="desktop__version">
                <div class="ihb__btn">
                    {{ __('Prijavite se') }}
                </div>
            </a>

            <div class="ihb__btn ihb__btn_borderless open__mobile_menu">
                <img src="{{ asset('files/images/default/burger.png') }}" alt="">
            </div>
        </div>
    </div>
</header>

<div class="mobile__header">
    <div class="mh__header">
        <div class="logo_wrapper">
            <img src="{{ asset('files/images/default/logo.png') }}" alt="">
        </div>

        <i class="fas fa-times close__mobile_menu"></i>
    </div>

    <div class="mh__body">
        <div class="single_link">
            <div class="link__text">
                <a href="#">
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
                <a href="#">
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
                <div class="submenu__link">
                    <h6>{{ __('Najnovije') }}</h6>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Software') }}</a>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Embedded Systems') }}</a>
                </div>

                <hr>

                <div class="submenu__link">
                    <h6>{{ __('Tehnologije') }}</h6>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('Web Based') }}</a>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('React Native') }}</a>
                </div>
                <div class="submenu__link">
                    <a href="#">{{ __('C / C++') }}</a>
                </div>
            </div>
        </div>

        <div class="single_link">
            <a href="#">
                <button>{{ __('Prijavite se') }}</button>
            </a>
        </div>
    </div>
</div>

