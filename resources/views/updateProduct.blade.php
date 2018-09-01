@extends('layout.master')

@section('title')
  Update a Product
@endsection

@section('content')
    <h2>Update a Product</h2>
    <form method="post" action="/updateProduct/{{$products[0]->id}}">
        {{csrf_field()}}
        <input type = "hidden" name = "id" value = "{{$products[0]->id}}"></input>
        <p>
            <label>Product Name:</label>
            <input type="text" class="form-control" name = "product_name" value="{{$products[0]->product_name}}"></input>
        </p>
        
        <p>
            <label>Product Type:</label>
            <input type="text" class="form-control" name = "product_type" value="{{$products[0]->product_type}}"></input>
        </p>
        
        <button type="submit">Save</button>
        

    </form>
@endsection