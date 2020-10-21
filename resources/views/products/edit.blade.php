@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>{{__('Edit Product')}}</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
           <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('Product List') }}</a></li>
           <li class="breadcrumb-item active">{{__('Edit Product')}}</li>
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
             <h3 class="card-title">{{__('Edit Product')}}</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
             <div class="card-body">
                 <form method="POST" action="{{ route('editproduct',$product->id) }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group row">
                         <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                         <div class="col-md-8">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>
                             @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Slug') }}</label>

                         <div class="col-md-8">
                             <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $product->slug }}" required autocomplete="slug">
                             @error('slug')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Price') }}</label>

                         <div class="col-md-8">
                             <input id="price" type="text" class="form-control @error('slug') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price">
                             @error('price')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="slug" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                         <div class="col-md-8">
                           <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                          </div>
                     </div>
                     <div class="form-group row">
                         <label for="meta_title" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}*</label>
                         <div class="col-md-8">
                           <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                             <option value="">--Select--</option>
                             @foreach($categories as $category)
                               <option value="{{ $category->id }}" {{ $product->category_id == $category->id?'selected="selected"':"" }}>{{ $category->name }}</option>
                             @endforeach
                           </select>
                           @error('category_id')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="meta_title" class="col-md-2 col-form-label text-md-right">{{ __('Brand') }}*</label>
                         <div class="col-md-8">
                           <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                             <option value="">--Select--</option>
                             @foreach($brands as $brand)
                               <option value="{{ $category->id }}" {{ $product->brand_id == $brand->id?'selected="selected"':"" }}>{{ $brand->name }}</option>
                             @endforeach
                           </select>
                           @error('brand_id')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="prod_image" class="col-md-2 col-form-label text-md-right">{{ __('Uploaded Image') }}*</label>
                         <div class="col-md-8">
                           <img src="{{asset('storage/uploads/'.$product->image)}}" class="img-thumbnail w-50"/>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="prod_image" class="col-md-2 col-form-label text-md-right">{{ __('Product Image') }}*</label>
                         <div class="col-md-8">
                           <input id="prod_image" type="file" class="form-control" name="prod_image" value="{{ old('prod_image') }}" />
                           <input type="hidden" name="prod_upload_image" value="{{$product->image}}" />
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="meta_title" class="col-md-2 col-form-label text-md-right">{{ __('Meta Title') }}</label>

                         <div class="col-md-8">
                             <input id="meta_title" type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}" >

                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="meta_keyword" class="col-md-2 col-form-label text-md-right">{{ __('Meta Keyword') }}</label>

                         <div class="col-md-8">
                             <input id="meta_keyword" type="text" class="form-control" name="meta_keyword" value="{{ $product->meta_keyword }}" >

                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="slug" class="col-md-2 col-form-label text-md-right">{{ __('Meta Description') }}</label>
                         <div class="col-md-8">
                           <textarea name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
                         </div>
                     </div>


                     <div class="form-group row mb-0">
                         <div class="col-md-8 offset-md-2">
                             <button type="submit" class="btn btn-primary">
                                 {{ __('Update') }}
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
