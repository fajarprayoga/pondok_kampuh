@extends('pondok_kampuh/global')
@section('content')
      <!-- Home -->

      <div class="home">
            <!-- Home Slider -->
            <div class="home_slider_container">
                  <div class="owl-carousel owl-theme home_slider">
                        
                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg')}})"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                          <div class="col fill_height">
                                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                                      <div class="home_content">
                                                            <div class="home_title">Pondok Kampuh</div>
                                                            <div class="home_subtitle">New Arrival</div>
                                                            <div class="home_items">
                                                                  <div class="row">
                                                                        <div class="col-sm-3 offset-lg-1">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_1.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                                              <div class="product home_item_large">
                                                                                    <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                                          <div>
                                                                                                <div>from</div>
                                                                                                <div>$3<span>.99</span></div>
                                                                                          </div>
                                                                                    </div>
                                                                                    <div class="product_image"><img src="{{asset('ui-toko/images/home_2.jpg')}}" alt=""></div>
                                                                                    <div class="product_content">
                                                                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                                                <div>
                                                                                                      <div>
                                                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                                <div class="ml-auto text-right">
                                                                                                      <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                                                      <div class="product_price text-right">$3<span>.99</span></div>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="product_buttons">
                                                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                                                      <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/heart.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                      <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/cart_2.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_3.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>	
                        </div>

                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg')}})"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                          <div class="col fill_height">
                                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                                      <div class="home_content">
                                                            <div class="home_title">Pondok Kampuh</div>
                                                            <div class="home_subtitle">New Arrival</div>
                                                            <div class="home_items">
                                                                  <div class="row">
                                                                        <div class="col-sm-3 offset-lg-1">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_1.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                                              <div class="product home_item_large">
                                                                                    <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                                          <div>
                                                                                                <div>from</div>
                                                                                                <div>$3<span>.99</span></div>
                                                                                          </div>
                                                                                    </div>
                                                                                    <div class="product_image"><img src="{{asset('ui-toko/images/product_1.jpg')}}" alt=""></div>
                                                                                    <div class="product_content">
                                                                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                                                <div>
                                                                                                      <div>
                                                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                                <div class="ml-auto text-right">
                                                                                                      <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                                                      <div class="product_price text-right">$3<span>.99</span></div>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="product_buttons">
                                                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                                                      <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/heart.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                      <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/cart_2.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_3.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>	
                        </div>

                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg')}})"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                          <div class="col fill_height">
                                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                                      <div class="home_content">
                                                            <div class="home_title">Pondok Kampuh</div>
                                                            <div class="home_subtitle">New Arrival</div>
                                                            <div class="home_items">
                                                                  <div class="row">
                                                                        <div class="col-sm-3 offset-lg-1">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_1.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                                              <div class="product home_item_large">
                                                                                    <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                                          <div>
                                                                                                <div>from</div>
                                                                                                <div>$3<span>.99</span></div>
                                                                                          </div>
                                                                                    </div>
                                                                                    <div class="product_image"><img src="{{asset('ui-toko/images/product_2.jpg')}}" alt=""></div>
                                                                                    <div class="product_content">
                                                                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                                                <div>
                                                                                                      <div>
                                                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                                <div class="ml-auto text-right">
                                                                                                      <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                                                      <div class="product_price text-right">$3<span>.99</span></div>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="product_buttons">
                                                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                                                      <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/heart.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                      <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/cart_2.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_3.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>	
                        </div>

                        <!-- Slide -->
                        <div class="owl-item">
                              <div class="background_image" style="background-image:url({{asset('ui-toko/images/home.jpg)')}}"></div>
                              <div class="container fill_height">
                                    <div class="row fill_height">
                                          <div class="col fill_height">
                                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                                      <div class="home_content">
                                                            <div class="home_title">Premium Items</div>
                                                            <div class="home_subtitle">Summer Wear</div>
                                                            <div class="home_items">
                                                                  <div class="row">
                                                                        <div class="col-sm-3 offset-lg-1">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_1.jpg')}}" alt=""></a></div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                                              <div class="product home_item_large">
                                                                                    <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                                          <div>
                                                                                                <div>from</div>
                                                                                                <div>$3<span>.99</span></div>
                                                                                          </div>
                                                                                    </div>
                                                                                    <div class="product_image"><img src="{{asset('ui-toko/images/product_3.jpg')}}" alt=""></div>
                                                                                    <div class="product_content">
                                                                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                                                <div>
                                                                                                      <div>
                                                                                                            <div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
                                                                                                            <div class="product_category">In <a href="category.html">Category</a></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                                <div class="ml-auto text-right">
                                                                                                      <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                                                      <div class="product_price text-right">$3<span>.99</span></div>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="product_buttons">
                                                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                                                      <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/heart.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                      <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                                                            <div><div><img src="{{asset('ui-toko/images/cart_2.svg')}}" alt=""><div>+</div></div></div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                              <div class="home_item_side"><a href="product.html"><img src="{{asset('ui-toko/images/home_3.jpg')}}" alt=""></a></div>
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
                  <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                  <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

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
                                 <h3 style="color: black">Produk Kita</h3>
                              </div>
                        </div>
                  </div>
                  <div class="row products_row">
                        
                        <!-- Product -->
                       @foreach ($products as $product)
                        <div class="col-xl-4 col-md-6">
                              <div class="product">
                                    <div class="product_image"><img src="{{asset('storage/'.$product->image[0]->name)}}" alt="" style="height: 400px;width: 350px"></div>
                                    <div class="product_content">
                                          <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                <div>
                                                      <div>
                                                            <div class="product_name"><a href="product.html">{{$product->name}}</a></div>
                                                            <div class="product_category">In <a href="category.html">{{$product->category->name}}</a></div>
                                                      </div>
                                                </div>
                                                <div class="ml-auto text-right">
                                                      {{--  <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>  --}}
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