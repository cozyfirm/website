<div class="contact__us_wrapper">
    <div class="contact__us__inner">
        <div class="cui__form">
            <div class="header">
                <h3>{{ __('Kontaktirajte nas') }}</h3>
            </div>
            <div class="form__elements">
                <div class="form__element form__element__full">
                    <label for="name">{{ __('Vaše ime') }}</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form__element">
                    <label for="email">{{ __('Vaš email') }}</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form__element">
                    <label for="phone">{{ __('Vaš telefon') }}</label>
                    <input type="text" name="phone" id="phone" value="+387 ">
                </div>
                <div class="form__element form__element__full">
                    <label for="message">{{ __('Vaša poruka') }}</label>
                    <textarea name="message" id="message"></textarea>
                </div>
                <div class="form__element form__element__full form__element__between">
                    <div class="icn__wrapper">
                        <input type="checkbox">
                        <p>
                            {{ __('Slažem se sa') }} <a href="#">{{ __('uslovima korištenja') }}.</a>
                        </p>
                    </div>
                    <button>{{ __('Pošalji poruku') }}</button>
                </div>
            </div>
        </div>
        <div class="cui__map">
            <div class="cui__map__stretch">
                <div class="inside__map" id="inside__map"> </div>
            </div>
        </div>
    </div>
</div>
