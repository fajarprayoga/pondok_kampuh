@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     Dashboard Category
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
                        <h3 class="card-title">DataTable Category</h3>
                        <button style="float: right" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-create">Add Category</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>  
                              <?php $no =1?>
                        @foreach ($categories as $category)
                              <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                          <form action="{{route('category.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-update{{$category->id}}">Edit</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                           </form>
                                    </td>
                              </tr>
                              <?php $no++ ?>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Slug</th>
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
<!-- Modal Create-->
      <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="modal-body">
                              <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Baju Adat" name="name">
                                    <label for="floatingInput">Name Category</label>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>

<!-- Modal Edit-->
      @foreach ($categories as $category)
            <div class="modal fade" id="modal-update{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{route('category.update',$category->id )}}">
                              @method('PUT')
                              @csrf
                              <div class="modal-body">
                                    <div class="form-floating mb-3">
                                          <input type="text" class="form-control" id="floatingInput" value="{{$category->name}}" name="name">
                                          <label for="floatingInput">Name Category</label>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                              </div>
                        </form>
                  </div>
            </div>
      @endforeach
@endsection