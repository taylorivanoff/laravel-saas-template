@extends('account.layouts.default')

@section('header')
    <div class="border-bottom">
        <div class="container my-5">
            <p class="h4">Billing</p>
        </div>
    </div>
@endsection

@section('account.content')
    <div class="col-md-3">
        @include('account.layouts.partials.billing._navigation')
    </div>

    <div class="col-md-9">
        @subscribed
            @notpiggybacksubscription
                  
                @subscriptionnotcancelled
                <div class="card-body p-0 pt-2">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 control-label">Plan</label>

                        <div class="col-md-6 font-weight-bold">
                            <p class="text-primary">{{ auth()->user()->plan->name }}</p>
                        </div>
                    </div>
                </div>
                @endsubscriptionnotcancelled

                @subscriptioncancelled
                @include('account.subscription.resume.index')
                @endsubscriptioncancelled

                @include('account.subscription.card.index')
            
                @subscriptionnotcancelled
                @include('account.subscription.swap.index')
                @include('account.subscription.cancel.index')
                @endsubscriptionnotcancelled

                @teamsubscription
                @include('account.subscription.team.index')
                @endteamsubscription
            @endnotpiggybacksubscription
        @endsubscribed
    </div>
@endsection