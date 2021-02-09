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
                        <div class="home_title">Shopping Cart</div>
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

      <div class="cart_section">
            <div class="container">
                  <div class="row">
                        <div class="col">
                              <div class="cart_container">
                                    
                                    <!-- Cart Bar -->
                                    <div class="cart_bar">
                                          <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                                <li class="mr-auto">Product</li>
                                                <li >Size</li>
                                                <li style="width: 200px">Price</li>
                                                <li>Quantity</li>
                                                <li>Total</li>
                                                <li>Remove</li> 
                                          </ul>
                                    </div>

                                    <!-- Cart Items -->
                                    @if ($carts)
                                          <div class="cart_items">
                                                <ul class="cart_items_list">
                                                <!-- Cart Item -->
                                                      <?php $no = 1?>
                                                      @foreach ($carts as $cart)
                                                            <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                                  <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                                        <div><div class="product_number">{{$no}}</div></div>
                                                                        <div><div class="product_image"><img src="{{asset('storage/'.$cart['image'])}}" alt=""></div></div>
                                                                        <div class="product_name_container">
                                                                              <div class="product_name"><a href="product.html">{{$cart['name']}}</a></div>
                                                                              <div class="product_text">Second line for additional info</div>
                                                                        </div>
                                                                  </div>
                                                                  {{--  <div class="product_color product_text"><span>Color: </span>beige</div>  --}}
                                                                  <div class="product_size product_text"><span>Size: </span>
                                                                        <select name="" id="size{{$cart['id']}}" onchange="update({{$cart['id']}})">
                                                                              <?php $stock =null ?>
                                                                              @foreach ($sizes as $size)
                                                                                    @if ($size->product_id == $cart['id'] && $size->stock > 0)
                                                                                          <option value="{{$size}}" id="stockcoba{{$size->id}}" {{$size->id ==$cart['size']? 'selected' : ''}} <?php $stock = $size->stock?>>{{$size->name}}</option>
                                                                                    @endif
                                                                              @endforeach   
                                                                        </select>  
                                                                        </div>
                                                                  <div class="product_price product_text" style="width: 200px; margin-top: auto; margin-bottom: auto" id="price{{$cart['id']}}"><span>Price: </span>{{rupiah($cart['price'])}}</div>
                                                                  <div class="product_quantity_container">
                                                                        <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                                              <span class="product_text product_num" id="quantity{{$cart['id']}}">{{$cart['quantity']}}</span>
                                                                              <div class="qty_sub qty_button trans_200 text-center" onclick="quantity({{$cart['id']}}, 'min', {{$cart['price']}})"><span>-</span></div>
                                                                              <div class="qty_add qty_button trans_200 text-center" onclick="quantity({{$cart['id']}}, 'plush', {{$cart['price']}})"><span>+</span></div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="product_total product_text" id="total{{$cart['id']}}"><span>Total: </span>{{rupiah($cart['priceTotal'])}}</div>
                                                                  <form action="{{route('removeCart', $cart['id'])}}" method="POST">
                                                                              @csrf
                                                                              @method('delete')
                                                                              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                                  </form>
                                                            </li>
                                                            <?php $no++?>
                                                      @endforeach
                                                </ul>
                                          </div>
                                          
                                          <!-- Cart Buttons -->
                                          <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                                     <form action="{{route('removeAllCart')}}" method="post">
                                                           @csrf
                                                           @method('delete')
                                                           <button type="submit" class="btn btn-sm btn-danger " style="font-size: 20px; color: #ffffff; font-weight: bold; text-align: center; align-items:center;">CLEAR ALL</button>
                                                      </form>
                                                      <div class="btn btn-sm btn-success ml-2" style="font-size: 20px; color: #ffffff; font-weight: bold; text-align: center; align-items:center;" onclick="checkout()">CHECKOUT</div>
                                                </div>
                                          </div>
                                    @else
                                          <h1 class="alert-danger">Keranjang Kosong</h1>
                                    @endif
                              </div>
                        </div>
                  </div>
		</div>
      </div>
@endsection
@section('footer')
      <script>
            function Rupiah (bilangan){
                  var	number_string = bilangan.toString(),
                  sisa 	= number_string.length % 3,
                  rupiah = number_string.substr(0, sisa),
                  ribuan = number_string.substr(sisa).match(/\d{3}/g);
                        
                  if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                  }
                  return 'RP. ' + rupiah;
            }

            function quantity(id, operator, price){
                  var qty = parseInt($('#quantity' + id).text());
                  var size = JSON.parse($('#size' + id).val());
                  if(operator == 'min'){
                        if(qty !== 0){
                              qty--;
                        }
                  }else{
                        qty++;
                  }

                  if(size.stock < qty){
                        $('#quantity' + id).text(size.stock-1)
                        qty = size.stock
                  }
                  update(id, qty);
                  $('#total' + id).text(Rupiah(qty * price))
            }

            function update(id, paramsQty=null){
                  var qty = parseInt($('#quantity' + id).text());
                  var size = JSON.parse($('#size' + id).val());
                  if(size.stock < qty){
                        $('#quantity' + id).text(size.stock)
                        qty = size.stock
                  }
                  
                  $.ajax({
                        type:'GET',
                        url: "{{url('home/cart/update')}}",
                        data:'id=' +id + '&qty=' + (paramsQty == null ? qty : paramsQty) + '&idSize=' + size.id,
                        success: function(html) {
                              console.log('Your Product success insert to cart');
                        } 
                  });
            }
            function remove(id){
                  $.ajax({
                        type:'GET',
                        url: "{{url('home/cart/remove')}}",
                        data:'id=' +id ,
                        {{-- success: function(html) {
                              console.log('Your Product success insert to cart');
                        }  --}}
                  });
            }

            function checkout(){
                  url = "{{url('home/checkout')}}/";
                  location.href =  (url); 
            }
      </script>
      <script src="{{asset('ui-toko/js/cart.js')}}"></script>
@endsection