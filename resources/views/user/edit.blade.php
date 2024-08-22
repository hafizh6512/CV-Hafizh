@extends('layouts.default')
@section('title', __( 'Edit user' ))
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit user</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/users') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-update-users', $data['id']) }}">
        @csrf
        <div class="card-body">
        	<div class="form-group row">
        		<label class="col-md-2 col-form-label">Role</label>
        		<div class="col-md-5">
        			<select class="form-control" name="roles">
        				<option value="admin" {{ selected('admin', $data->roles) }}>Admin</option>
        				<option value="user" {{ selected('user', $data->roles) }}>User</option>
        			</select>
        		</div>
        	</div>

        	<div class="form-group row">
        		<label class="col-md-2 col-form-label">Name</label>
        		<div class="col-md-5">
        			<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}" required="">
        		</div>
        	</div>

            <div class="form-group row">
        		<label class="col-md-2 col-form-label">Email</label>
        		<div class="col-md-5">
        			<input type="email" class="form-control" placeholder="Email" name="email" value="{{ $data->email }}" required="">
        		</div>
        	</div>

        	<div class="form-group row">
        		<label class="col-md-2 col-form-label">Username</label>
        		<div class="col-md-5">
        			<input type="text" class="form-control" placeholder="Username" name="username" value="{{ $data->username }}" required="">
        		</div>
        	</div>

        	<div class="form-group row">
        		<label class="col-md-2 col-form-label">Password</label>
        		<div class="col-md-5">
        			<input type="password" class="form-control" placeholder="Password" name="password" >
        			<small>*) Fill to change password</small>
        		</div>
        	</div>
        </div>
        <div class="card-footer">
        	<button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
