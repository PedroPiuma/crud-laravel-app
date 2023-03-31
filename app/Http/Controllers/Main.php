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

        $orders = DB::table('orders')->where('user_id', session('id'))->get()->all();
        session()->put('orders', $orders);
        if (session('name')) {
            return view('home');
        } else {
            return redirect('/login');
        }
    }

    public function order(Request $request)
    {
        $request->validate(
            [
                'category-order' => ['required'],
                'orderTitle' => 'required|min:4',
                'orderBody' => 'required'
            ],
            [
                'category-order.required' => 'É necessário selecionar a categoria do pedido.',
                'orderTitle.required' => 'É necessário um título.',
                'orderBody.required' => 'É necessário uma descrição.',
            ]
        );

        $categoryOrder = $request->input('category-order');
        $orderTitle = $request->input('orderTitle');
        $orderBody = $request->input('orderBody');

        DB::table('orders')->insert([
            'user_id' => session('id'),
            'title' => $orderTitle,
            'body' => "Categoria: $categoryOrder | $orderBody"
        ]);

        return redirect('/');
    }
}
