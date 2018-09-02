@extends('layout.master')

@section('title')
  Add Product
@endsection

@section('content')
  <form method="post" action="/addReviewAction">
  {{csrf_field()}}
  
      <p>
          <label for="review_detail">Please Write a review:</label><br>
          <input id="review_detail" type="text" name="review_detail"></input>
      </p>
      
      
    
    <input type="submit" value="Add Review"></input>
  </form>
 @endsection