<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
  
  <!-- Select2 -->
  {{-- <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script> --}}
    <style>

    *{
      font-size:13px;
      font-family: 'CustomFont';
    }
    .select2-container--default .select2-selection--single {
            width: 244.167px;
        }

        .tr-lokasi{
            background-
            color:white;
            font-size: 15px;
            text-align: center;
        }
        .tr-kategori{
            background-color: #fdcb6e;
            color:black;
            font-size: 15px;
            text-align: center;
        }

        .thead-dark{
            background-color: #b2bec3;
            color: black;
        }
        .table {
        border-collapse: collapse;
        }

        .table, .th, .td {
        border: 1px solid black;
        font-size: 11px;
        }
        .tr{
          border:1px solid #000000;
        }
    </style>
</head>
<body>
    
      <div style="text-align: center;">
        <u><span style="font-size:19px; font-family: 'CustomFontBold';">Report Order</span></u><br>
        
      </div>
      <br>
      <br>
      <table>
        
        {{--  <tr>
          <td>Tanggal </td>
          <td>: {{date('d/m/Y', strtotime($from))}} - {{date('d/m/Y', strtotime($to))}}</td>
        </tr>  --}}
        
        
      </table>
      <table  class="table"style="width: 100%; border:1px solid #000000;">
        <tr class="tr">
          <td class="th" width="50px" style="text-align: center; font-family: 'CustomFontBold';">No</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Code</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Customers Name</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Destination</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Delivery Cost</td>
          <td class="th" style="text-align: center; font-family: 'CustomFontBold';" width="100px">Status</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Tanggal</td>
          <td class="th" width="100px" style="text-align: center; font-family: 'CustomFontBold';">Total</td>
        </tr>
          <?php $no = 1; $total=0?>
          
          @foreach($orders as $value)
            {{--  @php
                $total += $value->nominal;
            @endphp  --}}
              <tr class="tr" style=border:1px solid #000000;">
                  <td class="td" style="text-align: center;">
                      {{$no}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{$value->code}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{--  {{date('d-m-Y', strtotime($value->pengeluaran->tanggal))}}  --}}
                    {{$value->email}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{$value->destination}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{$value->courier}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{$value->status}}
                  </td>
                  <td class="td" style="text-align: center;">
                    {{--  {{number_format($value->nominal , 0, ',', '.')}}
                      --}}
                      {{date('d-m-Y', strtotime($value->created_at))}}
                  </td>
                  <td class="td" style="text-align: right;">
                    {{rupiah($value->total)}}
                  </td>
              </tr>
              <?php $no++?>
          @endforeach
          {{--  <tr class="tr" style=border:1px solid #000000;">
            <td class="td" style="text-align: right;" colspan="7">
              <b>Total</b>
            </td>
            <td class="td" style="text-align: right;">
              <b>{{number_format($total , 0, ',', '.')}}</b>
            </td>
        </tr>  --}}
          
        
       
      </table>
      <br>
      <br>
      <br>
      <br>
      <br>
   
</body>
</html>