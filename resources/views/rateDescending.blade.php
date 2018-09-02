@extends('layout.master')

@section('Title')
    Descending by Rate
    
@section('content')
 {{csrf_field()}}

    
<h2>Reviews</h2>
    @if ($descendingRates)
        @foreach ($descendingRates as $descendingRate)
            <div><label><strong>The number of Reviews: </strong>{{$descendingRate -> totalReview}}</label><br>
                 <label><strong>Product Rating: </strong>{{$descendingRate -> rate}}</label>
            </div>
            <div><label>{{ $descendingRate ->review_detail}}</label></div>
        @endforeach
    @else
        No reviews here
    
    @endif<br>
@endsection