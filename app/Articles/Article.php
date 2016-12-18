<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\Character;
use App\Articles\Slip;
class Article extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義
    **------------------------------------------------------------------------*/
    public $fillable = [
      'title',
      'resource',
      'content'
    ];
    /*------------------------------------------------------------------------**
    ** Relation 定義
    **------------------------------------------------------------------------*/
    //文章對應到多個竹簡
    public function slips()
    {
      return $this->hasMany(Slip::class);
    }
    //文章對應到多個文字
    public function characters()
    {
      return $this->hasMany(Character::class);
    }
    public function images()
    {
      return $this->hasMany(Image::class);
    }
}
