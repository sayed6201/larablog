<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $path="/images/";
    protected $fillable=['photo_id','name',];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function getNameAttribute($photo){
        return $this->path.$photo;
    }
}
