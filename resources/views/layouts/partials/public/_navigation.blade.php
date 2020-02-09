<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top py-3">
    <div class="container">
        <a class="navbar-brand ml-2" href="{{ url('/') }}">
            <img src="{{ asset('/img/app-logo.png') }}" alt="{{ config('app.name') }}" width="128">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('plans.index'), ' active') }}"
                       href="#">
                        Features
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('plans.index'), ' active') }}"
                       href="#">
                        Pricing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('plans.index'), ' active') }}"
                       href="#">
                        Integrations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('plans.index'), ' active') }}"
                       href="#">
                        Solutions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('plans.index'), ' active') }}"
                       href="#">
                        For Teams
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link{{ return_if(on_page('register'), ' active') }} text-primary"
                           href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ return_if(on_page('login'), ' active') }}" href="{{ route('login') }}">
                            Log In
                        </a>
                    </li>
                @else
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link" href="{{ route('account.index') }}">
                            <img src="{{ auth()->user()->avatar() }}" class="rounded-circle" id="avatar-nav">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ return_if(on_page('account.index'), ' active') }}"
                           href="{{ route('account.index') }}">
                            My Account
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
