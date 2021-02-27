@extends('component.global')
@section('title')
     Order
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
                        <h3 class="card-title">DataTable order</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                              <th>No</th>
                              <th>Code</th>
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
                              @if($order->image == null || $order->image == '')
                                    <tr style="background-color: {{$order->notif =='NEW'? 'rgb(89, 175, 255)' : 'white'}}">
                              @elseif(($order->image != null || $order->image != '') && $order->notif == 'NEW')
                                    <tr style="background-color: rgb(0, 255, 200)">
                              @endif
                                    <td>
                                          {{--  @if ($order->notif =="NEW")
                                                <span style="color: red; font-size: 20px">*</span>    
                                          @endif  --}}
                                          {{$no}}
                                    </td>
                                    <td>{{$order->code}}</td>
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
                                          <form action="{{route('order.destroy', $order->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#modal-update{{$order->id}}" onclick="notif({{$order->id}})" >Edit</button>
                                                <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modal-view{{$order->id}}" onclick="notif({{$order->id}})" >View</button>
                                                <button type="button" class="btn {{$order->image == null || $order->image =='' ? 'btn-dark' : 'btn-info'}} btn-sm " {{$order->image == null || $order->image =='' ? 'disabled' : ''}} style="color: #ffffff" data-bs-toggle="modal" data-bs-target="#modal-view{{$order->id}}" onclick="notif({{$order->id}})" >Bukti</button>
                                                <button type="submit"  onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">Delete</button>
                                           </form>
                                    </td>
                              </tr>
                              <?php $no++ ?>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                              <th>No</th>
                              <th>Code</th>
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
      @foreach ($orders as $order)
      <div class="modal fade" id="modal-view{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                              <button type="button" class="btn-close reloadPage" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div class="row">
                                    <div class="col-12">
                                          <div class="card">
                                                <div class="card-header">
                                                <h3 class="card-title">Responsive Hover Table</h3>
                                    
                                                {{--  <div class="card-tools">
                                                      <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                          
                                                            <div class="input-group-append">
                                                                   @if (<span style="color: red; font-size: 20px">*</span>)
                                                                  <button type="submit" class="btn btn-default">
                                                                        <i class="fas fa-search"></i>
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </div>  --}}
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0">
                                                      <table class="table table-hover text-nowrap">
                                                            <thead>
                                                                  <tr>
                                                                        <th>No</th>
                                                                        <th>Name</th>
                                                                        <th>Image</th>
                                                                        <th>Category</th>
                                                                        <th>Quantity</th>
                                                                        <th>Weight</th>
                                                                        <th>Price</th>
                                                                        <th>Total</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  <?php $no = 1?>
                                                                 @foreach ($order->orderDetail as $item)
                                                                        <tr>
                                                                              <td>{{$no}} </td>
                                                                              <td>{{$item->name}}</td>
                                                                              <td><img src="{{asset('storage/'.$item->image[0]->name)}} " alt="" style="width: 50px; height: 50px"></td>
                                                                              <td>{{$item->category->name}}</td>
                                                                              <td>{{$item->pivot->quantity}}</td>
                                                                              <td>{{$item->weight}}</td>
                                                                              <td>{{rupiah($item->price)}}</td>
                                                                              <td>{{rupiah($item->price * $item->pivot->quantity)}}</td>
                                                                              
                                                                        </tr>
                                                                        <?php $no++?>
                                                                 @endforeach
                                                            </tbody>
                                                      </table>
                                                </div>
                                          <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                    </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary reloadPage" data-bs-dismiss="modal">Close</button>
                              {{--  <button type="submit" class="btn btn-primary">Save changes</button>  --}}
                        </div>
                  </form>
                  </div>
            </div>
      </div>
      @endforeach


      {{--  modal update  --}}
      @foreach ($orders as $order)
      <div class="modal fade" id="modal-update{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                              <button type="button" class="btn-close reloadPage" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('statusOrder', $order->id)}}" method="post">
                              @csrf
                              @method('POST')
                              <div class="modal-body">
                                    <div class="col-sm-12">
                                          <!-- select -->
                                                <div class="form-group">
                                                      <label>Select Status</label>
                                                      <select class="form-control" name="status">
                                                            <option value="PENDING" {{$order->status == 'PENDING' ? 'selected' : ''}}><span class="badge badge-warning">PENDING</span></option>
                                                            <option value="PROCESS" {{$order->status == 'PROCESS' ? 'selected' : ''}}><span class="badge badge-primary">PROCESS</span></option>
                                                            <option value="SUCCESS" {{$order->status == 'SUCCESS' ? 'selected' : ''}}><span class="badge badge-success">SUCCESS</span></option>
                                                      </select>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary reloadPage" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-secondary reloadPage btn-success">Update</button>
                                    {{--  <button type="submit" class="btn btn-primary">Save changes</button>  --}}
                              </div>
                        </form>
                  </form>
                  </div>
            </div>
      </div>
      @endforeach

      <script>
            $('.reloadPage').on('click', function() {
                  location.reload()
            })

            function notif(id){
                  $.ajax({
                        type: "GET",
                        url: 'notif-order/' + id,
                        success: function(data){
                              console.log(data)
                        }
                  });
            }
      </script>
@endsection

