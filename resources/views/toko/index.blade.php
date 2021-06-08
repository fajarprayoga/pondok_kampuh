@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     Marketplace {{$toko->name}}
@endsection
@section('content')
      <div class="row" style="padding:10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{$message}}</strong>
            </div>
        @elseif ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{$message}}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $error }}</strong>
            </div>
          @endforeach
        @endif
      </div>
      <div class="row">
            <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                        <div class="card-header">
                              <h3 class="card-title">{{$toko->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('toko.update')}}" method="post" enctype="multipart/form-data">
                              @method('PUT')
                              @csrf
                              <div class="card-body">
                                    <div class="form-group">
                                          <label >Name Toko</label>
                                          <input type="text" class="form-control" placeholder="Your Name Toko" value="{{$toko->name}}" name="name">
                                    </div>
                                    <div class="form-group">
                                          <img src="{{asset('storage/'. $toko->logo)}}" style="width: 100px; height: 100px;" alt=""><br>
                                          <label for="exampleInputFile">Logo</label>
                                          <div class="input-group">
                                                <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label>Location</label>
                                          <textarea class="form-control" rows="3" placeholder="Enter your address ..." name="address">{{$toko->address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                          <label >Facebook</label>
                                          <input type="text" class="form-control" placeholder="Facebook" value="{{$toko->facebook}}" name="facebook">
                                    </div>
                                    <div class="form-group">
                                          <label >Instagram</label>
                                          <input type="text" class="form-control" placeholder="Instagram" value="{{$toko->instagram}}" name="instagram">
                                    </div>
                                    <div class="form-group">
                                          <label >Twitter</label>
                                          <input type="text" class="form-control" placeholder="Twitter" value="{{$toko->twitter}}" name="twitter">
                                    </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
                  </div>
                  <!-- /.card -->
            </div>
      </div>
@endsection

@section('footer')

  {{-- modal view batas --}}
@endsection