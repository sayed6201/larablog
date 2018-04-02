<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','content','user_id','photo_id','catagory_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function catagory(){
        return $this->belongsTo('App\Catagory');
    }
}
