<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::all();
        return view('news/news-index',[
            'news'=>$news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news/news-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        News::create($request);
        return redirect()->route('news-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::find($id);
  
        return view('news/news-show',[
            'news'=>$news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     
        $news=News::find($id);
        return view('news/news-edit',[
            'news'=>$news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        News::edit($request,$id);
        return redirect()->route('news-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);
        $news->delete();
        return redirect()->route('news-index');
    }
    
    public function blog($id)
    {
        $news = News::find($id);
        return view('frontend/blog-single', [
            'news' => $news,
        ]);
    }
    


}
