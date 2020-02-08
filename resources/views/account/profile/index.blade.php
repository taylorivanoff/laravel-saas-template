@extends('account.layouts.default')

@section('header')
    <div class="border-bottom">
        <div class="container my-5">
            <p class="h4">Account Settings</p>
        </div>
    </div>
@endsection

@section('account.content')
    <div class="col-md-3">
        @include('account.layouts.partials.profile._navigation')
    </div>

    <div class="col-md-9">
        <div class="card-body p-0 pt-2">

            <form method="POST" action="{{ route('account.profile.store') }}" enctype="multipart/form-data" id="profile-form">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4" id="avatar-uploader">
                        <img src="{{ auth()->user()->avatar() }}" class="rounded-circle mb-3" id="avatar-clickable">

                        <input type="file" id="avatar-upload" name="avatar"/>

                        @if ($errors->has('avatar'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }} mt-3">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name', auth()->user()->name) }}">

                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">Phone</label>

                    <div class="col-md-6">
                        <input id="phone" type="text"
                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                               value="{{ old('phone', auth()->user()->phone) }}">

                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="submit-button">
                            <span role="status" aria-hidden="true" id="profile-loading"></span> 
                            Save Changes
                        </button>
                        <a href class="btn btn-secondary-outline">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

            <div class="form-group row" style="margin-top: 4rem">
                <label class="col-md-4 control-label"></label>

                <div class="col-md-6">
                    <a class="btn btn-outline-danger" href="{{ route('account.deactivate.index') }}">Delete Account</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // $('#submit-button').attr('disabled', true);

        $('#avatar-clickable').on('click', function() {
            $('#avatar-upload').click();
        })

       $('#avatar-upload').on('change', function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    $("#avatar-clickable").attr("src", fr.result);
                }
                fr.readAsDataURL(files[0]);
            }
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        });

        $('#profile-form :input').on('input propertychange', function (e) {
            $('#submit-button').removeAttr('disabled');
        });

        $('#submit-button').click(function () {
            $('#profile-loading').addClass('spinner-border spinner-border-sm mb-1');

            $('#submit-button').addClass('disabled', true);
        });
    </script>
@endsection
