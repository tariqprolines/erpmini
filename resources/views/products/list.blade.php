@extends('layouts.master')
@section('content')
<!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}">
 <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Product List') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Product List') }}</li>
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
              <h3 class="card-title">{{ __('Products') }}</h3>
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
                        <th>image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Price(INR)</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Create By</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td class="text-center">
                          <img src="{{asset('storage/uploads/'.$product->image)}}" class="img-thumbnail w-75 mx-auto"/>
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->user->name}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>
                          <a href="{{ route('editproduct', $product->id) }}" class="btn btn-xs btn-primary">Edit</a>
                          <form  method="post" action="{{ route('deleteproduct',$product->id) }}" class="delete_form">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                           </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                      <th>S.N.</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Price(INR)</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Create By</th>
                      <th>Created Date</th>
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
