@extends('layout.master')

@section('Title')
    All Product
    
@section('content')
 {{csrf_field()}}
  <ul class="list-unstyled">
        
        @foreach($productFromManufacturers as $productFromManufacturer)
            <li>{{$productFromManufacturer -> product_name}}</li>
        @endforeach
       
    </ul>
    
    
@endsection