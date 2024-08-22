@extends('layouts.default')
@section('title', __( 'Home' ))
@section('content')
	<div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        @if(session('auth_user')['roles'] == 'admin')
        <div class="card-body text-center">
            <h3>Welcome to LUCKY BOOKMARK Library</h3>
        </div>
        @else
        <div class="card-body text-center">

            <div class="row mx-auto">
                <div class="col-lg-5" style="text-align: justify;">
                    <h3>
                        <strong>
                            Read Books, Get Points And Have Fun! The More You Read The More You Got!
                        </strong>
                    </h3>
                    <h5>What are you waiting for? Get started now, here are our top recommendations just for you.</h5>
                </div>
            @foreach($book as $value)
                <div class="col-md-2.5 mx-auto" style="border:1px solid #ccc; margin-left: 10px; padding: 0px;">
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
            </div>
        </div>
        @endif
    </div>
    {{-- @if(session('auth_user')['roles'] == 'user') --}}
        <div class="row">
            <div class="col-md-7">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><b>Active Challenge</b></h3>  
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table w-100">
                            <thead>
                                <th>Challenge</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($challenge AS $value)
                                    <tr>
                                        <td>- {{ $value->challenge_name }}</td>
                                        <td>
                                            @if($value->total_complete >= $value->total_book)
                                                <i class="fa fa-check-circle" style="color:#27ae60;"></i> Complete
                                            @else
                                                {{ $value->total_complete }}/{{ $value->total_book  }}
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Did you know ?</b></h3>  
                    </div>
                    <div class="card-body">
                        <b>You can get point by</b>
                        <ul>
                            <li>Read For 5 Minutes, 15 Minutes, 30 Minutes, and 1 Hour on any book</li>
                            <li>Review The Book after you read it</li>
                        </ul>
                        {{-- <b>What you get from your points.?</b>
                        <ul>
                            <li>You can select Reward list and redeem it.!</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    {{-- @endif --}}
@endsection
