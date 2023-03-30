@extends('layouts.layout-main')   
@section('content')
<div class="container">

    <form action="{{route('submit')}}" method="post" class="form-login">

        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <label for="password" class="form-label">Senha:</label>
        <div class="input-group mb-3 pass-container">
            <input type="password" name="password" class="form-control password">
            <div class="input-group-text eye-box">
                <i class="bi bi-eye-fill" id="open-eye" style="display: none"></i>
                <i class="bi bi-eye-slash-fill" id="closed-eye"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Acessar</button>
    </form>

        
    @if ($errors -> any())
        <div class="alert alert-danger p-2 mt-4">
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif
</div>
@endsection