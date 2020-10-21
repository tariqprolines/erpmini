<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
class SalesManagerController extends Controller
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
        $users= User::where('role_id',2)->orderBy('id', 'desc')->get();
        return view('salesmanagers.list',['users' => $users]);
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
      return view('salesmanagers.create');
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
     'name' => 'required|string|max:255',
     'email' => 'required|string|email|max:255|unique:users',
     'password' => 'required|string|min:8|confirmed'
      ]);
      $user = new User();
      $user->name = $request->name;
      $user->email= $request->email;
      $user->password=Hash::make($request->password);
      $user->role_id= '2';
      $user->created_by=Auth::user()->id;
      $user->save();
      $details = [
        'name' => $user->name,
        'message' => 'You have added successfully as a Sales Manager, We will send your login credendial shortly.'
      ];
      \Mail::to($user->email)->send(new SendEmail($details));
      return redirect()->route('salesmanagers')->with('success', 'Sales Manager Added successfully.');
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
      $user = User::find($id);
      return view('salesmanagers.edit',['user'=>$user]);
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
      $user = User::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->save();
      return redirect()->route('salesmanagers')->with('success','User updated successfully.');
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
      $user = User::find($id)->delete();
      return back()->with('success','User deleted successfully.');
    }
}
