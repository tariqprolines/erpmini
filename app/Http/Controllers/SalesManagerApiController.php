<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;

class SalesManagerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        $salesmanagers= $id?User::find($id):User::where('role_id','2')->orderBy('id','desc')->get();
        return response()->json([
              'salesmanagers' => $salesmanagers
          ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User();
      $user->name = $request->name;
      $user->email= $request->email;
      $user->password=Hash::make($request->password);
      $user->role_id= '2';
      $user->created_by=$request->created_by;
      $user->save();
      return response()->json([
            'message' => 'Successfully created SalesManager!'
        ], 201);
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
        //
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
        $salesmanager = User::findorFail($id);
        $salesmanager->name = $request->name;
        $salesmanager->email = $request->email;
        $salesmanager->role_id = '2';
        $salesmanager->updated_by=$request->updated_by;
        $salesmanager->save();
        return response()->json([
              'message' => 'Successfully Updated SalesManager!'
          ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salesmanager = User::findorFail($id);
        if($salesmanager){
          $salesmanager->delete($id);
          return response()->json(null, 204);
        }
    }
}
