@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     Category
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
                        <button style="float: right" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-create">Add Bank</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Owner</th>
                              <th>Account number</th>
                              <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>  
                        @foreach ($banks as $index=>$bank)
                              <?php $index++;?>
                              <tr>
                                    <td>{{$index}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->owner}}</td>
                                    <td>{{$bank->account_number}}</td>
                                    <td>
                                          <form action="{{route('bank.destroy', $bank->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-update{{$bank->id}}">Edit</button>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">Delete</button>
                                           </form>
                                    </td>
                              </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Owner</th>
                              <th>Account number</th>
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
                              <h5 class="modal-title" id="exampleModalLabel">Add Bank</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{route('bank.store')}}">
                              @csrf
                              <div class="modal-body">
                                    <div class="form-floating mb-3">
                                          <input type="text" class="form-control" id="floatingInput" placeholder="Name Bank" name="name">
                                          <label for="floatingInput">Name Bank</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                          <input type="text" class="form-control" id="floatingInput" placeholder="Name Bank" name="owner">
                                          <label for="floatingInput">Owner Bank</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                          <input type="number" class="form-control" id="floatingInput" placeholder="Name Bank" name="account_number">
                                          <label for="floatingInput">Account Number</label>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                              </div>
                        </form>
                  </div>
            </div>
      </div>

<!-- Modal Edit-->
      @foreach ($banks as $bank)
            <div class="modal fade" id="modal-update{{$bank->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                        <div class="modal-content">
                              <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Bank</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="{{route('bank.update', $bank->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                          <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Name Bank" value="{{$bank->name}}" name="name">
                                                <label for="floatingInput">Name Bank</label>
                                          </div>
                                          <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Owner" value="{{$bank->owner}}" name="owner">
                                                <label for="floatingInput">Owner</label>
                                          </div>
                                          <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Account Number" value="{{$bank->account_number}}" name="account_number">
                                                <label for="floatingInput">Account Number</label>
                                          </div>
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      @endforeach
@endsection