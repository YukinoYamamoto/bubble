<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BubbleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
//use App\Http\Middleware\Authenticate;
//use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*laravel スタートページ
Route::get('/welcome', function () {
    return view('welcome');
});
*/
//Route::get('/', function () {
    //return view('bubbleshare.index');
//});

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
// ホーム画面
Route::get('index',[BubbleController::class,'index']);
Route::get('HOME', function () {
    return view('dashboard');
});

Route::get('/index',[BubbleController::class,'index'])
->middleware('auth')
->name('index');
*/

Route::get('/mypage',[BubbleController::class,'mypage'])
->middleware('auth')
->name('mypage');

/*auth.phpに書かれているので不要
Route::post('/logout',[BubbleController::class,'logout'])
->middleware('auth')
->name('logout');

Route::get('/login',[AuthenticatedSessionController::class,'create'])
->middleware('auth')
->name('login');
*/
Route::get('/today',[BubbleController::class,'today'])
->middleware('auth')
->name('today');

Route::get('/post',[BubbleController::class,'post'])
->middleware('auth')
->name('post');


Route::post('/confirm',[BubbleController::class,'confirm'])
->middleware('auth')
->name('confirm');

//DB登録用メソッド
Route::post('newpost',[BubbleController::class,'newpost'])
->middleware('auth')
->name('newpost');

Route::get('/alltext',[BubbleController::class,'alltext'])
->middleware('auth')
->name('alltext');

Route::get('/detail',[BubbleController::class,'detail'])
->middleware('auth')
->name('detail');
Route::post('/detail',[BubbleController::class,'detail'])
->middleware('auth')
->name('detail');

Route::get('/edit',[BubbleController::class,'edit'])
->middleware('auth')
->name('edit');
Route::post('/edit',[BubbleController::class,'edit'])
->middleware('auth')
->name('edit');

Route::post('editcomp',[BubbleController::class,'editcomp'])
->middleware('auth')
->name('editcomp');

//Route::post('/delete/{id}',[BubbleController::class,'delete'])
Route::post('/delete',[BubbleController::class,'delete'])
->middleware('auth')
->name('delete');
//Route::post('/delete', 'App\Http\Controllers\BubbleController@delete');

Route::get('/likelist',[BubbleController::class,'likelist']);

//Route::post('/like/{postId}',[LikeController::class,'store']);
//Route::post('/unlike/{postId}',[LikeController::class,'destroy']);
Route::post('/like/{postId}',[LikeController::class,'like_post']);
Route::post('/unlike/{postId}',[LikeController::class,'like_post']);

Route::post('/like_post', 'App\Http\Controllers\BubbleController@like_post');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {
    Route::get('/', function () {
        return 'admin only';
    });
});  