@extends('layouts.plain')

@section('content')
    <div class="container">
        <div class="row" style="margin: 7rem 0 0 0">
            <div class="col-md-6 mx-auto">
                <div class="text-center mb-4">
                    <a href="{{ route('account.index') }}">
                        <img src="https://source.unsplash.com/random/500x500" alt="" width="50"> 
                    </a>
                </div>

                <p class="text-center">Deactivate your {{ config('app.name') }} account.</p>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('account.deactivate.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="current_password" class="control-label"><small>Current password</small></label>

                                <input id="current_password" type="password"
                                       class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}"
                                       name="current_password"
                                       required autofocus>

                                @if ($errors->has('current_password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            @subscriptionnotcancelled
                            <div class="form-group">
                                <p class="form-text">
                                    <small><strong>This will also cancel your active subscription.</strong></small>
                                </p>
                            </div>
                            @endsubscriptionnotcancelled

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger my-2">
                                    Deactivate account
                                </button>

                                <p class="form-text mt-4">
                                    <small>Read more on account deactivation in our
                                    <a href="#">Privacy policy</a></small>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection