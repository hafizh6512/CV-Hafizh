@extends('layouts.default')
@section('title', __( 'Book' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Book Data</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/review') }}">
                    <i class="fa fa-comment"></i> Book Review
                </a>
                <a type="button" class="btn btn-success btn-sm" href="{{ URL::to('/category') }}">
                    <i class="fa fa-cog"></i> Set Category
                </a>
                <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-book') }}">
                    <i class="fa fa-plus"></i> Add Book
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Cover</th>
                        <th>Exclusive</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>E-Book (PDF)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('assets/cover/'.$value->image) }}" style="max-width: 50px;"></td>
                            <td>{{ ($value->is_exclusive=='1')?'Yes':'No' }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ (isset($value->category)?$value->category->category:'Undefined') }}</td>
                            <td><a class="btn btn-sm btn-success" href="{{ asset('assets/book/'.$value->file) }}" target="_blank">View</a></td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-book/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-book/'.$value->id) }}" onclick="return confirm('Are you sure.?')">
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
