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
            })->get();
              $title_data=$data->groupBy('title');
              $content = $data->groupBy('example')->first();
              dd($content);
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

                    $kk = Slip::create(array('content'=>$jj->example , 'order'=>$jj->order ));

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

                    $data = Excel::selectSheets('Sheet1')->load($path, function($reader) {
                    })->get();
                    //dd($data->unique('title'));
                    //$articles = Article::all();

                    $data = $data->chunk(200);
                    DB::connection()->disableQueryLog();

                    if(!empty($data) && $data->count()){

                      $data->each(function($Characters){
                        foreach($Characters as $key => $value)
                        {
                          $pp = Character::create(array('scribe'=>$value->scribe,'explanation'=>$value->explanation,'content'=>$value->example , 'order'=>$value->order2 ));
                            $articles = Article::all();

                          foreach($articles as $article )
                          {
                            if($article->title == $value->title)
                            {
                            //dd($article->id);
                               $pp->update(['article_id'=>$article->id]);
                                 $slips = Slip::where('article_id',$article->id)->where('order',$value->order)->first();
                               $pp->update(['slip_id'=>$slips->id]);

                            }
                          }
                        }
                      });

                    // foreach ($data as $key => $value) {
                    // //	$insert[] = ['order'=>$value->order2, 'scribe' => $value->scribe ,'explanation'=>$value->scribe];
                    // //    Character::create(array('order'=>$value->order2, 'scribe' => $value->scribe ,'explanation'=>$value->explanation));
                    //
                    //
                    //   Slip::create(array('content'=>$value->example , 'order'=>$value->order ));
                    //
                    // }

                    dd('Insert Record successfully.');

                  }
                    //$data = $reader->select(array('title','order2','scribe','explanation','resource'))->get();

                    //dd($data);


                  }
              }
          public function relationship(Request $request  )
          {
            $slips = Slip::all();

          }
  }
