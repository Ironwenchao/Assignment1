@extends('layout.master')

@section('Title')
    All products
@endsection

<!--all products list here-->
@section('content')
    <!--Site location navigation-->
    {{csrf_field()}}
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb site-location">
        <!--<li class="breadcrumb-item active" aria-current="page">All products</li>-->
        <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
      </ol>
    </nav>
    
    <div class="btn-group site-location">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort By
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Most Reviews</a>
        <a class="dropdown-item" href="#">Rating</a>
      </div>
    </div>
    
    <div>
    @foreach($products as $product)
        <ul class="list-unstyled">
            <li><a href="{{url("productDetail/$product->id")}}">{{$product->product_name}}</a></li>

        </ul>
    @endforeach
    </div>
    

    
@endsection
