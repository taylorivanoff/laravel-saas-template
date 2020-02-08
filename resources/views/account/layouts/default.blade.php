@extends('layouts.app')

@section('content')
    @yield('header')

    <div class="container">
        @include('layouts.partials.alerts._alerts')

        <div class="row mt-4">
            @yield('account.content')
        </div>
    </div>
@endsection
