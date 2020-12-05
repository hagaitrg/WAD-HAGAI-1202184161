@extends('layouts.app')
@section('content')
@if($orders == '[]')
<div class="text-center mt-5">
    <p>There is no data</p>
    <a href="/insert" class="btn btn-dark">Add Product</a>
</div>

@else
<h3 class="text-center mt-5 mb-5">Order</h3>
<div class="card-deck">
    @foreach($orders as $order)
    <div class="card" style="max-width: 400px;">
        <img src="/img/{{$order->img_path}}" class="card-img-top" height="350px">
        <div class="card-body">
            <h5 class="card-title">{{$order->name}}</h5>
            <p class=" card-text">{{$order->description}}</p>
            <h3 class="mb-3">${{$order->price}}</h3>
            <a href="/proses/{{$order->id}}" class="btn btn-success">Order Now</a>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection