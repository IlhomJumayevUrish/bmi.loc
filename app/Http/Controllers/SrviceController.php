<?php

namespace App\Http\Controllers;

use App\Category;
use App\Srvice;
use App\Http\Controllers\Controller;
use App\Product;
use App\PublicMethod;
use Illuminate\Http\Request;

class SrviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Product::where('type','service')->get();
        return view('service/index',[
            'products'=>$service
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::where('type', 'service')->get();
        return view('service/add', [
            'categories' => $cate,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->url = $request->url;
        $product->type = 'service';
        $product->category_id = $request->category;
        $product->description = $request->description;
        if ($file = $request->file('image')) {
            $product->photo = PublicMethod::uploadImage($file, 'products');
        }
        if ($file = $request->file('file')) {
            $product->file = PublicMethod::uploadImage($file, 'products/file');
        }
        $product->save();
        return redirect()->route('service-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Srvice  $srvice
     * @return \Illuminate\Http\Response
     */
    public function show(Srvice $srvice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Srvice  $srvice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cate = Category::where('type', 'service')->get();
        return view('service/update', [
            'categories' => $cate,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Srvice  $srvice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->url = $request->url;
        $product->category_id = $request->category;
        $product->description = $request->description;
        if ($file = $request->file('image')) {

            $product->photo = PublicMethod::uploadImage($file, 'products', $product->image);
        }
        if ($file = $request->file('file')) {
            $product->file = PublicMethod::uploadImage($file, 'products', $product->file);
        }
        $product->save();
        return redirect()->route('service-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Srvice  $srvice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('service-index');
    }
}
