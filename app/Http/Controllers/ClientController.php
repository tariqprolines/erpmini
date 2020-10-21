<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
        $clients = Client::orderBy('id', 'desc')->get();
        return view('clients.list',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
        $request->validate([
          'name' => 'required|string',
          'email' => 'required|string|email|max:255|unique:clients',
          'mobileno' => 'required|string|min:10|max:10|unique:clients',
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->mobileno = $request->mobileno;
        $client->user_id = Auth::User()->id;
        $client->save();

        return redirect('clients')->with('success','Record Added Successfully.');
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
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
        $client = Client::findorFail($id);
        return view('clients.edit',['client' => $client]);
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
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
      $client = Client::findorFail($id);
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email|max:255',
        'mobileno' => 'required|string|min:10|max:10',
      ]);
      $client->name = $request->name;
      $client->email = $request->email;
      $client->mobileno = $request->mobileno;
      $client->save();

      return redirect()->route('clients')->with('success', 'Records Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Gate::none(['isAdmin','isSalesManager'])){
        abort(401);
      }
        $client = Client::findorFail($id);
        if($client){
          $client->delete();
          return back()->with('success', 'Record Deleted Successfully.');
        }
    }
}
