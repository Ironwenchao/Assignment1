@extends('layout.master')

@section('Title')
    All products
@endsection

<!--all products list here-->
@section('content')
    <!--Site location navigation-->
    {{csrf_field()}}
    
    <div>
    @foreach($products as $product)
        <ul class="list-unstyled">
            <li><a href="{{url("productDetail/$product->id")}}">Number of Reviews: {{$product->totalReview}}</a></li>
            <li><a href="{{url("productDetail/$product->id")}}">{{$product->product_name}} </a></li>
    @endforeach
    </div>
    

    
@endsection
