@extends('layouts.layout-main')   
@section('content')
<div class="container">
    <h1>HOME</h1>
    <h4>Olá, {{session()->get('name')}}!</h4>
    <h5 class="mb-3">Preencha o formulário abaixo para realizar um pedido:</h5>

    <form action="{{route('order')}}" method="post">
        @csrf
        <select class="form-select mb-3" name="category-order">
            <option selected value="default">Categoria</option>
            <option value="eletrônico">Eletrônicos</option>
            <option value="móveis">Móveis</option>
            <option value="ferramentas">Ferramentas</option>
            <option value="consumíveis">Consumíveis</option>
            <option value="outros">Outros</option>
          </select>
        <div class="mb-3">
            <label for="orderTitle" class="form-label">Título do pedido:</label>
            <input type="text" class="form-control" id="orderTitle" name="orderTitle">
          </div>
          <div class="mb-3">
            <label for="orderBody" class="form-label">Descrição:</label>
            <textarea class="form-control" id="orderBody" name="orderBody" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @if ($errors -> any())
    <div class="alert alert-danger p-2 mt-4">
        @foreach ($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
    @endif
</div>

<div class="container">
   <h4>Seus pedidos:</h4>

     <div class="orders-list">
        <div class="accordion accordion-flush" id="accordion-orders">
        @foreach (session('orders') as $order)
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$order->id}}" aria-expanded="false" aria-controls="flush-collapse{{$order->id}}">
                {{$order->title}} ID: {{$order->id}}
            </button>
          </h2>
          <div id="flush-collapse{{$order->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion-orders">
            <div class="accordion-body">
                <p>ID: {{$order->id}}</p>
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