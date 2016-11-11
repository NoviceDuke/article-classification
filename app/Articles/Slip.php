<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    //對應到一篇文章
    public function article()
    {
      return $this->belongsTo(Article::class);
    }
    //對應到多個字
    public function character()
    {
      return $this->belongsToMany(Character::class);
    }
}
