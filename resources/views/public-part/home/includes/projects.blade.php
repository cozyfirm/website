

<div class="projects_wrapper">
    <div class="projects__inner">
        <div class="inner__menu">
            <div class="pm__header__elem">
                <img src="{{ asset('files/images/icons/logo_icon.png') }}" alt="">
                <p>cozyfirm</p>

            </div>
            <div class="pm__header__elem">
                <img src="{{ asset('files/images/icons/gear.png') }}" alt="">
            </div>
        </div>

        <div class="second__menu">
            <div class="inner_abs_tab"></div>
            <div class="sm__tab active">
                <p>{{ __('Razvoj IT') }}</p>
                <img src="{{ asset('files/images/icons/branch.png') }}" alt="">
            </div>
            <div class="sm__tab">
                <p>PCBs</p>
                <img src="{{ asset('files/images/icons/pulsing-heart-2.png') }}" alt="">
            </div>
            <div class="sm__tab">
                <p>{{ __('Ostale aktivnosti') }}</p>
                <img src="{{ asset('files/images/icons/other.png') }}" alt="">
            </div>
        </div>

        <div class="tables_wrapper">
            <div class="table__wrapper">
                <div class="table__subheader">
                    <div class="circle"></div>
                    <h6>{{ __('U progresu') }}</h6>
                    <div class="total__projects"> Ukupno {{ $inProgress->count() }} </div>
                    <p> {{ __('Projekat u fazi razvoja') }} </p>
                </div>

                @php $counter = 1; @endphp
                @foreach($inProgress as $project)
                    <div class="project__row">
                        <div class="pr_col pr_col_first"> {{ $counter++  }}. </div>
                        <div class="pr_col pr_col_project"> <img src="{{ asset('files/images/icons/in-progress-0ff.png') }}" alt=""> {{ $project->title }} </div>
                        <div class="pr_col pr_col_col"> {{ $project->category }} </div>
                        <div class="pr_col pr_col_col"> <img src="{{ asset('files/images/icons/commit.png') }}" alt=""> {{ $project->commits }} </div>
                        <div class="pr_col pr_col_users"> {{ $project->collaborators }} </div>
                        <div class="pr_col pr_col_more" title="{{ __('Više informacija') }}">
                            <a href="{{ $project->link }}">više info</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="table__wrapper table__wrapper__beta">
                <div class="table__subheader">
                    <div class="circle circle__beta"></div>
                    <h6> {{ __('Beta distribucija') }} </h6>
                    <div class="total__projects"> Ukupno {{ $beta->count() }} </div>
                    <p> {{ __('Inicijalna faza projekta') }} </p>
                </div>

                @php $counter = 1; @endphp
                @foreach($beta as $project)
                    <div class="project__row">
                        <div class="pr_col pr_col_first"> {{ $counter++  }}. </div>
                        <div class="pr_col pr_col_project"> <img src="{{ asset('files/images/icons/beta.png') }}" alt=""> {{ $project->title }} </div>
                        <div class="pr_col pr_col_col"> {{ $project->category }} </div>
                        <div class="pr_col pr_col_col"> <img src="{{ asset('files/images/icons/commit.png') }}" alt=""> {{ $project->commits }} </div>
                        <div class="pr_col pr_col_users"> {{ $project->collaborators }} </div>
                        <div class="pr_col pr_col_more">
                            <a href="{{ $project->link }}">više info</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="table__wrapper">
                <div class="table__subheader">
                    <div class="circle circle__launched"></div>
                    <h6> {{ __('Završeno') }} </h6>
                    <div class="total__projects"> Ukupno {{ $production->count() }} </div>
                    <p> {{ __('Projekti u produkcionom okruženju') }} </p>
                </div>

                @php $counter = 1; @endphp
                @foreach($production as $project)
                    <div class="project__row">
                        <div class="pr_col pr_col_first"> {{ $counter++  }}. </div>
                        <div class="pr_col pr_col_project"> <img src="{{ asset('files/images/icons/launch.png') }}" alt=""> {{ $project->title }} </div>
                        <div class="pr_col pr_col_col"> {{ $project->category }} </div>
                        <div class="pr_col pr_col_col"> <img src="{{ asset('files/images/icons/commit.png') }}" alt=""> {{ $project->commits }} </div>
                        <div class="pr_col pr_col_users"> {{ $project->collaborators }} </div>
                        <div class="pr_col pr_col_more">
                            <a href="{{ $project->link }}">više info</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
