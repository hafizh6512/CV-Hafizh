@extends('layouts.default')
@section('title', __( 'Claim History' ))
@section('content')
    {{-- <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Data Rewards</h3>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Image</th>
                        <th>Reward</th>
                        <th>Point Needed</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('assets/images/'.$value->image) }}" width="150px"></td>
                            <td>{{ $value->reward }}</td>
                            <td><img src="http://skripsi.com/nico_library/assets/images/coin-icon-3830.png" style="max-width: 35px;"> {{ $value->point_needed }}</td>
                            <td>
                                <a type="button" class="btn btn-success btn-sm" href="#" onclick="redeem_reward({{ $value->point_needed }}, {{ $value->id }})">
                                    <i class="fa fa-exchange-alt"></i> Redeem
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr> --}}
    <center><h3><b>Claim History</b></h3></center>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Claim History</h3>

            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/user-leaderboard') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Coin Reward</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewardList as $rw)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rw->redeem_coin }}</td>
                            <td>{{ date('Y-m-d', strtotime($rw->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="redeemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ URL::to('/redeem-rewards') }}">
                    <div class="modal-body">
                        @csrf
                        <p>Are you sure you want to redeem this reward for <img src="http://skripsi.com/nico_library/assets/images/coin-icon-3830.png" style="max-width: 20px;"><span id="total_point"></span> Points?</p>
                        <input type="hidden"  name="id" value="" id="redeem_id">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    function redeem_reward(points, id)
    {
        $("#total_point").html(points)
        $("#redeem_id").val(id)
        $("#redeemModal").modal();
    }
</script>
@endsection
