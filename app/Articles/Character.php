<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //對應到一篇文章
    public function article()
    {
      return $this->belongsTo(Article::class);
    }
    //對應到一個竹簡
    public function slip()
    {
      return $this->belongsTo(Slip::class);
    }
}
