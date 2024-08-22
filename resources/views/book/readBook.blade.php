@extends('layouts.default')
@section('title', __( 'Read Book' ))
@section('content')
@include('layouts.partials.notifications')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Read Book</h3>
    </div>
    <div class="card-body" style="padding:0px;">
        <iframe src="{{ asset('assets/book/'.$book->file) }}#toolbar=0" style="height: 1000px; width: 100%;"></iframe>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var min_5  = 60000*5
    var min_15 = 60000*15
    var min_30 = 60000*30
    var min_60 = 60000*60
    // Set 5 Minutes
    setTimeout(function() {
        earn_point_r(5)
    }, min_5); // Set for 1 minutes or 60 seconds or 60000 milisecond (Program use mili second)

    // Set 15 Minutes

    setTimeout(function() {
        earn_point_r(15)
    }, min_15); // Set for 1 minutes or 60 seconds or 60000 milisecond (Program use mili second)

    // Set 30 Minutes

    setTimeout(function() {
        earn_point_r(30)
    }, min_30); // Set for 1 minutes or 60 seconds or 60000 milisecond (Program use mili second)

    // Set 60 Minutes

    setTimeout(function() {
        earn_point_r(60)
    }, min_60); // Set for 1 minutes or 60 seconds or 60000 milisecond (Program use mili second)


    // Function
    function earn_point_r(minutes=5)
    {
        $.ajax({
            url: '{{ URL::to('earn-point-read', $book->id) }}',
            type: 'GET',
            dataType: 'JSON',
            async:true,
            data:{minutes:minutes}
        })
        .done(function(e) {
            if (e.is_complete_challenge == 1) {
                Swal.fire(
                    'Good job!',
                    'Congratulations.! You just earned '+e.point_change+' Point and '+e.coin_change+' Coin From completing a reading challenge!',
                    'success'
                )
            }else if(e.point_change != e.Point){
                Swal.fire(
                    'Good job!',
                    'Congratulations.! You just earned '+e.point_change+' Point and '+e.coin_change+' Coin.',
                    'success'
                )
            }
            $("#user-point-nav").html(e.Point+' Points')
            $("#user-score-nav").html(e.user_score+' Coin')
            console.log(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
</script>
@endsection