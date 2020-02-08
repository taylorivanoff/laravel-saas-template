<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials._head')
    </head>
    <body>
        <div id="app">
            <main>
                <div class="container col-md-6">
                    @include('layouts.partials.alerts._alerts')
                </div>

                @yield('content')
            </main>
        </div>

        @include('layouts.partials._scripts')
    </body>
</html>
