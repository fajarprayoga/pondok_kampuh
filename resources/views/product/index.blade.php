@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     Dashboard Product
@endsection
@section('content')
      <div class="row" style="padding:10px">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
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
            <div class="col-12">      
                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable Product</h3>
                        <button style="float: right" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-modal">Add Product</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>     
                          <?php $no =1?>
                          @foreach ($products as $product)
                          <tr>
                            <td>{{$no}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                              @if ($product->status == 'ACTIVE')
                                <span class="badge badge-success">{{$product->status}}</span>
                              @else
                                <span class="badge badge-danger">{{$product->status}}</span>
                              @endif
                            </td>
                            <td>
                              <form action="{{route('product.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-modal{{$product->id}}">Edit</button>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view-modal{{$product->id}}">View</button>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php $no++?>
                          @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Option</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
      </div>
@endsection

@section('footer')
<!-- Modal Add -->
  <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="Name Product" name="name">
              <label for="floatingInput">Name</label>
            </div>
            <select class="form-select form-floating mb-3" aria-label="Default select example" name="category">
              <option selected >Category</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" placeholder="Price Product" name="price">
              <label for="floatingInput">Price</label>
            </div>
            {{--  <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" placeholder="Stock Product" name="stock">
              <label for="floatingInput">Stock</label>
            </div>  --}}
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" placeholder="Satuan Gram" name="weight">
              <label for="floatingInput">Weight (gram)</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
              <label for="floatingTextarea2">Comments</label>
            </div>
            <div class="form-floating mb-3">
              <div class="form-group">
                <label for="exampleFormControlFile1">Add Images</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple name="image[]">
              </div>
            </div>
            <div class="floating-form mb-3">
              <label for="floatingInput">Size</label>
              <div class="card-body">
                <div class="row text-center">
                  <div class="col-2">
                    <label for="floatingInput">S</label>
                    <input type="text" class="form-control text-center" value="0" name="S">
                  </div>
                  <div class="col-2">
                    <label for="floatingInput">M</label>
                    <input type="text" class="form-control text-center"  value="0" name="M">
                  </div>
                  <div class="col-2">
                    <label for="floatingInput">L</label>
                    <input type="text" class="form-control text-center"  value="0" name="L">
                  </div>
                  <div class="col-2">
                    <label for="floatingInput">XL</label>
                    <input type="text" class="form-control text-center"  value="0" name="XL">
                  </div>
                  <div class="col-3">
                    <label for="floatingInput">All Size</label>
                    <input type="text" class="form-control text-center"  value="0" name="AllSize">
                  </div>
                </div>
              </div>
            </div>
            <select class="form-select form-floating mb-3" aria-label="Default select example" name="status">
              <option selected value="">Status</option>
              <option value="ACTIVE">Active</option>
              <option value="NONACTIVE">NonActive</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  {{-- modal add batas --}}

  @foreach ($products as $product)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit-modal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name Product" name="name" value="{{$product->name}}">
                <label for="floatingInput">Name</label>
              </div>
              <select class="form-select form-floating mb-3" aria-label="Default select example" name="category" value="{{$product->name}}">
                @foreach ($categories as $category)
                  <option value="{{$category->id}} {{$category->id === $product->category_id ? 'selected' : ''}}">{{$category->name}}</option>
                @endforeach
              </select>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Price Product" name="price" value="{{$product->price}}">
                <label for="floatingInput">Price</label>
              </div>
              {{--  <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Stock Product" name="stock" value="{{$product->stock}}">
                <label for="floatingInput">Stock</label>
              </div>  --}}
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Satuan Gram" name="weight" value="{{$product->weight}}">
                <label for="floatingInput">Weight (gram)</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description" >{{$product->description}}</textarea>
                <label for="floatingTextarea2">Comments</label>
              </div>
              <div class="form-floating mb-3">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Add Images</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple name="image[]">
                </div>
              </div>
              <div class="floating-form mb-3">
                <label for="floatingInput">Size</label>
                <div class="card-body">
                  <div class="row text-center">
                    @foreach ($product->size as $size)
                    <div class="col-2">
                      <label for="floatingInput">{{$size->name}}</label>
                      <input type="text" class="form-control text-center" placeholder="0" value="{{$size->stock}}" name="{{$size->name}}">
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <select class="form-select form-floating mb-3" aria-label="Default select example" name="status">
                <option value="ACTIVE" {{$product->status === 'ACTIVE' ? 'selected' : ''}}><span class="badge badge-success">ACTIVE</span></option>
                <option value="NONACTIVE" {{$product->status === 'NONACTIVE' ? 'selected' : ''}}><span class="badge badge-danger">NONACTIVE</span></option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  @endforeach
  {{-- modal edit batas --}}

  @foreach ($products as $product)
    <!-- Modal View -->
    <div class="modal fade" id="view-modal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <div class="card" style="width: 100%;">
                {{--  <img class="card-img-top" src="..." alt="Card image cap">  --}}
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  @if (count($product->image) ==1 )
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" width="50px" height="250px" src="{{asset('storage/'.$product->image[0]->name)}}" alt="First slide">
                      </div> 
                    </div>  
                    @else
                    <div class="carousel-inner">
                      @foreach ($product->image as $image)
                      <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                        <img class="d-block w-100" width="50px" height="250px" src="{{asset('storage/'.$image->name)}} " alt="First slide">
                      </div>
                      @endforeach
                    </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>            
                    @endif
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  {{--  <p class="card-text">Description <br>{{$product->description}}</p>  --}}
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Description <br>{{$product->description}}</li>
                  <li class="list-group-item">Price {{$product->price}}</li>
                  <li class="list-group-item">
                    @foreach ($product->size as $size)
                      <span class="badge badge-dark">{{$size->name}} <span class="badge badge-primary">{{$size->stock}}</span></span>
                    @endforeach
                  </li>
                  <li class="list-group-item">Stock {{$product->stock}}</li>
                  <li class="list-group-item">Weight {{$product->weight}}</li>
                </ul>
                <div class="card-body">
                  @if ($product->status == 'ACTIVE')
                    <span class="badge badge-success">{{$product->status}}</span>
                  @else
                    <span class="badge badge-danger">{{$product->status}}</span>
                  @endif
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  {{-- modal view batas --}}
@endsection