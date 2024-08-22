@extends('layouts.default')
@section('title', __( 'Rewards' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Redeem Request</h3>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>User</th>
                        <th>Reward</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewardList as $rw)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rw->user->name }}</td>
                            <td><img src="{{ asset('assets/images/'.$rw->reward->image) }}" width="80px;"> {{ $rw->reward->reward }}</td>
                            <td>{{ $rw->phone }}</td>
                            <td>{{ $rw->address }}</td>
                            <td>{{ status_reward($rw->status, false) }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="change_status({{ $rw->id }})">Change Status</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ URL::to('/change-status') }}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden"  name="id" value="" id="request_id">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                @foreach(status_reward(0, true) AS $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
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
    function change_status(id)
    {
        $("#request_id").val(id)
        $("#changeStatus").modal();
    }
</script>
@endsection
