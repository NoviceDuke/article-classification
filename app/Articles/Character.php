<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\Article;
use App\Articles\Slip;

class Character extends Model
{
    public $fillable = ['article_id','slip_id','scribe','explanation','order','character_pic','slip_order','title'];
    //對應到一篇文章
    public function articles()
    {
      return $this->belongsTo(Article::class);
    }
    //對應到一個竹簡
    public function slips()
    {
      return $this->belongsTo(Slip::class);
    }
}
