<?php
use Carbon\Carbon;

function formatTime($time){
    if($time){
        return Carbon::parse($time)->format('H:i');
    }
    return null;
}