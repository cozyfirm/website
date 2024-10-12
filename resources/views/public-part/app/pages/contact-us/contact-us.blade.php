@extends('public-part.layout.layout')

@section('content')
    <div class="contact_us_wrapper">
        <div class="contact_us_inner_wrapper">
            <div class="cu_i_w_form">
                <div class="cu_i_w_left">
                    <div class="cu_i_w_left_subheader">
                        <h3>{{ __('Imate pitanje? Ispunite formu i pošaljite nam poruku!') }}</h3>
                    </div>

                    <div class="cu_i_w_left_contact__form">
                        <div class="left_input__w">
                            <label for="cf_fname">{{ __('Ime i prezime') }}</label>
                            <input type="text" id="cf_name" name="cf_name">
                        </div>
                        <div class="left_input__w">
                            <label for="cf_phone">{{ __('Broj telefona') }}</label>
                            <input type="text" id="cf_phone" name="cf_phone" value="+387 ">
                        </div>
                        <div class="left_input__w input__w_full">
                            <label for="cf_email">{{ __('Email') }}</label>
                            <input type="text" id="cf_email" name="cf_email">
                        </div>

                        <div class="left_input__w input__w_full">
                            <label for="cf_message">{{ __('Vaša poruka') }}</label>
                            <textarea type="text" id="cf_message" name="cf_message" maxlength="500"> </textarea>
                        </div>

                        <div class="left_input__btn_w">
                            <p>
                                <input type="checkbox" id="cf_agree" name="cf_agree">
                                <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="{{ route('public-part.pages.terms-and-conditions') }}" target="_blank">{{ __('uslovima korištenja.') }}</a></label>
                            </p>
                            <button class="send_us_message" attr="contact-form">{{ __('Pošaljte nam poruku') }}</button>
                        </div>
                    </div>
                </div>
                <div class="cu_i_w_right">
                    <div class="cu_i_w_right_one">
                        <div class="cu_i_w_right_one_1">
                            <h6>{{ __('Za upite kontaktirajte: ') }}</h6>
                        </div>
                        <div class="cu_i_w_right_one_2">
                            <div class="cu_i_w_right_one_2_1">
                                <h6> {{ __('Sjedište') }} </h6>
                                <p> +387 61 509 518 </p>
                                <p> info@cozyfirm.com </p>
                            </div>
                        </div>
                    </div>
                    <div class="cu_i_w_right_two">
                        <div class="cu_i_w_right_two_1">
                            <h6>{{ __('Cozy Firm d.o.o') }}</h6>
                            <p>{{ __('Kobilja glava 35') }}</p>
                            <p>{{ __('71000 Sarajevo, BiH') }}</p>
                        </div>
                    </div>
                    <div class="cu_i_w_right_three">
                        <div class="cu_i_w_right_three_inner">
                            <div class="cu_i_w_right_three_fb">
                                <a target="_blank" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="svg-path" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a target="_blank" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="svg-path" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_yt">
                                <a target="_blank" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="svg-path" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_twitter">
                                <a target="_blank" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="svg-path" d="M448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM265.8 407.7c0-1.8 0-6 .1-11.6c.1-11.4 .1-28.8 .1-43.7c0-15.6-5.2-25.5-11.3-30.7c37-4.1 76-9.2 76-73.1c0-18.2-6.5-27.3-17.1-39c1.7-4.3 7.4-22-1.7-45c-13.9-4.3-45.7 17.9-45.7 17.9c-13.2-3.7-27.5-5.6-41.6-5.6s-28.4 1.9-41.6 5.6c0 0-31.8-22.2-45.7-17.9c-9.1 22.9-3.5 40.6-1.7 45c-10.6 11.7-15.6 20.8-15.6 39c0 63.6 37.3 69 74.3 73.1c-4.8 4.3-9.1 11.7-10.6 22.3c-9.5 4.3-33.8 11.7-48.3-13.9c-9.1-15.8-25.5-17.1-25.5-17.1c-16.2-.2-1.1 10.2-1.1 10.2c10.8 5 18.4 24.2 18.4 24.2c9.7 29.7 56.1 19.7 56.1 19.7c0 9 .1 21.7 .1 30.6c0 4.8 .1 8.6 .1 10c0 4.3-3 9.5-11.5 8C106 393.6 59.8 330.8 59.8 257.4c0-91.8 70.2-161.5 162-161.5s166.2 69.7 166.2 161.5c.1 73.4-44.7 136.3-110.7 158.3c-8.4 1.5-11.5-3.7-11.5-8zm-90.5-54.8c-.2-1.5 1.1-2.8 3-3.2c1.9-.2 3.7 .6 3.9 1.9c.3 1.3-1 2.6-3 3c-1.9 .4-3.7-.4-3.9-1.7zm-9.1 3.2c-2.2 .2-3.7-.9-3.7-2.4c0-1.3 1.5-2.4 3.5-2.4c1.9-.2 3.7 .9 3.7 2.4c0 1.3-1.5 2.4-3.5 2.4zm-14.3-2.2c-1.9-.4-3.2-1.9-2.8-3.2s2.4-1.9 4.1-1.5c2 .6 3.3 2.1 2.8 3.4c-.4 1.3-2.4 1.9-4.1 1.3zm-12.5-7.3c-1.5-1.3-1.9-3.2-.9-4.1c.9-1.1 2.8-.9 4.3 .6c1.3 1.3 1.8 3.3 .9 4.1c-.9 1.1-2.8 .9-4.3-.6zm-8.5-10c-1.1-1.5-1.1-3.2 0-3.9c1.1-.9 2.8-.2 3.7 1.3c1.1 1.5 1.1 3.3 0 4.1c-.9 .6-2.6 0-3.7-1.5zm-6.3-8.8c-1.1-1.3-1.3-2.8-.4-3.5c.9-.9 2.4-.4 3.5 .6c1.1 1.3 1.3 2.8 .4 3.5c-.9 .9-2.4 .4-3.5-.6zm-6-6.4c-1.3-.6-1.9-1.7-1.5-2.6c.4-.6 1.5-.9 2.8-.4c1.3 .7 1.9 1.8 1.5 2.6c-.4 .9-1.7 1.1-2.8 .4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
