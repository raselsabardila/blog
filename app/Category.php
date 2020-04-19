<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table="categorys";
    protected $fillable=["name","slug"];

    public function post(){
        return $this->hasMany("App\Post","kategori_id");
    }
}
