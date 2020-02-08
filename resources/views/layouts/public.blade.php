<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    <div id="app">

        @include('layouts.partials.public._navigation')

        <main>
            <div class="container">
                @include('layouts.partials.alerts._alerts')
            </div>

            <div class="container px-4">
                @yield('content')
            </div>
        </main>

        @include('layouts.partials._footer')

    </div>

    @include('layouts.partials._scripts')
</body>
</html>
