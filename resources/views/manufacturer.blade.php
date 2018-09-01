@extends('layout.master')

@section('Title')
    All products
@endsection

<!--all products list here-->
@section('content')
    <!--Site location navigation-->
    {{csrf_field()}}
    <ul class="list-unstyled">
        
        @foreach($manufacturers as $manufacturer)
           <li><a href = "{{url("getProductFromManufacturer/$manufacturer->id")}}">{{$manufacturer -> manufacturer_name}}</a></li>
        @endforeach

    </ul>

    
@endsection