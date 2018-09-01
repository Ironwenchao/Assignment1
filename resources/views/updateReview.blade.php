@extends('layout.master')

@section('title')
  Update a product review
@endsection

@section('content')
    <h2>Edit a Product Review</h2>
    
    <form method="post" action="/updateReview/{{$reviews[0]->id}}">
        {{csrf_field()}}
        <input type = "hidden" name = "id" value = "{{$reviews[0]->id}}"></input>
        <p>
            <label>Review Details:</label>
       
            <input type="text" class="form-control" name = "review_detail" value="{{$reviews[0]->review_detail}}"></input>
            
        </p>
    
        
       
        
        <button type="submit">Save</button>
        

    </form>
    
@endsection