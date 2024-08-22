@extends('layouts.default')
@section('title', __( 'Edit Rewards' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit Rewards</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/rewards') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-update-rewards', $data->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Reward</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Reward" name="reward" required="" value="{{ $data->reward }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Coin Reward</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Coin Reward" name="coin_reward" required="" value="{{ $data->coin_reward }}">
                </div>
            </div>

            {{-- <div class="form-group row">
                <label class="col-md-2 col-form-label">Image</label>
                <div class="col-md-5">
                    <input type="file" class="form-control-file" name="image">
                    <small>*) Fill to change image</small>
                </div>
            </div> --}}

        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
