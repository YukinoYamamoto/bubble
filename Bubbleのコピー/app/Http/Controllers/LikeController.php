<?php

namespace App\Http\Controllers;
use App\Models\Bubbledata;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function like_post(Request $request)
    {
         if ( $request->input('like_post') == 0) {
             //ステータスが0のときはデータベースに情報を保存
             Likepost::create([
                 'text_id' => $request->input('text_id'),
                  'user_id' => auth()->user()->id,
             ]);
            //ステータスが1のときはデータベースに情報を削除
         } elseif ( $request->input('like_post')  == 1 ) {
             Likepost::where('text_id', "=", $request->input('text_id'))
                ->where('user_id', "=", auth()->user()->id)
                ->delete();
        }
         return  $request->input('like_post');
    }
}