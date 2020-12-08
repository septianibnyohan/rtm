@extends('layouts.admin')

@section('content')
<div class="container mt-5">
   
    <form id="add-todo" method="post" action="{{ url('post-user') }}"> 
      @csrf

      <div class="form-group">
        <label for="formFirstName">First Name</label>
        <input type="text" name="first_name" class="form-control" id="formFirstName" placeholder="Please enter first name">
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
      </div> 

      <div class="form-group">
        <label for="formLastName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="formLastName" placeholder="Please enter last name">
        <span class="text-danger">{{ $errors->first('last_name') }}</span>
      </div> 

      <div class="form-group">
        <label for="formEmail">Email</label>
        <input type="email" name="email" class="form-control" id="formEmail" placeholder="Please enter email">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div> 

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>
 
</div>
@endsection