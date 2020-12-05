@extends('layouts.app')
@section('content')
<h3 class="text-center mt-5 mb-5">Input Product</h3>
<form action="/proses_product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$ USD</div>
            </div>
            <input type="text" class="form-control" name="price">
        </div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control col-sm-4" name="stock">
    </div>
    <div class="form-group">
        <label for="img">Image File Input</label>
        <input type="file" name="img" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
</form>
@endsection