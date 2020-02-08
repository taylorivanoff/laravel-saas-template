@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 border-bottom">
        <div class="container my-5">
            <p class="h4">Billing</p>
        </div>
    </div>
</div>
<div class="container">
    @include('layouts.partials.alerts._alerts')
    
    @yield('content')
@endsection