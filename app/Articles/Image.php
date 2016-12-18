<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /*------------------------------------------------------------------------**
    ** Relation 定義
    **------------------------------------------------------------------------*/
    public function article()
    {
      return $this->belongsTo(Article::class);
    }
}
