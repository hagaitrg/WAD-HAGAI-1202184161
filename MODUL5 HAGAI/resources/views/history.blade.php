@extends('layouts.app')
@section('content')

@if($getInfo == '[]')
<div class="text-center mt-5">
    <p>There is no data</p>
    <a href="/insert" class="btn btn-dark">Add Product</a>
</div>

@else
<h3 class="text-center mt-5 mb-5">History</h3>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Buyer Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($getInfo as $index => $info)
        <tr>

            <th scope="row">{{$index+1}}</th>
            <td>{{ $info->belongsToProduct->name }}</td>
            <td>{{ $info->buyer_name }}</td>
            <td>{{ $info->buyer_contact}}</td>
            <td>$ {{ $info->amount}}</td>

        </tr>
        @endforeach
    </tbody>
</table>

@endif
@endsection