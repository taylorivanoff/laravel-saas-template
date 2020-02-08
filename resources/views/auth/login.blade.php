@extends('layouts.plain')

@section('content')
    <div class="container">
        <div class="row" style="margin: 7rem 0 0 0">
            <div class="col-md-6 mx-auto">
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}">
                        <img src="https://source.unsplash.com/random/500x500" alt="" width="50"> 
                    </a>
                </div>

                <p class="text-center">Log into your {{ config('app.name') }} account.</p>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><small>Enter your e-mail address.</small></label>
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}" required autofocus placeholder="email address">

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label"><small>Enter your password.</small></label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required placeholder="password">

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">
                                    Login
                                </button>
                            </div>

                            <div class="form-group">
                                
                            </div>
                        </form>
                        <div class="form-group">
                            <div>
                                
                            <a class="text-primary" href="{{ route('password.request') }}">
                                <small>Forgot Your Password?</small>
                            </a>
                            <small>or</small> 
                            <a class="text-primary text-right" href="{{ route('activation.resend') }}">
                                <small>Resend Activation Email</small>
                            </a>
<br>
                                <small>Don't have an account? <a href="{{ route('register') }}">Sign up</a>.</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection