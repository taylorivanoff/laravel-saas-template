<div class="card-body p-0 pt-2">
    <div class="form-group row">
        <label for="name" class="col-md-4 control-label">Cancel</label>

        <div class="col-md-6">
            <form method="POST" action="{{ route('account.subscription.cancel.store') }}">
                @csrf

                <div class="form-group">
                    <p>
                        <small>You can cancel your subscription at any time and come back to where you left off.</small>
                    </p>    
                    <button type="submit" class="btn btn-outline-danger" id="cancel-subscription-button">
                        <span role="status" aria-hidden="true" id="cancel-loading"></span>
                        Cancel Subscription
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(function () {
            $('#cancel-subscription-button').click(function () {
                $('#cancel-loading').addClass('spinner-border spinner-border-sm mb-1');
                $('#cancel-subscription-button').addClass('disabled', true);
            });
        })
    </script>
@endsection