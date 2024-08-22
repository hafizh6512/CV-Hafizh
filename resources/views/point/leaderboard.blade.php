@extends('layouts.default')
@section('title', __( 'Leaderboard' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Leaderboard</h3>
            @if(session('auth_user')['roles'] == 'admin')
                <div class="card-tools">
                    <a class="btn btn-danger btn-sm" href="{{ URL::to('/reset-leaderboard') }}" onclick="return confirm('Are you sure.?')">
                        <i class="fa fa-redo"></i> Reset Leaderboard
                    </a>

                    <a class="btn btn-primary btn-sm" href="{{ URL::to('/rewards') }}" >
                        <i class="fa fa-cog"></i> Setting
                    </a>
                </div>
            @else
                <div class="card-tools">
                    <a class="btn btn-warning btn-sm" href="{{ URL::to('/rewards-list') }}" >
                        <i class="fa fa-shopping-cart"></i> Claim History
                    </a>
                </div>
            @endif
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table>
                <tr>
                    <th>Point Reset On </th>
                    <th>&nbsp;:&nbsp;</th>
                    <td>{{ date('m/d/Y', strtotime($score_reset->value)) }}</td>
                </tr>
                <tr>
                    <th>Users can claim reward on</th>
                    <th>&nbsp;:&nbsp;</th>
                    <td>{{ date('m/d/Y', strtotime($reward_start_redeem->value)) }} - {{ date('m/d/Y', strtotime($reward_end_redeem->value)) }}</td>
                </tr>
            </table>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Name</th>
                        <th>Point</th>
                        <th>Reward</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        <tr @if($value->id == session('auth_user')['id']) style="background-color: #f1c40f;" @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->points }}</td>
                            <td>
                                @if($value->id == session('auth_user')['id'])
                                    @if($key < 10)
                                        @if((date('Y-m-d') >= $reward_start_redeem->value) AND (date('Y-m-d') <= $reward_end_redeem->value))
                                            @php
                                                $check = checkIsClaimed(session('auth_user')['id'], $reward_start_redeem->value, $reward_end_redeem->value);
                                                // debugCode($check);
                                            @endphp
                                            {{ get_reward_position($loop->iteration) }}
                                            @if(empty($check))
                                                <button type="button" class="btn btn-success btn-sm" onclick="doclaim({{ $value->id }}, {{ $loop->iteration }})">Claim Reward</button>
                                            @else
                                                <i class="fa fa-check-circle" style="color:#27ae60;"></i> Claimed
                                            @endif
                                        @else
                                            {{ get_reward_position($loop->iteration) }}
                                            <button type="button" class="btn btn-success btn-sm" disabled>Claim Reward</button>
                                        @endif
                                    @endif
                                @else
                                    {{ get_reward_position($loop->iteration) }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="claim_reward_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Claim Your Reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ URL::to('/claim-reward') }}">
                    @csrf
                    <div class="modal-body">
                        <span id="loading">Loading... Please Wait!</span>
                        <div id="detail"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="redeem-button" class="btn btn-primary">Redeem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    function doclaim(_id, _rank)
    {
        $("#loading").fadeIn('fast');
        $("#redeem-button").fadeOut('fast');
        $("#detail").html('');
        $("#claim_reward_modal").modal();

        $.ajax({
            url: '{{ URL::to('/get-detail-reward') }}'+'/'+_rank,
            type: 'GET',
            dataType: '',
            async:true
        })
        .done(function(e) {
            $("#loading").fadeOut('fast');
            $("#detail").html(e);
            $("#redeem-button").fadeIn('fast');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    }
</script>
@endsection
