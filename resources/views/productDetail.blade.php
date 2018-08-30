@extends('layout.master')

@section('Title')
    All Product
    
@section('content')

<h2>{{ $productdetails -> product_name }}</h2>
    {{ $productdetails -> product_type }}
    
<h2>Review</h2>

    {{ $productdetails ->review_detail}}
    

@endsection('content')