<?php

namespace Template\Http\Subscription\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Template\App\Controllers\Controller;
use Template\Domain\Subscriptions\Models\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::active()
            ->forUsers()
            ->get();

        foreach ($plans as $plan) {
            Arr::add($plan, 
                'intent', auth()->user()->createSetupIntent()
            );

            Arr::add($plan, 
                'stripe_public_key', config('services.stripe.key')
            );

            Arr::add($plan, 
                'route', route('subscription.store')
            );
        }

        return view('subscriptions.plans.index', compact('plans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Template\Domain\Subscriptions\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {   
        return view('subscriptions.plans.show', compact('plan'));
    }
}
