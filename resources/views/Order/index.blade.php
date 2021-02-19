@extends('component.global');
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
                        <h3 class="card-title">DataTable order</h3>
                        <button style="float: right" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-create">Add Category</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                              <th>No</th>
                              <th>Nama Customers</th>
                              <th>Destination</th>
                              <th>Jasa</th>
                              <th>Ongkir</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>  
                              <?php $no =1?>
                        @foreach ($orders as $order)
                              <tr>
                                    <td>{{$no}}</td>
                                    <td>
                                       {{$order->name}}
                                    </td>
                                    <td>
                                       {{$order->destination}}
                                    </td>
                                    <td>{{$order->courier}}</td>
                                    <td>{{rupiah($order->service)}}</td>
                                    <td>
                                          @if ($order->status == 'PENDING')
                                                <span class="badge badge-warning">{{$order->status}}</span>
                                          @elseif ($order->status == 'PROCESS')
                                                <span class="badge badge-success">{{$order->status}}</span>
                                          @elseif ($order->status == 'SUCCESS')
                                                <span class="badge badge-primary">{{$order->status}}</span>
                                          @endif

                                    </td>
                                    <td>
                                         {{rupiah($order->total)}}
                                    </td>
                                    <td>
                                          {{--  <form action="{{route('order.destroy', $order->id)}}" method="post">
                                                @csrf
                                                @method('delete')  --}}
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-xl">View</button>
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-update">Edit</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                           {{--  </form>  --}}
                                    </td>
                              </tr>
                              <?php $no++ ?>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                              <th>No</th>
                              <th>Nama Customers</th>
                              <th>Destination</th>
                              <th>Jasa</th>
                              <th>Ongkir</th>
                              <th>Status</th>
                              <th>Total</th>
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
<!-- Modal -->
<!-- Modal View -->
<div class="modal fade" id="modal-xl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="card" style="width: 100%;">
            {{--  <img class="card-img-top" src="..." alt="Card image cap">  --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>          
            </div>
            <div class="card-body">
              <h5 class="card-title"></h5>
              {{--  <p class="card-text">Description <br></p>  --}}
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Description <br></li>
              <li class="list-group-item">Price </li>
              <li class="list-group-item">
              </li>
            </ul>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection