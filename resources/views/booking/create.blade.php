@extends('layouts.master')
@section('stylesheet')
   <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>{{ __('Add New Client') }}</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
           <li class="breadcrumb-item active">{{ __('Add New Booking') }}</li>
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
             <h3 class="card-title">{{ __('Add Booking') }}</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->
             <div class="card-body">
                 <form method="POST" action="{{ route('createbooking') }}">
                     @csrf
                     <div class="form-group row">
                         <label for="meta_title" class="col-md-2 col-form-label text-md-right">{{ __('Client') }}*</label>
                         <div class="col-md-8">
                           <select class="form-control @error('client_id') is-invalid @enderror" name="client_id">
                             <option value="">--Select--</option>
                             @foreach($clients as $client)
                               <option value="{{ $client->id }}">{{ $client->name }}</option>
                             @endforeach
                           </select>
                           @error('client_id')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}*</label>
                        <div class="col-md-8">
                          <input type="text" id="address-input" name="address" class="form-control map-input @error('address') is-invalid @enderror">
                          <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                          <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                          <div id="address-map-container" style="width:100%;height:400px; ">
                              <div style="width: 100%; height: 100%" id="address-map"></div>
                          </div>
                          @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                       </div>
                    </div>
                     <div class="form-group row">
                         <label for="book_datetime" class="col-md-2 col-form-label text-md-right">{{ __('Booking Date & Time') }}*</label>
                         <div class="input-group date form_datetime col-md-8" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                           <input class="form-control @error('book_datetime') is-invalid @enderror" size="16" type="text" value="" name="book_datetime" readonly>
                           @error('book_datetime')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        					        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                     </div>
                     <div class="form-group row">
                         <label for="meta_title" class="col-md-2 col-form-label text-md-right">{{ __('Product') }}*</label>
                         <div class="col-md-8">
                           <select class="form-control @error('product_id') is-invalid @enderror" name="product_id">
                             <option value="">--Select--</option>
                             @foreach($products as $product)
                               <option value="{{ $product->id }}">{{ $product->name }}</option>
                             @endforeach
                           </select>
                           @error('product_id')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="quantity" class="col-md-2 col-form-label text-md-right">{{ __('Quantity') }}</label>
                         <div class="col-md-8">
                             <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autocomplete="quantity">
                             @error('quantity')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="slug" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                         <div class="col-md-8">
                           <textarea name="description" class="form-control">{{ old('description') }}</textarea>
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
@push('scripts')
 <script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.js') }}"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
 <script src="{{ asset('plugins/locationpicker/map-input.js') }}"></script>
 <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    		autoclose: 1,
    		todayHighlight: 1,
    		startView: 2,
    		forceParse: 0,
        // showMeridian: 1
    });
</script>
@endpush
