<div class="card-body p-0 pt-2">
    <div class="form-group row">
        <label for="name" class="col-md-4 control-label">Resume</label>

        <div class="col-md-6">
            <form method="POST" action="{{ route('account.subscription.resume.store') }}">
                @csrf

                <div class="form-group">
                    <p>
                        <small>Resume your subscription to go back to where you left off.</small>
                    </p>    
                    <button type="submit" class="btn btn-success" id="resume-subscription-button">
                        <span role="status" aria-hidden="true" id="resume-loading"></span>
                        Resume Subscription
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(function () {
            $('#resume-subscription-button').click(function () {
                $('#resume-loading').addClass('spinner-border spinner-border-sm mb-1');
                $('#resume-subscription-button').addClass('disabled', true);
            });
        })
    </script>
@endsection