@extends('layouts.app')
@section('content')
<h3 class="text-center mt-5 mb-5">Update Product</h3>
<form action="/edit/{{$product->id}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$ USD</div>
            </div>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>
    </div>
    <div class="form-group">
        <label for="description">Price</label>
        <textarea type="text" class="form-control" name="description" rows="3">{{$product->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control col-sm-4" name="stock" value="{{$product->stock}}">
    </div>
    <div class="form-group">
        <label for="imgChange">Image File Input</label>
        <input type="file" name="imgChange" class="form-control-file" value="{{$product->img_path}}">
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
</form>
@endsection