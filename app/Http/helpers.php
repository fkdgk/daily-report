<?php

use Carbon\Carbon;
use Intervention\Image\Facades\Image;


function truncate($str) {
    return (mb_strlen(strip_tags($str)) > 30) ? mb_substr(strip_tags($str), 0, 30) . '…' : strip_tags($str) ;
}

/* 
 * --------------------------
 * Toastr メッセージ
 */
function toastr_copy(){
    return toastr() -> success('複製しました');
}

function toastr_store(){
    return toastr() -> success('新規作成しました');
}

function toastr_update(){
    return toastr() -> success('更新しました');
}

function toastr_delete(){
    return toastr() -> error('削除しました');
}

function toastr_error(){
    return toastr() -> error('エラーが発生しました');
}

function toastr_not_allow(){
    return toastr() -> error('権限がありません');
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