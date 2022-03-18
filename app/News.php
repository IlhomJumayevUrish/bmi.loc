<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
    protected $table = "news";
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    static  public function create($request){
        $news=new News();
        $news->title= $request->title;
        $news->type=$request->type;
        $news->keyword= $request->key;
        $news->description= $request->description;
        if($file = $request->file('image')){
            $news->image= PublicMethod::uploadFile($file = $request->file('image'),'news');
            $news->image_s=PublicMethod::uploadImageSmall($file = $request->file('image'), 'news');;
        }
        $news->save();
      
    }
    static  public function edit($request,$id){
        $news=News::find($id);
        $news->title= $request->title;
        $news->type=$request->type;
        $news->keyword= $request->key;
        $news->description= $request->description;
        if ($request->file('image')) {
            $news->image = PublicMethod::uploadFile( $request->file('image'), 'news',$news->image);
            $news->image_s = PublicMethod::uploadImageSmall($request->file('image'),'news', $news->image_s);;
        }
        $news->save();
      
    }
}
