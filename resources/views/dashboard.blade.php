@extends('layouts.layout-main')   
@section('content')
<div class="container">

    <h1>DASHBOARD</h1>
    <h4>Olá, {{session()->get('name')}}!</h4>

    <h4>Usuários: </h4>
   <div class="users-list">
        <div class="accordion accordion-flush" id="accordion-users">
        @foreach (session('users') as $user)
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$user['id']}}" aria-expanded="false" aria-controls="flush-collapse{{$user['id']}}">
                {{$user['name']}} #ID: {{$user['id']}}
            </button>
          </h2>
          <div id="flush-collapse{{$user['id']}}" class="accordion-collapse collapse" data-bs-parent="#accordion-users">
            <div class="accordion-body">
                <p>ID: {{$user['id']}}</p>
                <p>Nome: {{$user['name']}}</p>
                <p>E-mail: {{$user['email']}}</p>
                <p>Tier: {{$user['tier']}}</p>
            </div>
          </div>
        </div>
        @endforeach
     </div>
   </div>
</div>

<div class="container">
    <h4>Pedidos:</h4>
    
    {{-- @foreach (session('orders') as $order)
      <p>{{$order->title}}</p>
      <p>{{$order->body}}</p>
    @endforeach --}}

    <div class="order-list">
      <div class="accordion accordion-flush" id="accordion-order">
      @foreach (session('orders') as $order)
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-order-{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse-order-{{$order->id}}">
              {{$order->title}} #ID: {{$order->id}}
          </button>
        </h2>
        <div id="flush-collapse-order-{{$order->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-order">
          <div class="accordion-body">
              <p>ID: {{$order->id}}</p>
              <p>ID do usuário: {{$order->user_id}}</p>
              <p>Título: {{$order->title}}</p>
              <p>Descrição: {{$order->body}}</p>
          </div>
        </div>
      </div>
      @endforeach
   </div>
 </div>


</div>
@endsection