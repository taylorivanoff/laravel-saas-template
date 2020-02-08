<div class="card-body p-0 pt-2">

    <form method="post" action="{{ route('account.subscription.swap.store') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 control-label">Change</label>

            <div class="col-md-6 font-weight-bold">
                <select name="plan" id="plan" class="form-control custom-select{{ $errors->has('plan') ? ' is-invalid' : '' }}" required>
                    @foreach($plans as $plan)
                        @unless(auth()->user()->plan->gateway_id == $plan->gateway_id)
                            <option value="{{ $plan->gateway_id }}">
                                {{ $plan->name }} (${{ $plan->price }})
                            </option>
                        @endunless
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="change-plan-button">
                    <span role="status" aria-hidden="true" id="change-loading"></span>
                    Change Plan
                </button>
            </div>
        </div>

    </form>
</div>

@section('scripts')
    <script>
        $(function () {
            $('#change-plan-button').click(function () {
                $('#change-loading').addClass('spinner-border spinner-border-sm mb-1');
                $('#change-plan-button').addClass('disabled', true);
            });
        })
    </script>
@endsection
