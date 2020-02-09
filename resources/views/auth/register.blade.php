@extends('layouts.plain')

@section('content')
    <div class="container">
        <div class="row" style="margin: 7rem 0 0 0">
            <div class="col-md-6 mx-auto">
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}">
                        <img src="/favicon.png" alt="" width="46"> 
                    </a>
                </div>

                <p class="text-center my-4 pt-3 pb-1">Sign up with {{ config('app.name') }} for free</p>

                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><small>Enter your email to get started.</small></label>

                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') ?: session('email') }}" required {{ session('email') ? '' : 'autofocus' }} placeholder="email address">
                                   @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('email') }}
                                        </div>
                                    @endif

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('full_name') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><small>Enter your full name.</small></label>

                                    <input id="full_name" type="text"
                                           class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                           name="full_name"
                                           value="{{ old('full_name') }}" required {{ session('email') ? 'autofocus' : '' }} placeholder="Taylor Ivanoff">

                                    @if ($errors->has('full_name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('full_name') }}</strong>
                                        </div>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><small>Choose a password with at least 8 characters.</small></label>

                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary my-2">
                                    Get Started
                                </button>
                            </div>
                        </form>
                        <small>Already have an account? <a href="{{ route('login') }}">Log in</a>.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
