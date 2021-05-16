@extends('pondok_kampuh/global')
@section('head')
      <link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/cart.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/cart_responsive.css')}}">

      <style>
            .bank-detail {
                  padding: 20px;
                  color: black;
                  box-shadow : 0 0 3px #ccc;
            }
      </style>
@endsection
@section('content')
      <div class="row" style="padding:10px">
            @if ($message = Session::get('success'))
                  <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{$message}}</strong>
                  </div>
            @endif
      </div>
      <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                  <div class="home_content text-center">
                        <div class="home_title">Info Bank</div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                              {{--  <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                    <li><a href="#">Home</a></li>
                                    <li>Your Cart</li>
                              </ul>  --}}
                        </div>
                  </div>
            </div>
      </div>
      
      <!-- Cart -->

      <div class="cart_section">
            <div class="container">
                  <div class="row">
                        <div class="col">
                              <div class="cart_container">
                                    <div class="" style="box-shadow : 0 0 3px #ccc;">
                                         @foreach ($banks as $bank)
                                          <div class="bank-detail">
                                                <h4>Bank : {{$bank->name}}</h4>
                                                <h4>Owner : {{$bank->owner}}</h4>
                                                <h4>Account number : {{$bank->account_number}}</h4>
                                          </div>
                                         @endforeach
                                    </div>
                              </div>
                        </div>
                  </div>
		</div>
      </div>
@endsection
@section('footer')
      
      <script src="{{asset('ui-toko/js/cart.js')}}"></script>
@endsection