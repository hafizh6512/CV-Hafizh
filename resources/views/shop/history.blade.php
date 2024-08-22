@extends('layouts.default')
@section('title', __( 'Shop History' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Shop History</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/shop') }}">
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
                        <th>Buy Date</th>
                        <th></th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Total Coin Charge</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td><img src="{{ asset('assets/images/'.$value->item->item_image) }}" style="max-width: 50px;"> </td>
                            <td>{{ $value->item->item_name }}</td>
                            <td>{{ $value->total_item }}</td>
                            <td>{{ number_format($value->total_coin) }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ shop_status($value->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
