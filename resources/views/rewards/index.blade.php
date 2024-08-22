@extends('layouts.default')
@section('title', __( 'Rewards' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Leaderboard Period Information</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/user-leaderboard') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <form method="POST" action="{{ URL::to('/save-setting-redeem') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-bottom: -1.5rem;">
                            <label>Set the time for users to redeem their reward : </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label></label>
                            <input type="date" class="form-control" name="reward_start_redeem" value="{{ $reward_start_redeem->value }}" required>
                        </div>
                    </div>
                    <span class="my-auto">_</span>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label></label>
                            <input type="date" class="form-control" name="reward_end_redeem" value="{{ $reward_end_redeem->value }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Set the time for admin to reset leaderboard : </label>
                            <input type="date" class="form-control" name="score_reset" value="{{ $score_reset->value }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Leaderboard Rewards</h3>
            <div class="card-tools">
                {{-- <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-rewards') }}">
                    <i class="fa fa-plus"></i> Add Rewards
                </a> --}}
            </div>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Rank</th>
                        <th>Reward</th>
                        <th>Coin Reward</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>Rank #{{ ($loop->iteration<10)?'0'.$loop->iteration:$loop->iteration }}</td>
                            <td>{{ $value->reward }}</td>
                            <td>{{ $value->coin_reward }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-rewards/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-rewards/'.$value->id) }}" onclick="return confirm('Are you sure.?')">
                                    <i class="fa fa-trash"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
