@extends('layouts.admin')

@section('content')
 
<div class="container mt-5">
   
    <form id="add-todo" method="post" action="{{ url('update-user') }}"> 
      @csrf
      
      <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" id="formGroupExampleInput">

      <div class="form-group">
        <label for="formFirstName">First Name</label>
        <input type="text" name="first_name" class="form-control" id="formFirstName" placeholder="Please enter first name" value="{{ $user->first_name }}">
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
      </div> 

      <div class="form-group">
        <label for="formLastName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="formLastName" placeholder="Please enter last name" value="{{ $user->last_name }}">
        <span class="text-danger">{{ $errors->first('last_name') }}</span>
      </div> 

      <div class="form-group">
        <label for="formEmail">Email</label>
        <input type="email" name="email" class="form-control" id="formEmail" placeholder="Please enter email" value="{{ $user->email }}">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div> 

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>
 
</div>
@endsection