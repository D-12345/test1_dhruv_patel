@extends('layouts.admin');

@section('content');

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">User Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="update" method="POST" id="reform" enctype="multipart/form-data" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{$data['id']}}">
        <div class="card-body">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $data['firstname'] }}" placeholder="Enter fname">
                <span class="text-danger"> {{ $errors->first('firstname') }}</span><br>
                <span id="errfname"></span>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $data['lastname'] }}" placeholder="Enter lname">
                <span class="text-danger"> {{ $errors->first('lastname') }}</span><br>
                <span id="errlname"></span>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data['email'] }}" placeholder="Enter email">
                <span class="text-danger"> {{ $errors->first('email') }}</span><br>
                <span id="erremail"></span>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="number" class="form-control" id="contact_number" name="contact_number" value="{{ $data['contact_number'] }}" placeholder="Enter email">
                <span class="text-danger"> {{ $errors->first('contact_number') }}</span><br>
                <span id="errcontact"></span>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $data['city'] }}"  placeholder="Password">
                <span class="text-danger"> {{ $errors->first('city') }}</span><br>
                <span id="errcity"></span>
            </div>

            <div class="form-group">
                <label id="gender">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="status" type="radio" name="gender" id="gender1" onclick="text(0)" value="male" checked>
                    <label class="form-check-label" for="gender1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="status" type="radio" name="gender" id="gender2" onclick="text(1)" value="female">
                    <label class="form-check-label" for="gender2">Female</label>
                </div>
                <span class="text-danger"> {{ $errors->first('gender') }}</span><br>
                <span id="errgender"></span>

            </div>

            <div class="form-group" id="myage">
                <label for="age">Age</label>
                <input type="number" class="form-control" data-require-pair="#gender1" id="age" name="age"
                    placeholder="Enter Age">
                <span class="text-danger"> {{ $errors->first('age') }}</span>
                <span id="errage"></span>
            </div>

            <div class="form-group">
                <label for="image">Profile Photo</label>
                <input type="file" class="form-control" id="image" name="profile_photo" value="{{ $data['profile_photo'] }}"
                    placeholder="Choose File">
                <span class = "text-danger"> {{ $errors->first('profile_photo') }}</span><br>    
                <span id="errimage"></span>
            </div>

            <div class="form-group">
              <label id="checkstatus">Status</label><br>
              <div class="form-check form-check-inline">
                <input class="status" type="radio" name="status" id="inlineRadio1" value="active">
                <label class="form-check-label" for="inlineRadio1">Active</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="status" type="radio" name="status" id="inlineRadio2" value="inactive">
                <label class="form-check-label" for="inlineRadio2">Inactive</label>
              </div>
              <span class="text-danger"> {{ $errors->first('status') }}</span><br>
              <span id="errstatus"></span>

            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="list" class="btn btn-primary">Back</a>
            </div>
        </div>    
    </form>
</div>

@endsection