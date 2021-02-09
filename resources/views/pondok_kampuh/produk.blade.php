@extends('pondok_kampuh/global')
@section('head')
	<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/plugins/flexslider/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/product.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/product_responsive.css')}}">
@endsection
@section('content')

	<!-- Home -->
	<div class="home">
		<div class="home_container d-flex flex-column align-items-center justify-content-end">
			<div class="home_content text-center">
				<div class="home_title">Product Page</div>
				{{--  <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
					<ul class="d-flex flex-row align-items-start justify-content-start text-center">
						<li><a href="#">Home</a></li>
						<li><a href="category.html">Woman</a></li>
						<li>New Products</li>
					</ul>
				</div>  --}}
			</div>
		</div>
	</div>

	<!-- Product -->

	<div class="product">
		<div class="container">
			<div class="row">
				
				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="product_image_slider_container">
						<div id="slider" class="flexslider">
							<ul class="slides">
								@foreach ($product->image as $image)
									<li>
										<img src="{{asset('storage/'.$image->name)}}" style="height: 470px"/>
									</li>
								@endforeach
							</ul>
						</div>
						<div class="carousel_container">
							<div id="carousel" class="flexslider">
								<ul class="slides">
									@foreach ($product->image as $image)
										<li style="margin-top: 20px">
											<img src="{{asset('storage/'.$image->name)}}" style="height: 80px;" />
										</li>
									@endforeach
								</ul>
							</div>
							<div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
							<div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>

				<!-- Product Info -->
				<div class="col-lg-6 product_col">
					<div class="product_info">
						<div class="product_name">{{$product->name}}</div>
						<div class="product_category">In <a href="category.html">{{$product->category->name}}</a></div>
						<div class="product_price">{{rupiah($product->price)}}</span></div>
						<div class="product_size">
							<div class="product_size_title">Select Size</div>
							<ul class="d-flex flex-row align-items-start justify-content-start">
								@foreach ($product->size as $id=>$size)
									@if ($size->stock >0)
										<li>
											<input type="radio" id="radio_{{$size->id}}"  name="product_radio" class="regular_radio radio_{{$size->id}}" value="{{$size->id}}"  onclick="sizeMy({{$size->id}})">
											<label for="radio_{{$size->id}}" style="width: auto; padding: 20px">{{$size->name}}</label>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="product_text">
							<p>{{$product->description}}</p>
						</div>
						{{--  onclick="location.href='{{route('addCart', [$product->id])}}'"  --}}
						<div class="product_buttons">
							<div class="text-right d-flex flex-row align-items-start justify-content-start">
								<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" style="width: 75%" onclick="addCart({{$product->id}})">
									<div><div><img src="{{asset('ui-toko/images/cart.svg')}}" class="svg" alt=""><div>+</div></div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	@section('footer')
		<script>
			var idSize = null;
			function sizeMy(id){
				idSize =  $('#radio_' + id).val();
				console.log(idSize);
			}

			function addCart(id){
				url = "{{url('home/cart/add')}}/";
				if(idSize == null){
					alert('pilih size dahulu')
				}else{
					location.href =  (url +  {{$product->id}} + '/size/' + idSize); 
				}
			}
			
		</script>
		<script src="{{asset('ui-toko/plugins/flexslider/jquery.flexslider-min.js')}}"></script>
		<script src="{{asset('ui-toko/js/product.js')}}"></script>
	@endsection
@endsection