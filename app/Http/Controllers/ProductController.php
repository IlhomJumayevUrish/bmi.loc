<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\PublicMethod;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::where('type','product')->get();
        return view('product/index',[
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Category::where('type','product')->get();
        return view('product/add',[
            'categories'=>$cate,
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
        $product=new Product();
        $product->name=$request->name;
        $product->url=$request->url;
        $product->category_id=$request->category;
        $product->type='product';
        $product->description=$request->description;
        if ($file = $request->file('image')) {
          
            $product->photo = PublicMethod::uploadFile($file,'products');
        }
        if ($file = $request->file('file')) {
          
            $product->file =PublicMethod::uploadFile($file,'products/file');
        }
        $product->save();
        return redirect()->route('product-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro=Product::find($id);
        return view('frontend/doctor',[
            'product'=>$pro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $cate = Category::where('type', 'product')->get();
        return view('product/update', [
            'categories' => $cate,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
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
            
            $product->photo = PublicMethod::uploadFile($file, 'products',$product->photo);
        }
        if ($file = $request->file('file')) {

            $product->file = PublicMethod::uploadFile($file, 'products/file', $product->file);
        }
        $product->save();
        return redirect()->route('product-index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('product-index');
    }
}
