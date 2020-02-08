@extends('subscriptions.plans.layouts.default')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">

			<div class="text-center my-5">
				<p class="h5 font-weight-bold">Upgrade your account</p>
				<p class="h6">You're currently on the free plan</p>
			</div>

			<div class="row my-5">
				@foreach ($plans as $plan)
					<plan
						:plan="{{ $plan }}"
					></plan>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@endsection


