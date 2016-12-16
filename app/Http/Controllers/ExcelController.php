<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;
use Validator;
use App\Articles\Character;
use App\Articles\Article;
use App\Articles\Slip;

class ExcelController extends Controller
{
    //
    public function importData()
    {
      return view('frontend.excelImport');
    }
    public function download(Request $request , $type)
    {

    }
    public function importArticle(Request $request  )
    {


      if($request->hasFile('import_file'))
      {
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::selectSheets('Sheet1')->load($path, function($reader) {
        })->get()->unique('title');

        if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {

            Article::create(array('resource'=>$value->resource , 'title'=>$value->title ));
          //  $slips =Slip::create(array('content'=>$value->exa , 'title'=>$value->title ));

                }
			    }
      }

      dd('Insert Record successfully.');
      }
      public function importSlip(Request $request  )
        {


          if($request->hasFile('import_file'))
          {
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::selectSheets('Sheet1')->load($path, function($reader) {
            })->get()->groupBy('title');

            DB::connection()->disableQueryLog();
            //dd($data->unique('title'));
            //$articles = Article::all();

            $data = $data->chunk(200);

            foreach($data as $key =>$qq)
            {

              foreach($qq as $key =>$pp)
              {

                $title = $qq->keys();
                $order = collect();
                foreach($pp as $key =>$jj)
                {
                  if(!$order->contains($jj->order) && !!$title->contains($jj->title) )
                  {

                    $kk = Slip::create(array( 'order'=>$jj->order ));

                    $title->push($jj->title);
                    $order->push($jj->order);

                    $articles = Article::all();
                  foreach($articles as $article )
                  {

                    if($article->title == $jj->title)
                    {
                        $kk->update(['article_id'=>$article->id]);
                    }
                  }
                  }
                }
              }

            }
            dd('完成拉');
            dd('Insert Record successfully.');

          }

          }



            public function importCharacter(Request $request  )
              {

                  if($request->hasFile('import_file'))
                  {
                    $path = $request->file('import_file')->getRealPath();

                    $data = Excel::selectSheets('工作表1')->load($path, function($reader) {
                    })->get()->chunk(200);
                    //dd($data->unique('title'));
                    //$articles = Article::all();
                      DB::connection()->disableQueryLog();
                  //  dd($data);
                    foreach($data as $chunks)
                    {
                      foreach($chunks as $chunk)
                      {
                        if(!empty($chunk->example)){
                          $character = Character::create(array('scribe'=>$chunk->scribe,'explanation'=>$chunk->explanation,'content'=>$chunk->example , 'order'=>$chunk->order2 ));
                            $articles = Article::all();
                            foreach($articles as $article )
                            {
                              if($article->title == $chunk->title)
                              {

                                 $character->update(['article_id'=>$article->id]);
                                   $slips = Slip::where('article_id',$article->id)->where('order',$chunk->order)->first();
                                $character->update(['slip_id'=>$slips->id]);

                              }
                            }  
                        }

                      }
                    }
                      dd('Insert Record successfully.');



                  }
              }
              public function importSlipContent(Request $request  )
                {


                  if($request->hasFile('import_file'))
                  {
                    $path = $request->file('import_file')->getRealPath();

                    $data = Excel::selectSheets('工作表1')->load($path, function($reader) {
                    })->get()->groupBy('example')->chunk(200);

                    DB::connection()->disableQueryLog();
                    //dd($data->unique('title'));
                    //$articles = Article::all();

                    //$data = $data->chunk(200);


                    foreach($data as $key =>$qq)
                    {

                      foreach($qq as $key =>$pp)
                      {


                        $order = collect();
                        foreach($pp as $key =>$jj)
                        {
                          if(!$order->contains($jj->order) && !empty($jj->example) )
                          {
                            $articles = Article::all();
                            foreach($articles as $article)
                            {
                              if($article->title == $jj->title)
                              {
                                $slip = Slip::where('order',$jj->order)->where('article_id',$article->id)->first();
                              //  dd($slip);
                                  if(empty($slip->content))
                                  {
                                      $slip->update(['content'=>$jj->example]);
                                  }
                                  else
                                  $slip->update(['content'=>($slip->content.$jj->example)]);
                                   $order->push($jj->order);
                                }


                            }

                          }
                        }
                      }

                    }
                    dd('完成拉');


                  }

                  }

  }
