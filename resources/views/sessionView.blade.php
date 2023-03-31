@extends('layouts.layout-main')   
@section('content')
<div class="container">

  <h1>Session</h1>

    <p>Usuário [name]: {{session('name')}}</p>
    <p>E-mail [email]: {{session('email')}}</p>
    <p>Tier [tier]: {{session('tier')}}</p>
    <p>ID [id]: {{session('id')}}</p>
</div>
@endsection