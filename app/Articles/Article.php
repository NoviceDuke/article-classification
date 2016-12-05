<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\Character;
use App\Articles\Slip;
class Article extends Model
{
  public $fillable = ['title','resource','content'];
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

}
