@extends('layouts.default')
@section('title', __( 'Add Book' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Add Book</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/book') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-add-book') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Title</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Title" name="title" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Category</label>
                <div class="col-md-5">
                    <select class="form-control" name="category" required="">
                        <option value="">-- Select Category --</option>
                        @foreach($category AS $key => $value)
                            <option value="<?= $value->id ?>"><?= $value->category ?></option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Short Description</label>
                <div class="col-md-5">
                    <textarea class="form-control" name="description" placeholder="Short Description" required=""></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Cover Image</label>
                <div class="col-md-5">
                    <input type="file" class="form-control-file" name="cover" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">E-Book File (PDF)</label>
                <div class="col-md-5">
                    <input type="file" class="form-control-file" name="file" required="" accept="application/pdf">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Set as Exclusive Book</label>
                <div class="col-md-5" style="padding-top: 10px;">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="is_exclusive" id="is_exclusive" value="1">
                      <label for="is_exclusive" class="custom-control-label">Yes</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
