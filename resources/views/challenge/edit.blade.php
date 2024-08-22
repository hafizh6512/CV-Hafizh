@extends('layouts.default')
@section('title', __( 'Edit Challenge' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit Challenge</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/point-setting') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-update-challenge', $data->id) }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Challenge Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Challenge Name" name="challenge_name" required="" value="{{ $data->challenge_name }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Challenge Type</label>
                <div class="col-md-5">
                    <select class="form-control" name="type" required>
                        <option value="">-- SELECT TYPE --</option>
                        <option value="read" {{ selected('read', $data->type) }}>Read</option>
                        <option value="review" {{ selected('review', $data->type) }}>Review</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Total Book Challenge</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Total Book Challenge (Min 1)" name="total_book" required="" value="{{ $data->total_book }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Long (Minutes)</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Long" name="long" required="" value="{{ $data->long }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Point Reward</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Point Reward" name="point_reward" required="" value="{{ $data->point_reward }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Range Date</label>
                <div class="col-md-5">
                    <input type="text" class="form-control daterange" placeholder="Challenge Range Date" name="range_date" required="" value="{{ date('m/d/Y', strtotime($data->start_date)) }} - {{ date('m/d/Y', strtotime($data->end_date)) }}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.daterange').daterangepicker({});
    });
    
</script>
@endsection