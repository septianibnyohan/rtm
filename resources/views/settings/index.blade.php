@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card card-margin">
            <form enctype="multipart/form-data" class="forms-sample" method="POST">
                @csrf
                <div class="card-header">
                        <h5 class="card-title">Setting Parameters</h5>
                </div>
                <div class="card-body">
                        
                                <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name" value="{{ $client_name }}">
                                </div>
                                <div class="form-group">
                                        <label for="room_capacity">Room Capacity</label>
                                        <input type="text" class="form-control" id="room_capacity" name="room_capacity" placeholder="Room Capacity" value="{{ $room_capacity}}">
                                </div>
                                <div class="form-group">
                                <label for="logo_file">Logo File</label>
                                    <input type="file" class="form-control" id="logo_file" name="logo_file" >
                                    <!-- <label class="custom-file-label" for="validatedCustomFile">Logo File...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div> -->
                                </div>
                        
                </div>
                <div class="card-footer bg-white">
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection