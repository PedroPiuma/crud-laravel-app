<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionControler extends Controller
{
    public function sessionView()
    {
        // echo "<pre>";
        // print_r(session()->all());
        if (session('tier') === 1) {
            // echo "<pre>";
            // print_r(session()->all());
            return view('sessionView');
        } else {
            return redirect('/');
        }
    }
}
