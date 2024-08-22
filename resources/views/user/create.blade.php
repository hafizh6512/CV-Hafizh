@extends('layouts.default')
@section('title', __( 'Add User' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Add User</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/users') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-add-users') }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Roles</label>
                <div class="col-md-5">
                    <select class="form-control" name="roles">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Name" name="name" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Email</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" placeholder="E-Mail" name="email" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Username</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Username" name="username" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Password</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
