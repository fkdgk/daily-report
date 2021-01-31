<?php
use Carbon\Carbon;

function formatTime($time){
    if($time){
        return Carbon::parse($time)->format('H:i');
    }
    return null;
}

function sumTime($start_time, $finish_time){
    if( $start_time && $finish_time ){
        $total = (strtotime($finish_time) - strtotime($start_time)) / 60;
        return sprintf("%02d:%02d", floor($total/60), $total%60);
    }else{
        return null;
    }
}