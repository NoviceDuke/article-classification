<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //文章對應到多個竹簡
    public function slip()
    {
      return $this->belongsToMany(Slip::class);
    }
    //文章對應到多個文字
    public function character()
    {
      return $this->belongsToMany(Character::class);
    }
    
}
