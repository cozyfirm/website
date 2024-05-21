<div class="text__editor__w">
    <div class="te__inner">
        <div class="te__header">
            <div class="te__header__elem">
                <img src="{{ asset('files/images/icons/logo_icon.png') }}" alt="">
                <p>cozyfirm</p>
            </div>
            <div class="te__header__elem">
                <img src="{{ asset('files/images/icons/branch.png') }}" alt="">
                <p>main</p>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>

        <div class="te__body">
            <div class="te__controls">
                <div class="top__icons">
                    <div class="icon__wrapper active">
                        <img src="{{ asset('files/images/icons/folder.png') }}" alt="">
                    </div>
                    <div class="icon__wrapper">
                        <img src="{{ asset('files/images/icons/commit.png') }}" alt="">
                    </div>
                    <div class="icon__wrapper">
                        <img src="{{ asset('files/images/icons/pull.png') }}" alt="">
                    </div>

                    <hr>

                    <div class="icon__wrapper">
                        <img src="{{ asset('files/images/icons/structure.png') }}" alt="">
                    </div>
                </div>

                <div class="bottom__icons">
                    <div class="icon__wrapper">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="icon__wrapper">
                        <i class="fas fa-code-branch"></i>
                    </div>
                </div>
            </div>
            <div class="editor__wrapper">
                <div class="editor__wrapper__tabs">
                    <div class="tab active">
                        <i class="fas fa-c"></i>
                        <p>AuthController.php</p>
                    </div>
                    <div class="tab">
                        <i class="fa-brands fa-sass"></i>
                        <p>style.scss</p>
                    </div>
                </div>
                <div class="editor__wrapper__editor">
                    <div class="editor__w__numbers"></div>
                    <div class="ewe_text">
                        {!! $HomeController->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
