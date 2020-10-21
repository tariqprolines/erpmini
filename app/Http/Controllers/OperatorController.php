<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterOperator;
class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      $users= User::where('role_id',3)->orderBy('id', 'desc')->get();
      return view('operators.list',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' =>'required|string|min:8|confirmed'
        ]);
      $user = new User();
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->role_id= 3;
      $user->created_by = Auth::user()->id;
      $user->save();
      $details = [
        'name' => $user->name,
        'message' => 'You have added successfully as an Operator, We will send your login credendial shortly.'
      ];
      \Mail::to($user->email)->send(new RegisterOperator($details));
      return redirect()->route('operators')->with('success','Operator Added Successfully');
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
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      $user = User::find($id);
      return view('operators.edit',['user' => $user]);
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
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      $user = User::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->save();
      return redirect()->route('operators')->with('success','Operator Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Gate::denies('isSalesManager')){
        abort(401);
      }
      $user = User::find($id)->delete();
      return redirect()->route('operators')->with('success','Operator Deleted Successfully.');
    }
}
