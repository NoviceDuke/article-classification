<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\Article;
use App\Articles\Character;
class Slip extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義
    **------------------------------------------------------------------------*/
    public $fillable = [
      'order',
      'slip_pic',
      'article_id',
      'content'
    ];
    /*------------------------------------------------------------------------**
    ** Relation 定義
    **------------------------------------------------------------------------*/
    //對應到一篇文章
    public function article()
    {
      return $this->belongsTo(Article::class,'article_id');
    }
    //對應到多個字
    public function characters()
    {
      return $this->hasMany(Character::class);
    }
}
