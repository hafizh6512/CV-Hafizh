@extends('layouts.default')
@section('title', __( 'Activity Setting' ))
@section('content')
    @include('layouts.partials.notifications')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Activity Setting</h3>
        </div>
        <form method="POST" action="{{ URL::to('/update-point-setting') }}">
            @csrf
            <div class="card-body">
                <label class="col-form-label">Point</label>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 5 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read" name="read_5_min_point" required="" value="{{ $all_data['read_5_min_point'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 15 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read" name="read_15_min_point" required="" value="{{ $all_data['read_15_min_point'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 30 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read" name="read_30_min_point" required="" value="{{ $all_data['read_30_min_point'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 1 Hour</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read" name="read_60_min_point" required="" value="{{ $all_data['read_60_min_point'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Review</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Review" name="review_point" required="" value="{{ $all_data['review_point'] }}">
                    </div>
                </div>

                <label class="col-form-label">Coin</label>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 5 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read Coin" name="read_5_min_coin" required="" value="{{ $all_data['read_5_min_coin'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 15 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read Coin" name="read_15_min_coin" required="" value="{{ $all_data['read_15_min_coin'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 30 Minutes</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read Coin" name="read_30_min_coin" required="" value="{{ $all_data['read_30_min_coin'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Read 1 Hour</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Read Coin" name="read_60_min_coin" required="" value="{{ $all_data['read_60_min_coin'] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Review</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Review" name="review_coin" required="" value="{{ $all_data['review_coin'] }}">
                    </div>
                </div>

                <div hidden>
                <label class="col-form-label">Other</label>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-right">Exclusive Exchange</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" placeholder="Review" name="exclusive" required="" value="{{ $all_data['exclusive'] }}">
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Challenge</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-challenge') }}">
                    <i class="fa fa-plus"></i> Add Challenge
                </a>
            </div>
        </div>
        <div class="card-body">
            
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Challenge Name</th>
                        <th>Type</th>
                        <th>Point Reward</th>
                        <th>Total Book</th>
                        <th>Long</th>
                        <th>Range Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challenge as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->challenge_name }}</td>
                            <td>{{ ucfirst($value->type) }}</td>
                            <td>{{ $value->point_reward }}</td>
                            <td>{{ $value->total_book }} Books</td>
                            <td>{{ $value->long }} Minutes</td>
                            <td>{{ $value->start_date }} - {{ $value->end_date }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-challenge/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-challenge/'.$value->id) }}" onclick="return confirm('Are you sure.?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
