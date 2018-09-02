@extends('layout.master')

@section('Title')
    All Product
    
@section('content')
 {{csrf_field()}}
<h2>
    @foreach($products as $product)
        {{ $product -> product_name }}</h2>
        
        {{ $product -> product_type }}
    @endforeach
   
    
<h2>Review</h2>
    @if ($productdetails)
        @foreach ($productdetails as $productdetail)
            <div><label><strong>Reviewer's Name: </strong>{{$productdetail -> name}}</label><br>
                 <label><strong>Product Rating: </strong>{{$productdetail -> rate}}</label>
            </div>
            <div><label>{{ $productdetail ->review_detail}}</label></div>
        @endforeach
    @else
        No reviews here
    
    @endif<br>
    
    
    
    
<a href="{{url("/editProduct/$id->id")}}">Update a Product</a><br>
<a href="{{url("/deleteProduct/$id->id")}}">Delete a Product</a><br>
<a href="{{url("/editReview/$id->id")}}">Update a Product Review</a><br>
<a href="{{url("/addReview")}}">Write the Product Review</a><br>
@endsection('content')

