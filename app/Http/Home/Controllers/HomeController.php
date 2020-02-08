<?php

namespace Template\Http\Home\Controllers;

use Illuminate\Http\Request;
use Template\App\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function signup(Request $request) {
        return redirect()->route('register')->with('email', $request->email);
    }
}
