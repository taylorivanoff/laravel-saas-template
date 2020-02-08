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

                <p class="text-center">Your {{ config('app.name') }} account activation link has been sent to {.</p>

                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('activation.resend.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label"><small>Enter your e-mail address.</small></label>

                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary my-2">
                                    Resend
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection