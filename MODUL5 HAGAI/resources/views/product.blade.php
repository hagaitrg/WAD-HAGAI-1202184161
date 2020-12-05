@extends('layouts.app')
@section('content')

@if($products == '[]')
<div class="text-center mt-5">
    <p>There is no data</p>
    <a href="/insert" class="btn btn-dark">Add Product</a>
</div>
@else
<h3 class="text-center mt-5 mb-5">List Product</h3>
<a href="/insert" class="btn btn-dark mb-3">Add Product</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $index=>$product)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>{{$product->name}}</td>
            <td>$ {{$product->price}}</td>
            <td>
                <form action="/delete/{{$product->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/update/{{$product->id}}" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection