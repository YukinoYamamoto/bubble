<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use App\Models\Bubbledata;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;


class BubbleController extends Controller
{
    /**
     * @return View
     */
    public function index(){
        return view('bubbleshare.index');
    }
    /*public function passreset(){
        return view('bubbleshare.passreset');
    }
    public function validation(){
        return view('bubbleshare.validation');
    }*/
    /*public function create(Request $request){ 
        $post = new Bubbledata;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = $request->pass;
        $post->roll = $request->roll;
        $post->save();
        return view('auth.login');
      }*/

    //public function mypage(Request $request){
        //Authでログイン中のユーザidの取得
        //$user_id = Auth::id();
        //$user_name = Auth::user();
        //$user_name = "SELECT * FROM users INNER JOIN text ON text.user_id = users.id";
        //$text = $request->text;
        //$user = new Bubbledata;
        //$user -> create([
            //'user_id' => $user_id,
            //'name' => $user_name,
            //'text' => $text,
        //]);
    public function mypage(){
        $user_id = Auth::id();
        $texts = DB::table('text')
        ->select('id','created_at','text')->orderBy('created_at', 'desc')->where('user_id','=',$user_id)->get();
        return view('bubbleshare.mypage',compact('texts'));
    }
    //dd($posts);
    
    public function detail(Request $request){
        $post = $request->id;
        $texts = DB::table('text')
        ->select('id','user_id','created_at', 'text')->orderBy('created_at', 'desc')->where('id','=',$post)->get();

        return view('bubbleshare.detail', compact('texts'));
    }
    public function post(){
        return view('bubbleshare.post');
    }
    public function alltext(){
        $texts = DB::table('text')
        ->select('id','user_id','created_at', 'text')->orderBy('created_at', 'desc')->get();
        return view('bubbleshare.alltext',compact('texts'));
    }
    public function confirm(Request $request){
        $text = $request->text;
        //確認画面に表示する内容を格納
        $post_data = [
            'text' => $text
        ];
        return view('bubbleshare.confirm', $post_data);
    }

    public function newpost(Request $request){
        $user_id = Auth::id();
        $text = $request->text;

        $post = new Bubbledata;
        $post -> create([
            'user_id' => $user_id,
            'text' => $text,
        ]);

        $texts = DB::table('text')
        ->select('user_id','created_at', 'text')->orderBy('created_at', 'desc')->where('user_id','=',$user_id)->get();
        //return view('bubbleshare.mypage',compact('texts'));
        return redirect('/mypage');
    }

    public function delete(Request $request){
        //$id = Auth::id();
        $id = $request->id;
        $texts = DB::table('text')
        
        ->where('id', "=", $id)
        ->delete();
        //return view('')
        //return  $request->input('delete');
        return redirect('/mypage');
        //return view('bubbleshare.detail');
    }

    public function edit(Request $request){
        //投稿のID取得
        $post = $request->id;

        $texts = DB::table('text')
        ->select('id','user_id','created_at', 'text')->orderBy('created_at', 'desc')->where('id','=',$post)->get();
        return view('bubbleshare.edit', compact('texts'));
    }

    public function editcomp(Request $request){
        $text = Bubbledata::find($request->id);
       // $text = new Bubbledata();
       // $text->text = $request->text;
        $text->update([
            'text' => $request->input('text'),
        ]);
        return redirect('/today');

    }

    public function today(){
        //$post = $request->id;
        $texts = DB::table('text')
        ->select('id', 'created_at', 'text')->whereRaw('created_at > Now() - INTERVAL 1 DAY')->orderBy('created_at', 'desc')->get();
        return view('bubbleshare.today',compact('texts'));
    }

    public function like_post(Request $request){
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();
        if ( $request->input('like_post') == 0) {
             //ステータスが0のときはデータベースに情報を保存
            Like::create([
                 'text_id' => $request->input('text_id'),
                  'user_id' => $id,
             ]);
            //ステータスが1のときはデータベースに情報を削除
         } elseif ( $request->input('like_post')  == 1 ) {
            Like::where('text_id', "=", $request->input('text_id'))
                ->where('user_id', "=", $id)
                ->delete();
        }
         return  $request->input('like_post');
    }
    
    public function likelist(Request $request){
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        $texts = DB::table('text')  // 主となるテーブル名
        ->select('text.id', 'users.name as user_name', 'text.text', 'text.created_at')
        ->join('users', 'text.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->join('likes', 'text.id', '=', 'likes.text_id')
        ->where('likes.user_id', '=', $id)
        ->whereRaw('text.created_at > Now() - INTERVAL 1 DAY')
        ->orderBy('text.created_at', 'desc')
        ->get();

        return view('bubbleshare.good',compact('texts'));
    }

    public function good(){
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        $texts = DB::table('text')  // 主となるテーブル名
        ->select('text.id', 'users.name as user_name', 'text.text', 'text.created_at')
        ->join('users', 'text.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->join('likes', 'text.id', '=', 'likes.text_id')
        ->where('likes.user_id', '=', $id)
        ->whereRaw('created_at > Now() - INTERVAL 1 DAY')
        ->orderBy('created_at', 'desc')
        ->get();
        //return redirect('bubbleshare.detail');
        return view('bubbleshare.today');
    }

    //public function logout(){
    //    return view('bubbleshare.login');
    //}
     /* public function vali(Request $request){
        $data = $request->all();
    
        $request->validate([
          'name' => 'required|max:10|unique:bubble,name',
          'email' => 'required|email|unique:bubble,email',
          'password' => 'required|password|unique:bubble,password',
        ]);
  
        return view('bubbleshare.login')->with($data);
      }
  */
}
