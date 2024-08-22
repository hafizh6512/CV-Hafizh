@extends('layouts.default')
@section('title', __( 'Challenge' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Data Challenge</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-challenge') }}">
                    <i class="fa fa-plus"></i> Add Challenge
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Challenge Name</th>
                        <th>Type</th>
                        <th>Point Reward</th>
                        <th>Total Book</th>
                        <th>Range Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->challenge_name }}</td>
                            <td>{{ ucfirst($value->type) }}</td>
                            <td>{{ $value->point_reward }}</td>
                            <td>{{ $value->total_book }} Books</td>
                            <td>{{ $value->start_date }} - {{ $value->end_date }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-challenge/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-challenge/'.$value->id) }}" onclick="return confirm('Are you sure?')">
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
