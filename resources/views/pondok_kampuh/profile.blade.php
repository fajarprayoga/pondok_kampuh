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
				<div class="home_title">Profile Page</div>
			</div>
		</div>
	</div>

      {{--  Profile  --}}
            <div class="product">
                  <div class="container">
                        <div class="row"
                              <!-- Product Info -->
                              <div class="col-lg-12">
                                    <div class="row justify-content-center">
                                          <div class="card align-items-center" style="width: 80%;">
                                                @if ($message = Session::get('success'))
                                                      <div class="alert alert-success alert-block col-12">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                                            <strong>{{$message}}</strong>
                                                      </div>
                                                @elseif($message = Session::get('error'))
                                                      <div class="alert alert-danger alert-block col-12">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                                            <strong>{{$message}}</strong>
                                                      </div>
                                                @endif
                                                @if (count($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <p class="login-box-msg">
                                                      <div class="alert alert-danger alert-block">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>    
                                                        <strong class="text-center">{{ $error }}</strong>
                                                      </div>
                                                    </p>
                                                    @endforeach
                                                @endif
                                                <img src="{{asset('ui-toko/images/home.jpg')}}" class="card-img-top mt-2" style="border-radius: 100%; height: 150px; width: 150px;" alt="...">
                                                <div class="card-body col-11">
                                                      <form action="{{route('profile.update', Auth::user()->id)}}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                  <label>Name</label>
                                                                  <input type="text" class="form-control" style="color: black"  placeholder="Update name" value="{{Auth::user()->name}}" name="name">
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="exampleInputEmail1">Email address</label>
                                                                  <input type="email" class="form-control" style="color: black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update email" value="{{Auth::user()->email}}" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="exampleFormControlTextarea1">Address</label>
                                                                  <textarea class="form-control" style="color: black" id="exampleFormControlTextarea1" rows="3" name="address">{{Auth::user()->address}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label>Phone</label>
                                                                  <input type="number" class="form-control" style="color: black" aria-describedby="emailHelp" placeholder="Update phone" value="{{Auth::user()->phone}}" name="phone">
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="exampleInputPassword1">Password</label>
                                                                  <input type="password" class="form-control" style="color: black" id="exampleInputPassword1" placeholder="Password" name="password">
                                                            </div>
                                                            <div class="form-group">
                                                                  <label for="exampleInputPassword1">Password</label>
                                                                  <input type="password" class="form-control" style="color: black" id="exampleInputPassword1" placeholder="Confrim Password" name="confirm_password">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <a class="btn btn-danger"  href="{{route('auth.logout')}}" style="color: white" onclick="return confirm('Logout Sekarang?')">Logout</a>
                                                      </form>
                                                </div>
                                           </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      {{--  batas profile  --}}

	<!-- Footer -->

@endsection