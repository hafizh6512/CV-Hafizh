<?php
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ExclusiveBookUser;
use App\Models\Reward;
use App\Models\RewardRedeem;
use App\Models\PointSetting;

if (! function_exists('debugCode')) {
    function debugCode($r=array(),$f=TRUE)
    {
        echo "<pre>";
        print_r($r);
        echo "</pre>";

        if($f==TRUE) 
            die;
    }
}

function selected($par1, $par2)
{
    return ($par1 == $par2)?"selected":'';
}

function checked($par1, $par2)
{
    return ($par1 == $par2)?"checked":'';
}

function calculate_days($date1, $date2)
{
    $diff   = abs(strtotime($date2) - strtotime($date1));
    $years  = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    return $days;
}

function getUserPoint($user_id)
{
    $data = User::where('id', $user_id)->first();
    return $data->points;
}

function getUserScore($user_id)
{
    $data = User::where('id', $user_id)->first();
    return $data->score;
}

function getUserKey($user_id)
{
    $data = User::where('id', $user_id)->first();
    return $data->keys;
}

function html_star($star = 0)
{
    if ($star == 5) {
        $html = '
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
        ';
    }elseif($star >= 4 and $star < 5){
        $html = '
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star"></i>
        ';
    }elseif($star >= 3 and $star < 4){
        $html = '
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        ';
    }elseif($star >=2 and $start < 3){
        $html = '
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        ';
    }elseif($star >= 1 and $star <2){
        $html = '
            <i class="fa fa-star" style="color:#f2b01e"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        ';
    }else{
        $html = '
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        ';
    }
    return $html;
}

function getDateReset($id)
{
    $data = PointSetting::where('id', $id)->first();
    return $data->value;
}

function addPointDefaultUser($user_id, $type='read', $minutes = 5, $pointEarn = 0, $coinEarn=0)
{
    $p_minutes = [
        5  => 'read_5_min_point',
        15 => 'read_15_min_point',
        30 => 'read_30_min_point',
        60 => 'read_60_min_point'
    ];

    $c_minutes = [
        5  => 'read_5_min_coin',
        15 => 'read_15_min_coin',
        30 => 'read_30_min_coin',
        60 => 'read_60_min_coin'
    ];
    if ($pointEarn == 0) {
        if ($type == 'read') {
            $pointEarn = PointSetting::where('key', $p_minutes[$minutes])->first()->value;
        }else{
            $pointEarn = PointSetting::where('key', 'review_point')->first()->value;
        }
    }

    if ($coinEarn == 0) {
        if ($type == 'read') {
            $coinEarn = PointSetting::where('key', $c_minutes[$minutes])->first()->value;
        }else{
            $coinEarn = PointSetting::where('key', 'review_coin')->first()->value;
        }
    }

    $user = User::find($user_id);
    $user->points = $user->points+$pointEarn;
    $user->score  = $user->score+$coinEarn;
    $user->save();

    return $user->points;
}

function status_reward($status = 0, $return_list = false)
{
    $list = ['Pending', 'Dalam Pengiriman', 'Selesai'];
    if ($return_list == false) {
        return $list[$status];
    }else{
        return $list;
    }
}

function point_key_exchange()
{
    $data = PointSetting::where('key', 'exclusive')->first();
    return $data;
}


function check_user_book_exclusive($user_id, $book_id)
{
    $data = ExclusiveBookUser::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->first();
    return $data;
}

function checkIsClaimed($user_id, $date_start, $date_end)
{
    $data = RewardRedeem::where('user_id', $user_id)
        ->whereRaw('(DATE(created_at) BETWEEN "'.$date_start.'" AND "'.$date_end.'")')
        ->first();
    return $data;
}

function shop_status($status='')
{
    $list_status = ['Pending', 'On Delivery', 'Done'];
    if ($status !== '') {
        return $list_status[$status];
    }else{
        return $list_status;
    }
}

function get_reward_position($position)
{
    $data = Reward::find($position);
    if (!empty($data)) {
        return $data->coin_reward.' Coin';
    }else{
        return '-';
    }
}