@extends('pondok_kampuh/global')
@section('head')
      <link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/cart.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/cart_responsive.css')}}">
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
                        <div class="home_title">History Order</div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                              <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                    <li><a href="#">Home</a></li>
                                    <li>Your Cart</li>
                              </ul>
                        </div>
                  </div>
            </div>
      </div>
      
      <!-- Cart -->

      @foreach ($orders as $order)
            <div class="col-12 my-3">
                  <div class="container">
                        <div class="cart_extra">
                              <div class="cart_extra_content cart_extra_total">
                                    <div class="cart_extra_title">Code <span class="badge badge-success">{{$order->code}}</span></div>
                                    <ul class="cart_extra_total_list">
                                          @foreach ($order->orderDetail as $item)
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                      <div class="cart_extra_total_title mr-2"><img src="{{asset('storage/'.$item->image[0]->name)}} " style="width: 70px; height: 70px;" alt=""></div>
                                                      <div class="cart_extra_total_value">
                                                            {{$item->name}}
                                                            <p>qty : {{$item->pivot->quantity}}</p>
                                                      </div>
                                                </li>
                                          @endforeach
                                          <li class="d-flex flex-row align-items-center justify-content-start">
                                                @if ($order->status == 'SUCCESS')
                                                      <div class="cart_extra_total_title mr-2"><span class="badge badge-primary" style="color: #ffffff">{{$order->status}}</span></div>
                                                @elseif($order->status == 'PROCESS')
                                                      <div class="cart_extra_total_title mr-2"><span class="badge badge-success" style="color: #ffffff">{{$order->status}}</span></div>
                                                @elseif($order->status == 'PENDING')
                                                      <div class="cart_extra_total_title mr-2"><span class="badge badge-warning" style="color: #ffffff">{{$order->status}}</span></div>
                                                @endif
                                                <div class="cart_extra_total_value">{{ strtoupper($order->courier)}}</div>
                                          </li>
                                          <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="cart_extra_total_title mr-2" style="font-size: 13px">Total</div>
                                                <div class="cart_extra_total_value" style="font-size: 14px">{{rupiah($order->total)}}</div>
                                          </li>
                                    </ul>
                                    <div class="checkout_button trans_200"><a href="#" data-toggle="modal" data-target="#modalUpload{{$order->id}}">Upload File</a></div>
                              </div>
                        </div>
                  </div>
            </div>
      @endforeach
@endsection

@section('footer')
@foreach ($orders as $order)
<div class="modal fade" id="modalUpload{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title align-items-center" id="exampleModalLabel">Code Order <span class="badge badge-info">{{$order->code}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <form action="{{route('buktiTransfer', $order->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                              <div class="form-group">
                                    <label for="exampleFormControlFile1">Pilih Butkti Transfer</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Upload Bukti</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endforeach
<script src="{{asset('ui-toko/js/checkout.js')}}"></script>
@endsection
