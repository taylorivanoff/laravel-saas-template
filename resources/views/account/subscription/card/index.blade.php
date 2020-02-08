<div class="card-body p-0 pt-2">
    <div class="form-group row">
        <label for="name" class="col-md-4 control-label">Payment Method</label>

        <div class="col-md-6">
            <form v-on:submit.prevent>
                <div class="form-group">
                    <p>
                        <strong>{{ ucfirst(auth()->user()->card_brand) }} *{{ auth()->user()->card_last_four }}</strong>
                    </p>

                    <update-card
                        stripe="{{ config('services.stripe.key') }}"
                        route="{{ route('account.subscription.card.store') }}"
                    ></update-card>
                </div>
            </form>
        </div>
    </div>
</div>