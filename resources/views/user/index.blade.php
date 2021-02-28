@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     User
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
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Roles</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>  
                    <?php $no = 1?>   
                    @foreach ($users as $user)
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->address}}</td>
                          <td>{{$user->phone}}</td>
                          <td>
                            @if ($user->roles == 'ADMIN')
                            <span class="badge badge-success">{{$user->roles}}</span>
                            @else
                              <span class="badge badge-primary">{{$user->roles}}</span>
                            @endif
                          </td>
                          <td>
                            @if ($user->status == 'ACTIVE')
                            <span class="badge badge-success">{{$user->status}}</span>
                            @else
                              <span class="badge badge-danger">{{$user->status}}</span>
                            @endif
                          </td>
                          <td>
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-modal{{$user->id}}">Edit</button>
                              {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="">View</button> --}}
                              <button type="submit" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">Delete</button>
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
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Roles</th>
                      <th>Status</th>
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
@foreach ($users as $user)
<!-- Modal Edit -->
  <div class="modal fade" id="edit-modal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('user.update', $user->id)}}" method="post">
          @method("PUT")
          @csrf
          <div class="modal-body">
            <label for="exampleInputEmail1">Roles</label>
            <select class="form-select form-floating mb-3" aria-label="Default select example" name="roles">
              <option value="ADMIN" {{$user->roles === 'ADMIN' ? 'selected' : ''}}><span class="badge badge-success">ADMIN</span></option>
              <option value="CUSTOMER" {{$user->roles === 'CUSTOMER' ? 'selected' : ''}}><span class="badge badge-danger">CUSTOMER</span></option>
            </select>
            <label for="exampleInputEmail1">Status</label>
            <select class="form-select form-floating mb-3" aria-label="Default select example" name="status">
              <option value="ACTIVE" {{$user->status === 'ACTIVE' ? 'selected' : ''}}><span class="badge badge-success">ACTIVE</span></option>
              <option value="NONACTIVE" {{$user->status === 'NONACTIVE' ? 'selected' : ''}}><span class="badge badge-danger">NONACTIVE</span></option>
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
@endsection