<div class="three__elements">
    <div class="element">
        <h5>{{ $success + $error }}</h5>
        <p>Calls</p>
    </div>
    <div class="element">
        <h5>{{ $success }}</h5>
        <p>Success</p>
    </div>
    <div class="element">
        <h5>{{ $error }}</h5>
        <p>Errors</p>
    </div>
</div>

<div class="rm-card">
    <div class="rm-card-header">
        <h5>{{ __('API Calls') }}</h5>
        <i class="fas fa-code"></i>
    </div>
    <hr>
    <div class="list__wrapper">
        <ol>
            @foreach($calls as $call)
                <li>
                    <a href="#">
                        {{ $call }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div>
