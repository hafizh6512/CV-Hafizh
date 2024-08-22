@extends('layouts.default')
@section('title', __( 'Book Detail' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Book Detail</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/list-book') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3" style="display: flex; align-items: center; justify-content: center">
                <img style="width: 23rem" src="{{ asset('assets/cover/'.$book->image) }}">
            </div>
            <div class="col-lg-9" style="padding: 0 85px">
                <h3><b>{{ $book->title }} @if($book->is_exclusive)<small style="color:#e74c3c;">(Exclusive Book)</small>@endif</b></h3>
                <span>{!! $book->html_star !!} ({{ round($book->star, 1) }})</span>
                <hr>
                {{-- Check if book is exclusive --}}
                @if($book->is_exclusive == 1)
                    @if(empty(check_user_book_exclusive(session('auth_user')['id'], $book->id)))
                        <a href="javascript:void(0);" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#unlock_book_modal">
                            <i class="fa fa-lock"></i> Unlock with 1 Key
                        </a>
                    @else
                        <a href="{{ URL::to('read-book', $book->id) }}" class="btn btn-primary btn-lg">
                            <i class="fa fa-book-open"></i> Read Online
                        </a>
                    @endif
                @else
                    <a href="{{ URL::to('read-book', $book->id) }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-book-open"></i> Read Online
                    </a>
                @endif
                <hr>
                <p>{!! nl2br($book->description) !!}</p>
            </div>
        </div>
        <hr>
            @if(empty($userComment))
                <form method="POST" action="{{ URL::to('review-book', $book->id) }}">
                    @csrf
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="star" required>
                                <option value="">-- SELECT RATING FOR THIS BOOK --</option>
                                @for($i=1; $i<=5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                                
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder="Write your comment.!" rows="5"></textarea>
                        </div>
                    </div>
                    @if($minutes_milestone >= 15)
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </div>
                    @else
                        <div class="alert alert-warning">
                          <strong>Alert!</strong> You can post comment after you read it for 15 Minutes!
                        </div>
                    @endif
                </form>
            @else
                <div class="col-md-12" style="background: #ccc; padding:20px;">
                    <center><b>You already review this book!</b></center>
                </div>
            @endif
        <hr>
        @if(empty($review))
            <center>No Review for this book yet!</center>
        @endif
        @foreach($review AS $rv)
            <div style="margin-bottom: 10px; border-bottom: 1px solid #ccc;">
                <b style="font-size:18px;">{{ $rv->user->name }}</b><small> ({{ $rv->created_at }})</small>
                <br>
                <span style="font-size:12px;">{!! $rv->html_star !!}</span>
                <p style="font-size: 16px;">{!! nl2br($rv->review) !!}</p>
            </div>
        @endforeach
    </div>
</div>


@if($book->is_exclusive == 1)
    {{-- Confirmation to unlock book --}}
    <div class="modal fade" id="unlock_book_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Unlock Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Unlock this book with 1 Keys?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ URL::to('/unlock-book/'.$book->id) }}" class="btn btn-primary">Yes, Unlock Book Now</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
