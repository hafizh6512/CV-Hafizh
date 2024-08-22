@extends('layouts.default')
@section('title', __( 'Shop Item List' ))
@section('content')
    @include('layouts.partials.notifications')
	<div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><b>Shop Item List</b></h3>

            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/shop-history') }}">
                    <i class="fa fa-shopping-cart"></i> Shop History
                </a>
            </div>
        </div>

        <div class="card-body">

            <div class="row">
                @foreach($item AS $k => $v)
                    <div class="col-md-2" style=" padding:0px 30px;">
                        <div style="border: 1px solid #ddd;">
                            <div style="height: 120px; text-align: center; padding-top: 10px; border-bottom: 1px solid #ddd;">
                                <img src="{{ asset('assets/images/'.$v->item_image) }}" style="max-width:80px; max-height: 100%;">
                            </div>
                            <div style="min-height: 45px;" class="font-weight-bold text-center">
                                <p>{{ $v->item_name }}</p>
                            </div>
                            <div>
                                <button class="btn btn-primary w-100 font-weight-bold" style="border-radius: 0;" data-toggle="modal" data-target="#buy-modal-{{ $v->id }}">
                                    Buy <img src="{{ asset('assets/images/coin-icon-3830.png') }}" style="max-width: 18px;" >{{ number_format($v->coin_exchange) }}
                                </button>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach($item AS $k => $v)
    <div class="modal fade" id="buy-modal-{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ URL::to('buy-item', $v->id) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buy <b>{{ $v->item_name }}</b> for <b>{{ number_format($v->coin_exchange) }}</b> Coins.?</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                    <div class="modal-body">
                        @if($v->id == 1)
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" class="form-control" name="qty" placeholder="Qty" value="1">
                            </div>
                        @else
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" class="form-control" name="qty" placeholder="Qty">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes Buy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection