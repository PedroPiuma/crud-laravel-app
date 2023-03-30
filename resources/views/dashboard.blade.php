@extends('layouts.layout-main')   
@section('content')
<div class="container">

    <h1>DASHBOARD</h1>

    <h4>Usuários: </h4>
   <div class="users-list">
        <div class="accordion accordion-flush" id="accordion-users">
        @foreach (session()->get('users') as $user)
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
@endsection