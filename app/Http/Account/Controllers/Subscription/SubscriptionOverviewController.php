<?php

namespace Template\Http\Account\Controllers\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Template\App\Controllers\Controller;
use Template\Domain\Subscriptions\Models\Plan;

class SubscriptionOverviewController extends Controller
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
        }

        return view('account.subscription.index', compact('plans'));
    }
}
