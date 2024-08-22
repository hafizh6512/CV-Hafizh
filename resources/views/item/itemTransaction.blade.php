@extends('layouts.default')
@section('title', __( 'Transaction History' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Transaction History</h3>

            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/item') }}">
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
                        <th></th>
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
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-modal-{{ $value->id }}">
                                    <i class="fa fa-edit"></i> Change Status
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($data as $value)
        <div class="modal fade" id="edit-modal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ URL::to('item-transaction-update', $value->id) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    @foreach(shop_status() AS $k => $v)
                                        <option value="{{ $k }}" {{ selected($k, $value->status) }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
