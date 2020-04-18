<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{   
    use SoftDeletes;

    protected $fillable=["judul","content","kategori_id","gambar","slug","user_id"];

    public function category(){
        return $this->belongsTo("App\Category","kategori_id");
    }

    public function tag(){
        return $this->belongsToMany("App\Tag");
    }

    public function user(){
        return $this->belongsTo("App\User","user_id");
    }

}
