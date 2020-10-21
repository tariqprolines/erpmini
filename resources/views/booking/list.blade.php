@extends('layouts.master')
@section('content')
<!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Booking List') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Booking List') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('Bookings') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if(Session::has('success'))
                  <p class="alert alert-success">{{ Session::get('success') }}</p>
             @endif
              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Booking No.</th>
                        <th>Operator</th>
                        <th>Client</th>
                        <th>Product</th>
                        <th>Address</th>
                        <th>Book Date</th>
                        <th>Quantity</th>
                        <th>Order Number</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($bookings as $booking)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$booking->booking_no}}</td>
                        <td>{{$booking->operator_id}}</td>
                        <td>{{$booking->client->name}}</td>
                        <td>{{$booking->product->name}}</td>
                        <td>{{$booking->address}}</td>
                        <td>{{$booking->book_datetime}}</td>
                        <td>{{$booking->quantity}}</td>
                        <td>{{$booking->order_no}}</td>
                        <td>{{$booking->created_at}}</td>
                        @if($booking->status==NULL && $booking->order_no==NULL)
                          <td>New</td>
                        @elseif($booking->status==1 && $booking->order_no!=NULL)
                          <td>Approved</td>
                        @else
                          <td>Reject</td>
                        @endif
                        <td>
                          <a href="{{ route('editbooking', encrypt($booking->id)) }}" class="btn btn-xs btn-primary">Edit</a>
                          <a href="{{ route('deletebooking', encrypt($booking->id)) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</a>
                          <!-- <form  method="post" action="{{ route('deletebooking',$booking->id) }}" class="delete_form">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                           </form> -->
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Booking No.</th>
                      <th>Operator</th>
                      <th>Client</th>
                      <th>Product</th>
                      <th>Address</th>
                      <th>Book Date</th>
                      <th>Quantity</th>
                      <th>Order Number</th>
                      <th>Created Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection
