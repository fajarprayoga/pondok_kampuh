@extends('pondok_kampuh/global')
@section('content')
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
            <!-- Home Slider -->
            <div class="home_slider_container">
                  <div class="owl-carousel owl-theme home_slider">
                        
                        

                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg')}})"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                        <div style="display: flex; width: 100%; align-items: center; justify-content: center;">
                                            <div style="background-color: rgba(0, 0, 0, 0.685); padding: 5px">
                                                <p style="font-weight: bold; color: white; font-size: 5vmax">{{$toko->name}}</p>
                                                {{-- <p></p> --}}
                                            </div>
                                        </div>
                                    </div>
                              </div>	
                        </div>
                  </div>
                  {{-- <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                  <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div> --}}

                  <!-- Home Slider Dots -->
                  
                  <div class="home_slider_dots_container">
                        <div class="container">
                              <div class="row">
                                    <div class="col">
                                          <div class="home_slider_dots">
                                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
                                                      <li class="home_slider_custom_dot active">01</li>
                                                      <li class="home_slider_custom_dot">02</li>
                                                      <li class="home_slider_custom_dot">03</li>
                                                      <li class="home_slider_custom_dot">04</li>
                                                </ul>
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
                              <div class="section_title text-center">Pondok Kampuh</div>
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
                                    <div class="product_image"><img src="{{asset('storage/'.$product->image[0]->name)}}" alt="" style="height: 400px;width: 100%"></div>
                                    <div class="product_content">
                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                <div>
                                                      <div>
                                                            <div class="product_name">{{$product->name}}</div>
                                                            <div class="product_category"> {{$product->category->name}}</div>
                                                      </div>
                                                </div>
                                                <div class="ml-auto text-right">
                                                      <div class="product_price text-right">{{rupiah($product->price)}}</span></div>
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