@extends('layouts.default')
@section('title', __( 'Category' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Book Category</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('/add-category') }}">
                    <i class="fa fa-plus"></i> Add Category
                </a>

                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/book') }}">
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
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->category }}</td>
                            <td>
                                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/edit-category/'.$value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-category/'.$value->id) }}" onclick="return confirm('Are you sure?')">
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
