<?php

namespace Template\Http\Subscription\Controllers;

use Illuminate\Http\Request;
use Template\App\Controllers\Controller;
use Template\Domain\Subscriptions\Models\Plan;
use Template\Domain\Subscriptions\Requests\SubscriptionStoreRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscriptions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionStoreRequest $request)
    {
        $subscription = auth()->user()->newSubscription('main', $request->plan)->create($request->payment_method);

        $request->session()->flash('success', "🎉 You successfully upgraded to ".ucfirst($request->plan));
       
        return response()->json([
            'success' => true,
            'redirect_url' => route('account.index')
        ]);
    }
}
