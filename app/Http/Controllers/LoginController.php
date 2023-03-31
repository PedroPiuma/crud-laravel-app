<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    public function login()
    {
        if (session()->get('name')) return redirect('/');

        return view('login');
    }

    public function submit(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'email' => ['required', 'email:rfc,dns'],
                    'password' => 'required|min:4'
                ],
                [
                    'email.required' => 'É necessário um e-mail para login.',
                    'email.email' => 'É necessário um e-mail válido.',
                    'password.required' => 'É necessário uma senha para login.',
                    'password.min' => 'É necessário uma senha de 4 caracteres pelo menos.'
                ]
            );

            $email = $request->input('email');
            $password = $request->input('password');

            $user =  DB::table('users')->where(['email' => $email])->get()->first();
            session()->put([
                "id" => $user->id,
                'name' => $user->name,
                "email" => $user->email,
                'tier' => $user->tier
            ]);

            if ($user->password === $password && $user->tier === 1) {
                $users = DB::table('users')->get()->all();
                $data = ['users' => []];
                foreach ($users as $user) {
                    $data['users'][] = ["id" => $user->id, 'name' => $user->name, "email" => $user->email, 'tier' => $user->tier];
                }
                session()->put($data);
                return view('dashboard');
            } else {
                return view('home');
            }
        }
    }

    public function admin()
    {
        if (session('tier') !== 1) {
            return redirect('/');
        } else {
            $users = DB::table('users')->get()->all();
            $data = ['users' => []];
            foreach ($users as $user) {
                $data['users'][] = ["id" => $user->id, 'name' => $user->name, "email" => $user->email, 'tier' => $user->tier];
            }
            session()->put($data);

            return view('dashboard');
        }
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('tier');
        session()->forget('users');
        return redirect('/');
    }
}
