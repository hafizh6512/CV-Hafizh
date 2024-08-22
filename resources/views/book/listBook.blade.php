@extends('layouts.default')
@section('title', __( 'Book List' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    {{-- <div class="card-header">
        <h3 class="card-title">Book List</h3>
    </div> --}}
    <div class="card-body">
        <center><h3><b>Book List</b></h3></center>
        <hr>
        <form method="GET">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control" name="search" value="{{ $search_text }}" placeholder="Search...">
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="category">
                        <option value="all">All Category</option>
                        @foreach($category AS $ct)
                            <option value="{{ $ct->id }}" {{ selected($ct->id, $selected_category) }}>{{ $ct->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1"><button type="submit" class="btn btn-primary">Filter</button></div>
            </div>
        </form>
        <hr>
        <div class="row">
            @foreach($book as $value)
                <div class="col-md-2" style="border:1px solid #ccc; margin-left: 10px; padding: 0px;">
                    {{-- <div style="height: 300px; background: url('{{ asset('assets/cover/20220701035751xZtqHub9L.jpeg') }}'); background-size:100%;"></div> --}}
                    <div class="text-center">
                        <img src="{{ asset('assets/cover/'.$value->image) }}" style="width: 100%; height: auto;">
                    </div>
                    <div style="border-top: 1px solid #ccc;">
                        <div style="height:50px; padding-left: 5px; padding-right: 5px; padding-top: 5px;">
                            <center><b>{{ $value->title }}</b></center>
                        </div>
                        <div class="w-100" style="padding-left: 10px; padding-right: 10px; padding-bottom:10px;">
                            {!! $value->html_star !!}
                        </div>
                        <div class="w-100" style="padding-left: 10px; padding-right: 10px; padding-bottom: 5px;">
                            <a href="{{ URL::to('/book-detail', $value->id) }}" class="btn btn-info w-100">DETAIL</a>
                        </div>
                    </div>
                    
                </div>
            @endforeach

            @if(empty($book))
                <div class="col-md-12">
                    <center><h4><b>No Book Found!</b></h4></center>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
