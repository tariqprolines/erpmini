@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Add New Operator</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
           <li class="breadcrumb-item active">{{ __('Add New Operator') }}</li>
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
             <h3 class="card-title">{{ __('Add Operator') }}</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
             <div class="card-body">
                 <form method="POST" action="{{ route('createoperator') }}">
                     @csrf

                     <div class="form-group row">
                         <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                         <div class="col-md-8">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                             @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                         <div class="col-md-8">
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                         <div class="col-md-8">
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                         <div class="col-md-8">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         </div>
                     </div>

                     <div class="form-group row mb-0">
                         <div class="col-md-8 offset-md-2">
                             <button type="submit" class="btn btn-primary">
                                 {{ __('Submit') }}
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
