@extends('layouts.app')
@section('content')
<h3 class="text-center mt-5 mb-5">Order</h3>
<div class="card col-sm-12 mb-5">
    <div class="row no-gutters">
        <div class="col-sm-7">
            <img src="/img/{{$order->img_path}}" class="card-img">
        </div>
        <div class="col-sm-5">
            <div class="card-body">
                <h5 class="card-title">{{$order->name}}</h5>
                <p class="card-text">{{$order->description}}</p>
                <p class="card-text">Stock : {{$order->stock}}</p>
                <h3>${{$order->price}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-body">
        <h3 class="card-title text-center">Buyer Information</h3>
        <form action="/prosesOrder" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$order->id}}">
            <input type="hidden" name="price" value="{{$order->price}}">
            <input type="hidden" name="id" value="{{$order->id}}">
            <div class="form-group">
                <label for="buyerName">Name</label>
                <input type="text" class="form-control" name="buyerName">
            </div>
            <div class="form-group">
                <label for="buyerContact">Contact</label>
                <input type="text" class="form-control" name="buyerContact">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control col-sm-4" name="quantity">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

@endsection