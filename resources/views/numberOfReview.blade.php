@extends('layout.master')

@section('Title')
    Descending by Number of Reviews
    
@section('content')
 {{csrf_field()}}

    
<h2>Reviews</h2>
    @if ($numberOfReviews)
        @foreach ($numberOfReviews as $numberOfReview)
            <div><label><strong>The number of Reviews: </strong>{{$numberOfReview -> totalReview}}</label><br>
                 <label><strong>Product Rating: </strong>{{$numberOfReview -> rate}}</label>
            </div>
            <div><label>{{ $numberOfReview ->review_detail}}</label></div>
        @endforeach
    @else
        No reviews here
    
    @endif<br>
@endsection