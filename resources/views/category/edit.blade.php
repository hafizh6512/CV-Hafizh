@extends('layouts.default')
@section('title', __( 'Edit Category' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/category') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-update-category', $data['id']) }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Category Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Category Name" name="category" required="" value="{{ $data->category }}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
