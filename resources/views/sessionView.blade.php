@extends('layouts.layout-main')   
@section('content')
<div class="container">

  <h1>Session</h1>

    <p>Usuário [name]: {{session('name')}}</p>
    <p>E-mail [email]: {{session('email')}}</p>
    <p>Tier [tier]: {{session('tier')}}</p>
    <p>ID [id]: {{session('id')}}</p>
</div>

<div class="container">
  <h4>Users:</h4>
  @foreach (session('users') as $user)
    <p>id: {{$user['id']}} | name: {{$user['name']}} | tier: {{$user['tier']}} | email: {{$user['email']}}</p>
  @endforeach
</div>

<div class="container">
  <h4>Orders:</h4>
  @foreach (session('orders') as $order)
    <p>id: {{$order->id}} | name: {{$order->user_id}} | tier: {{$order->title}} | email: {{$order->body}}</p>
  @endforeach
</div>
@endsection