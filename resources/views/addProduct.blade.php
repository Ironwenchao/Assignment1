@extends('layout.master')

@section('title')
  Add Product
@endsection

@section('content')
  <form method="post" action="/addProductAction">
  {{csrf_field()}}
    <p>
      <label for="product_name">Product Name:</label>
      <input id="product_name" type="text" name="product_name">
    </p>
    
    
    <div>
        <label>Please choose a manufacturer</label>
        <select name = "id">
            @foreach($manufacturers as $manufacturer)        
              <option value= "{{ $manufacturer -> id }}">{{ $manufacturer -> manufacturer_name }}</option>
            @endforeach
        </select>
    </div>
    
    
    <p>
    <label for="product_type">Product Type:</label>
    <textarea id="product_type" name="product_type"></textarea>
    </p>
    
    <input type="submit" value="Add Item">
 
  </form>
@endsection