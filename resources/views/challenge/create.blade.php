@extends('layouts.default')
@section('title', __( 'Add Challenge' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Add Challenge</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/point-setting') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form method="POST" action="{{ URL::to('/do-add-challenge') }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Challenge Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Challenge Name" name="challenge_name" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Challenge Type</label>
                <div class="col-md-5">
                    <select class="form-control" name="type" required>
                        <option value="">-- SELECT TYPE --</option>
                        <option value="read">Read</option>
                        <option value="review">Review</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Total Book Challenge</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Total Book Challenge (Min 1)" name="total_book" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Long (Minutes)</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Long" name="long" required="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Point Reward</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Point Reward" name="point_reward" required="">
                </div>
            </div>



            <div class="form-group row">
                <label class="col-md-2 col-form-label">Range Date</label>
                <div class="col-md-5">
                    <input type="text" class="form-control daterange" placeholder="Challenge Range Date" name="range_date" required="">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Save</button>
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