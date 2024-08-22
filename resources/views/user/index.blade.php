@extends('layouts.default')
@section('title', __( 'User' ))
@section('content')
    @include('layouts.partials.notifications')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">User Data</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-users') }}">
                    <i class="fa fa-plus"></i> Add User
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ ucfirst($value->roles) }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-users/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($value->id !=1)
                                    <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-users/'.$value->id) }}" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">User Coin & Point</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Name</th>
                        <th>Coin</th>
                        <th>Point</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pc as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->score }}</td>
                            <td>{{ $value->points }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal-{{ $value->id }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{-- <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/reset-point/'.$value->id) }}" onclick="return confirm('Are you sure.?')">
                                    <i class="fa fa-undo"></i> Reset
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @foreach($data_pc AS $value)
        <div class="modal fade" id="editModal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ URL::to('/update-user-point', $value->id) }}">
                        @csrf
                        <div class="modal-body">
                            <label>Total Coins {{ $value->name }}</label>
                            <input type="number" class="form-control" name="coins" value="{{ $value->score }}">
                        </div>

                        <div class="modal-body">
                            <label>Total Points {{ $value->name }}</label>
                            <input type="number" class="form-control" name="points" value="{{ $value->points }}">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Point</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
