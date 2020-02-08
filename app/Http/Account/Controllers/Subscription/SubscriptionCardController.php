<?php

namespace Template\Http\Account\Controllers\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Template\App\Controllers\Controller;
use Template\Domain\Account\Mail\Subscription\CardUpdated;

class SubscriptionCardController extends Controller
{
    /**
     * Show update card form.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('account.subscription.card.index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $user->deletePaymentMethods();
        $user->updateDefaultPaymentMethod($request->payment_method);

        Mail::to($user)->send(new CardUpdated());

        session()->flash('success', "Your card has been updated.");
       
        return response()->json([
            'success' => true,
            'redirect_url' => route('account.subscription.overview.index')
        ]);
    }
}
