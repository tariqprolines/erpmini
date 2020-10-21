<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\User;
use App\Product;
use App\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id','desc')->get();
        return view('booking.list',['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clients = Client::orderBy('id','desc')->get();
      $products = Product::orderBy('id','desc')->get();
      return view('booking.create',['clients' => $clients,'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'client_id'=>'required',
          'address' => 'required',
          'book_datetime' =>'required',
          'product_id' => 'required',
          'quantity' => 'required',
        ]);
        $booking = new Booking();
        $booking->booking_no=date('ymd').mt_rand(100000, 999999);
        $booking->client_id= $request->client_id;
        $booking->address = $request->address;
        $booking->address_latitude = $request->address_latitude;
        $booking->address_longitude = $request->address_longitude;
        $booking->book_datetime=$request->book_datetime;
        $booking->product_id = $request->product_id;
        $booking->quantity = $request->quantity;
        $booking->description=$request->description;
        $booking->save();
        return redirect()->route('booking')->with('success','Booking Created Successfully.');
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
      $ID = decrypt($id);
      $operators= User::where('role_id',3)->orderBy('id', 'desc')->get();
      $clients = Client::orderBy('id','desc')->get();
      $products = Product::orderBy('id','desc')->get();
      $booking = Booking::findorFail($ID);
      return view('booking.edit',['operators' => $operators,'clients' => $clients,'products' => $products,'booking' => $booking]);
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
      $booking = Booking::findorFail($id);
      $booking->operator_id = $request->operator_id;
      $booking->client_id= $request->client_id;
      $booking->address = $request->address;
      $booking->address_latitude = $request->address_latitude;
      $booking->address_longitude = $request->address_longitude;
      $booking->book_datetime=$request->book_datetime;
      $booking->product_id = $request->product_id;
      $booking->quantity = $request->quantity;
      $booking->description=$request->description;
      $booking->order_no=date('ymd').mt_rand(100000, 999999);
      $booking->status=$request->status;
      $booking->save();
      return redirect()->route('booking')->with('success','Booking Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ID = decrypt($id);
      $booking = Booking::findorFail($ID);
      if($booking){
        $booking->delete();
        return redirect()->route('booking')->with('success','Booking Deleted Successfully.');
      }
    }
}
