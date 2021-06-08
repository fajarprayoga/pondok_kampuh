@extends('pondok_kampuh/global')
@section('content')

      <style>
            @media screen and (max-width : 415px){
                  .home-responsive : {
                        align-items: center;
                        justify-content: center ;     
                        background-size: 75% 50%;
                  }
                  .gambar-responsive {
                        display: none;
                  }
                  .home {
                        height : 50vh;
                  }
                  .product_price {
                        font-size: 5vw;
                  }
            }
      </style>
      <!-- Home -->
      <div class="home">
            <div class="col-12" style="padding:10px">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{$message}}</strong>
                  </div>
                  @endif
            </div>
            {{--  {{dd($countOrder[0]->id)}}  --}}
            {{--  <?php $countOrderNew = 0?>
            @foreach ($countOrder as $item)
                @if($item->users_id === Auth::user()->id)
                  <?php$countOrderNew ++?>
                @endif
            @endforeach  --}}

            <!-- Home Slider -->
            <div class="home_slider_container ">
                  <div class="owl-carousel owl-theme home_slider">
                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg')}})"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                          <div class="col fill_height">
                                                <div class="home_container d-flex flex-column align-items-center justify-content-start ">
                                                      <div class="home_content ">
                                                            <div class="home_title">{{$toko->name}}</div>
                                                            <div class="home_subtitle" style="font-weight: bold">Hi, {{ucfirst(Auth::user()->name)}}!</div>
                                                            <div class="home_items">
                                                                  <div class="row">
                                                                        <div class="col-sm-3 offset-lg-1">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_7.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0 gambar-responsive" >
                                                                              <div class="product home_item_large">
                                                                                    <div class="product_image"><img src="{{asset('ui-toko/images/home_6.jpg')}}" alt=""></div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/product_2.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>	
                        </div>
                  </div>
            </div>
      </div>

      <div class="products">
            <div class="container">
                  <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                              <div class="section_title text-center">{{$toko->name}}</div>
                        </div>
                  </div>
                  <div class="row page_nav_row">
                        <div class="col">
                              <div class="page_nav text-center">
                                 <h3 style="color: black">Our Products</h3>
                              </div>
                        </div>
                  </div>
                  <div class="row products_row">
                        
                        <!-- Product -->
                       @foreach ($products as $product)
                        <div class="col-xl-4 col-md-6">
                              <div class="product">
                                    <div class="product_image"><img src="{{asset('storage/'.$product->image[0]->name)}}" alt="" style="height: 300px;width: 100%"></div>
                                    <div class="product_content">
                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                <div>
                                                      <div>
                                                            <div class="product_name">{{$product->name}}</div>
                                                            <div class="product_category"> {{$product->category->name}}</div>
                                                      </div>
                                                </div>
                                                <div class="ml-auto text-right">
                                                      <div class="product_price text-right" >{{rupiah($product->price)}}</span></div>
                                                </div>
                                          </div>
                                          <div class="product_buttons text-center">
                                                <a type="button" href="{{route('produk', [$product->slug])}}" class="btn btn-outline-success btn-lg" style="width: 80%">Lihat Produk</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                       @endforeach
                  </div>
                  <div class="d-flex justify-content-center">
                        {{$products->links('pagination::bootstrap-4')}}
                  </div>
            </div>
      </div>

      {{--  <!-- Features -->

      <div class="features">
            <div class="container">
                  <div class="row align-content-center justify-content-center">
                        <a class="btn btn-outline-dark" style="width : 40%; height: 70px; font-size: 30px; border-radius: 10px; text-align: center; margin: auto" href="{{route('produk')}}">Cek Produk Kita</a>
                  </div>
            </div>
      </div>  --}}
@endsection
@section('footer')
      <script src="{{asset('ui-toko/js/custom.js')}}"></script>
@endsection