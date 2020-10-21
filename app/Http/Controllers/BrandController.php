<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Brand;
use App\User;

class BrandController extends Controller
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
        $brands = Brand::orderBy('id','desc')->get();
        return view('brands.list',['brands' => $brands]);
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
        return view('brands.create');
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
          'name'=>'required|string|unique:brands',
          'slug'=>'required|string|unique:brands'
        ]);
        $brand = new Brand();
        $brand->name=$request->name;
        $brand->slug=$request->slug;
        $brand->description=$request->description;
        $brand->meta_title=$request->meta_title;
        $brand->meta_keyword=$request->meta_keyword;
        $brand->meta_description=$request->meta_description;
        $brand->user_id=Auth::user()->id;
        $brand->save();
        return redirect('brands')->with('success',$brand->name.' brand has been created successfully.');
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
        $brand = Brand::findorFail($id);
        return view('brands.edit',['brand'=>$brand]);
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
      $brand = Brand::findorFail($id);
      $brand->name = $request->name;
      $brand->slug = $request->slug;
      $brand->description = $request->description;
      $brand->meta_title = $request->meta_title;
      $brand->meta_keyword = $request->meta_keyword;
      $brand->meta_description = $request->meta_description;
      $brand->save();
      return redirect('brands')->with('success', 'Brand information Updated successfully.');
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
        $brand = Brand::findorFail($id);
        if($brand){
          $brand->delete();
          return redirect('brands')->with('success','Brand deleted successfully.');
        }
    }
}
