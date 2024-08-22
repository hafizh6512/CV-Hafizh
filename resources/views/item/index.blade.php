@extends('layouts.default')
@section('title', __( 'Shop' ))
@section('content')
	<div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Shop</h3>

            <div class="card-tools">
                <a type="button" class="btn btn-warning btn-sm" href="{{ URL::to('/item-transaction') }}" >
                    <i class="fa fa-shopping-cart"></i> Transaction History
                </a>
                <a type="button" class="btn btn-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#add-shop-item">
                    <i class="fa fa-plus"></i> Add Item
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Exchange Coin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('assets/images/'.$value->item_image) }}" style="max-width: 50px;"></td>
                            <td>{{ $value->item_name }}</td>
                            <td>{{ number_format($value->coin_exchange) }}</td>
                            <td>
                                <a type="button" href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#eidt-shop-item-{{ $value->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($value->id != 1)
                                    <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-item/'.$value->id) }}" onclick="return confirm('Are you sure?')">
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


    {{-- ADD MODAL --}}
    <div class="modal fade" id="add-shop-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ URL::to('do-add-item') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Shop Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image" required>
                        </div>

                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" class="form-control" placeholder="Item Name" name="item_name" required>
                        </div>

                        <div class="form-group">
                            <label>Exchange Coin</label>
                            <input type="number" class="form-control" placeholder="Exchange Coin" name="exchange_coin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    @foreach ($data as $value)
        <div class="modal fade" id="eidt-shop-item-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ URL::to('do-update-item', $value->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Shop Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control-file" name="image">
                                <small>*) Fill to change image</small>
                            </div>

                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" class="form-control" placeholder="Item Name" name="item_name" value="{{ $value->item_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Exchange Coin</label>
                                <input type="number" class="form-control" placeholder="Exchange Coin" name="exchange_coin" value="{{ $value->coin_exchange }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection