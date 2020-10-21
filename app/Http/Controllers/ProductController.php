<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
        $products = Product::orderBy('id','desc')->get();
        return view('products.list',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
      $categories = Category::all();
      $brands = Brand::all();
      return view('products.create', ['categories' => $categories,'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
      $request->validate([
        'name'=>'required|string|unique:products',
        'slug'=>'required|string|unique:products',
        'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        'category_id' => 'required',
        'brand_id' => 'required',
        'prod_image' => 'required|max:1024',
      ]);
      $product = new Product();
      $product->name = $request->name;
      $product->slug = $request->slug;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->category_id = $request->category_id;
      $product->brand_id = $request->brand_id;
      $product->meta_title = $request->meta_title;
      $product->meta_keyword = $request->meta_keyword;
      $product->meta_description = $request->meta_description;
      $product->user_id = Auth::user()->id;
      if($request->hasFile('prod_image')){
        $fileName = time().'_'.$request->prod_image->getClientOriginalName();
        $request->file('prod_image')->storeAs('uploads', $fileName, 'public');
        $product->image=$fileName;
      }
      $product->save();
      return redirect()->route('products')->with('success','Product Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
        $product = Product::findorFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit',['categories' => $categories,'brands'=>$brands,'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
        $product = Product::findorFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->meta_title = $request->meta_title;
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->user_id = Auth::user()->id;
        $prod_upload_image= $request->prod_upload_image;
        if($request->hasFile('prod_image')){
            $fileName = time().'_'.$request->prod_image->getClientOriginalName();
            $request->file('prod_image')->storeAs('uploads', $fileName, 'public');
            $product->image=$fileName;
            if(!empty($prod_upload_image)){
              Storage::disk('public')->delete('uploads/'.$prod_upload_image);
            }
          }
        $product->save();

        return redirect()->route('products')->with('success','Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Gate::denies('isAdmin')){
        abort(401);
      }
        $product = Product::findorFail($id);
        if($product){
          if($product->delete()){
            Storage::disk('public')->delete('uploads/'.$product->image);
            return back()->with('success', 'Product Deleted Successfully.');
          }
        }
    }
}
