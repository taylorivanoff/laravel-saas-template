<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('account.index') }}">
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                @subscribed
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Companies <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($user_companies as $company)
                            <a class="dropdown-item" href="{{ route('tenant.dashboard', $company) }}">
                                {{ $company->name }}
                            </a>
                            @if($loop->last)
                                <div class="dropdown-divider"></div>
                            @endif
                        @endforeach

                        <!-- Create New Company Link -->
                        <a class="dropdown-item" href="{{ route('account.companies.create') }}">
                            New company
                        </a>

                        <!-- View All Link -->
                        <a class="dropdown-item" href="{{ route('account.companies.index') }}">
                            View all
                        </a>
                    </div>
                </li>

                <!-- Projects -->
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('tenant.projects.index'), ' active') }}"
                       href="{{ route('tenant.projects.index') }}">
                        Projects
                    </a>
                </li>
                @endsubscribed
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('home'), ' active') }}"
                       href="{{ route('home') }}">
                       Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('account.integrations'), ' active') }}"
                       href="{{ route('account.index') }}">
                       Integrations
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ return_if(on_page('account.help'), ' active') }}"
                       href="{{ route('account.index') }}">
                       Help
                    </a>
                </li>
        
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="{{ route('account.profile.index') }}">
                        <img src="{{ auth()->user()->avatar() }}" class="rounded-circle" id="avatar-nav">
                    </a>
                </li>

                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link {{ return_if(on_page('account.profile.index'), ' active') }} dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Impersonating -->
                        @impersonating
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('impersonate-form').submit();">
                            Stop Impersonating
                        </a>
                        <form id="impersonate-form" action="{{ route('admin.users.impersonate.destroy') }}"
                              method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endimpersonating

                        <!-- Admin Panel Link -->
                        @role('admin')
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                            Admin Panel
                        </a>
                        @endrole

                        <!-- User Account Link -->
                        <a class="dropdown-item" href="{{ route('account.profile.index') }}">
                            Account Settings
                        </a>

                        @notsubscribed
                        <a class="dropdown-item" href="{{ route('plans.index') }}">
                            Plans
                        </a>
                        @endnotsubscribed

                        @subscribed
                        <a class="dropdown-item" href="{{ route('account.subscription.overview.index') }}">
                            Billing
                        </a>
                        @endsubscribed

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        @include('layouts.partials.forms._logout')
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
