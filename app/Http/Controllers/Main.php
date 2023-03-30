<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Main extends Controller
{
    public function home()
    {
        // DB::table('users')->insert(['name' => 'teste', 'email' => 'teste7@gmail.com', 'password' => '123456']);
        // $users = DB::table('users')->get()->all();
        // print_r(session()->all());
        if (session('name')) {
            return view('home');
        } else {
            return redirect('/login');
        }
    }
}
