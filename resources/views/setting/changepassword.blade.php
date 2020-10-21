@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Change Password</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
           <li class="breadcrumb-item active">{{ __('Change Password') }}</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <!-- left column -->
       <div class="col-md-12">
         <!-- general form elements -->
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">{{ __('Change Password') }}</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
             <div class="card-body">
               @if(Session::has('success'))
                   <p class="alert alert-success">{{ Session::get('success') }}</p>
              @endif
                 <form method="POST" action="{{ route('changepassword') }}">
                     @csrf

                     <div class="form-group row">
                         <label for="currentpassword" class="col-md-2 col-form-label text-md-right">{{ __('Current Password') }}</label>

                         <div class="col-md-8">
                             <input id="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" value="{{ old('currentpassword') }}" placeholder="Enter Old Password" required autocomplete="currentpassword" autofocus>

                             @error('currentpassword')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="newpassword" class="col-md-2 col-form-label text-md-right">{{ __('New Password') }}</label>

                         <div class="col-md-8">
                             <input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" value="{{ old('newpassword') }}" placeholder="Enter New Password" required autocomplete="newpassword">
                             @error('newpassword')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="confirmpassword" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                         <div class="col-md-8">
                             <input id="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" value="{{ old('confirmpassword') }}" placeholder="Confirm Password" required autocomplete="confirmpassword">
                             @error('confirmpassword')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row mb-0">
                         <div class="col-md-8 offset-md-2">
                             <button type="submit" class="btn btn-primary">
                                 {{ __('Change Password') }}
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <!-- /.card -->
       </div>
       <!--/.col (left) -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
@endsection
