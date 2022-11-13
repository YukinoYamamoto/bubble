<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bubbledata extends Model
{
    use HasFactory;
    /*protected $table = 'user';
    protected $fillable = ['id','name', 'email','password'];
    */
    protected $table = 'text';
    protected $fillable = ['user_id','text','created_at','updated_at'];

    //public $timestamps = false;
    public $timestamps = true;

  // 配列内の要素を書き込み可能にする
  /*protected $fillable2 = ['text_id','user_id'];

  public function text(){
    return $this->belongsTo(Reply::class);
  }

  public function users(){
    return $this->belongsTo(User::class);
  }
  public function good(){
      return $this->hasMany(good::class, 'text_id');
    }
    */

}
