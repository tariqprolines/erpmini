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
          <h1>Operator List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Operator List</li>
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
              <h3 class="card-title">Operators</h3>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>
                          {{$loop->index+1}}
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                          <a href="{{ route('editoperator', $user->id) }}" class="btn btn-xs btn-primary">Edit</a>
                          <form  method="post" action="{{ route('deleteoperator',$user->id) }}" class="delete_form">
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created date</th>
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
