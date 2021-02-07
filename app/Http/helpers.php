<?php

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

/* プロフィール画像作成 */
function makeUserImage($user){
    /* Image Config */
    $ext = 'jpg'; // jpg,png,gif,webp
    $size = 150;
    $quality = 80;
    $save_path = 'img/';
    $now = date('Ymd_His');
    $user_id = $user -> id;
    $file_name = $user_id . '_' . $now . '.' . $ext;

    /* update image */
    $img = request('img');
    if ($img) {
        Image::make($img)
            -> fit($size)
            -> encode($ext)
            -> save(public_path($save_path) . $file_name, $quality);
        $user -> img = $file_name;
    }
}

function getUser($id){
    return App\Models\User::find($id);
}

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