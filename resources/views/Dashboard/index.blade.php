@extends('component.global')
@section('name')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('title')
     Dashboard
@endsection

@section('content')
  @csrf
   <div class="row">
     {{--  <div class="p-1 mb-2">
      <div class="col-4">
        <select class="custom-select">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
     </div>  --}}
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$data['order']}}</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$data['product']}}</h3>

            <p>Product</p>
          </div>
          <div class="icon">
            <i class="fas fa-box-open"></i>
          </div>
          <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$data['user']}}</h3>

            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      {{-- <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Category</p>
          </div>
          <div class="icon">
            <i class="fas fa-stream"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}
      <!-- ./col -->
    </div>

    
    <div class="row">
      <!-- Left col -->
      {{--  Diagaram BAtang  --}}
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Stock Product</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Name</th>
                  <th>Stock</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['stock'] as $index => $item)
                <tr>
                  <td>{{$index + 1}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->stock}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->



      {{--  DIagaram DOnuts  --}}
      <section class="col-lg-6 connectedSortable">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Donut Chart</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
      </section>
      <!-- right col -->
    </div>
@endsection

@section('footer')
<!-- ChartJS -->
  {{--  <script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>  --}}

 <script>
  $(document).ready(function() {
    var name = [];
    var jumlah = [];
    var _token = $('input[name=_token]').val()
      $.ajax({
            type: "POST",
            url: '{{route("dashboard.grafik")}}',
            data: {_token : _token},
            success: function(data){
             $.each(data['donut'], function(k, value){
              name.push(value['name'])
              jumlah.push(value['quantity'])
              console.log(jumlah)
             });

             var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
             var donutData= {
               labels: name,
               datasets: [
                 {
                   data: jumlah,
                   backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                 }
               ]
             }
             var donutOptions     = {
               maintainAspectRatio : false,
               responsive : true,
             }
             //Create pie or douhnut chart
             // You can switch between pie and douhnut using the method below.
             var donutChart = new Chart(donutChartCanvas, {
               type: 'doughnut',
               data: donutData,
               options: donutOptions
             })


            }
      });

  });

 </script>
@endsection