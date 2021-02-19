@extends('pondok_kampuh.global')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/checkout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('ui-toko/styles/checkout_responsive.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
      <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                  <div class="home_content text-center">
                        <div class="home_title">Checkout</div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                              <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                    <li><a href="#">Home</a></li>
                                    <li>Checkout</li>
                              </ul>
                        </div>
                  </div>
            </div>
      </div>
      
      <!-- Checkout -->

      <div class="checkout">
            <div class="container">
                  <div class="row">
                        
                        <!-- Billing -->
                        <div class="col-lg-6">
                              <div class="billing">
                                    <div class="checkout_title">Billing</div>
                                    <div class="checkout_form_container">
                                          <form action="#" id="checkout_form" class="checkout_form">
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <!-- Name -->
                                                            <input type="text" id="name" class="checkout_input" placeholder="Nama" required="required" name="name">
                                                      </div>
                                                </div>
                                                <div>
                                                      <!-- Country -->
                                                      <select id="province" class="dropdown_item_select checkout_input" require="required" name="province">
                                                            <option selected>Provinsi</option> 
                                                            @foreach ($province as $provinsi)
                                                                  <option value="{{$provinsi['province_id']}}" id="provinceText{{$provinsi['province_id']}}">{{$provinsi['province']}}</option> 
                                                            @endforeach
                                                      </select>
                                                </div>
                                                <div>
                                                      <!-- destination -->
                                                      <select id="city" class="dropdown_item_select checkout_input" require="required" name="city">
                                                            <option selected>Kota</option>
                                                      </select>
                                                </div>
                                                <div>
                                                      <!-- kurir -->
                                                      <select id="courier" class="dropdown_item_select checkout_input" require="required" name="courier">
                                                            <option value="">Pilih kurir</option>
                                                            <option value="jne">JNE</option>
                                                            <option value="tiki">TIKI</option>
                                                            <option value="pos">POS INDONESIA</option>
                                                      </select>
                                                </div>
                                                <div>
                                                      <!-- service -->
                                                      <select id="service" class="dropdown_item_select checkout_input" require="required" name="service">
                                                            <option value="">Layanan</option>
                                                      </select>
                                                </div>
                                                {{--  <div>
                                                      <!-- Berat -->
                                                      <input type="number" id="weight" class="checkout_input" placeholder="Berat" required="required" name="weight">
                                                </div>  --}}
                                                <div>
                                                      <!-- Country -->
                                                      <textarea class="checkout_input" style="padding: 15px 20px" name="address" id="address" cols="30" rows="10" placeholder="jl.baturaya no 9 desa mengwi"></textarea>
                                                </div>
                                                <div>
                                                      <!-- Zipcode -->
                                                      <input type="text" id="codePos" class="checkout_input" placeholder="Code Pos" required="required">
                                                </div>
                                                <div>
                                                      <!-- Phone no -->
                                                      <input type="number" id="phone" class="checkout_input" placeholder="Phone No." required="required">
                                                </div>
                                                <div>
                                                      <!-- Email -->
                                                      <input type="email" id="email" class="checkout_input" placeholder="Email" required="required">
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>

                        <!-- Cart Total -->
                        <div class="col-lg-6 cart_col">
                              <div class="cart_total">
                                    <div class="cart_extra_content cart_extra_total">
                                          <div class="checkout_title">Cart Total</div>
                                          <ul class="cart_extra_total_list">
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                      <div class="cart_extra_total_title">Subtotal</div>
                                                      <div class="cart_extra_total_value ml-auto">{{rupiah($total)}}</div>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                      <div class="cart_extra_total_title">Shipping</div>
                                                      <div class="cart_extra_total_value ml-auto" id="priceOngkir">RP. 0</div>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                      <div class="cart_extra_total_title">Total</div>
                                                      <div class="cart_extra_total_value ml-auto" id="total">RP. 0</div>
                                                </li>
                                          </ul>
                                          {{--  <div class="payment_options">
                                                <div class="checkout_title">Payment</div>
                                                <ul>
                                                      <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                            <label class="radio_container">
                                                                  <input type="radio" id="radio_1" name="payment_radio" class="payment_radio">
                                                                  <span class="radio_mark"></span>
                                                                  <span class="radio_text">Paypal</span>
                                                            </label>
                                                      </li>
                                                      <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                            <label class="radio_container">
                                                                  <input type="radio" id="radio_2" name="payment_radio" class="payment_radio">
                                                                  <span class="radio_mark"></span>
                                                                  <span class="radio_text">Cash on Delivery</span>
                                                            </label>
                                                      </li>
                                                      <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                            <label class="radio_container">
                                                                  <input type="radio" id="radio_3" name="payment_radio" class="payment_radio" checked>
                                                                  <span class="radio_mark"></span>
                                                                  <span class="radio_text">Credit Card</span>
                                                            </label>
                                                      </li>
                                                </ul>
                                          </div>  --}}
                                          <div class="cart_text">
                                                <p>
                                                      Silahkan anda lanjutkan ke proses pembayarn saudara {{Auth::user()->name}} and semoga hari anda menyenangkan 
                                                </p>
                                          </div>
                                          {{--  <div class="checkout_button" id="checkout" style="font-size: 25px; color: #ffffff;">place order</div>
                                            --}}
                                            <button style="padding: 8px; width: 100%; margin-top: 10px; border-width: 1px; border-radius: 5px; font-size: 30px; border-color: rgb(50, 211, 157); background-color: rgb(50, 211, 157); color: #ffffff; font-weight: bold"  type="submit" id="checkout">Checkout</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
@endsection

@section('footer')
<script>

      {{--  Rupiah  --}}
      function Rupiah (bilangan){
            var	number_string = bilangan.toString(),
            sisa 	= number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);
                  
            if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
            }
            return 'RP. ' + rupiah;
      }
      $(document).ready(function(){

            var ongkir = 0;

            //Token
            $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            //Province
            //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
            //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
            $('select[name="province"]').on('change', function(){
            // kita buat variable provincedid untk menampung data id select province
                  let provinceid = $(this).val();
                  //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
                  if(provinceid){
                  // jika di temukan id nya kita buat eksekusi ajax GET
                        jQuery.ajax({
                        // url yg di root yang kita buat tadi
                              url:"/home/city/"+provinceid,
                              // aksion GET, karena kita mau mengambil data
                              type:'GET',
                              // type data json
                              dataType:'json',
                              // jika data berhasil di dapat maka kita mau apain nih
                              success:function(data){
                                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                                    $('select[name="city"]').empty();
                                    // jika ada kita looping dengan each
                                    $.each(data, function(key, value){
                                    // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah destination
                                          {{-- $('select[name="city"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>'); --}}
                                          $('select[name="city"]').append('<option value =' + value.city_id +' id="cityText'+value.city_id+'" namakota ="' + value.type + ' ' + value.city_name + '">' +value.city_name+'</option>');
                                    });
                              }
                        });
                  }else{
                        $('select[name="destination"]').empty();
                  }
            });
      });

      {{--  Pilih Kurir  --}}
      $('select[name="courier"]').on('change', function(){
            // kita buat variable untuk menampung data data dari  inputan
            // name city_origin di dapat dari input text name city_origin
            let origin = $("select[name=province]").val();
            // name kota_id di dapat dari select text name kota_id
            let city = $("select[name=city]").val();
            // name courier di dapat dari select text name courier
            let courier = $("select[name=courier]").val();
            // name weight di dapat dari select text name weight
            let weight = $("input[name=weight]").val();
            // alert(courier);
            if(courier){
                  jQuery.ajax({
                        url:"/home/ongkir/destination="+city+"&weight="+{{$weight}}+"&courier="+courier,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                              $('select[name="service"]').empty();
                              $('select[name="service"]').append('<option value = "0" >Layanan</option>');
                              $.each(data, function(key, value){
                                    // ini looping data service misal jne reg, jne oke, jne yes
                                    $.each(value.costs, function(key1, value1){
                                    // ini untuk looping cost nya masing masing
                                    // silahkan pelajari cara menampilkan data json agar lebi paham
                                          $.each(value1.cost, function(key2, value2){
                                                $('select[name="service"]').append('<option value="'+ value2.value +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
                                          });
                                    });
                                    console.log(value)
                              });
                        },
                  });
            }else {
                  $('select[name="service"]').empty();
            }
            courier = null;
      });

      //harga ongkir
      $('#service').on('change', function(){
            var ongkir = $('#service').val()
            var total = {{$total}} + parseInt(ongkir)
            $('#priceOngkir').text(Rupiah($('#service').val()))
            $('#total').text(Rupiah(total))
            {{--  console.log(typeof(ongkir))  --}}
      })

      //checkout
      $('#checkout').on('click', function(){
            var name = $('#name').val()
            var province = $('#province').val()
            var provinceText = $('#provinceText' + province).text()
            var city = $('#city').val()
            var cityText = $('#cityText' + city).text()
            var courier = $('#courier').val()
            var service = $('#service').val()
            var address = $('textarea#address').val();
            var codepos = $('#codePos').val()
            var phone = $('#phone').val()
            var email = $('#email').val()
            var priceOngkir = $('select[name="service"]').val()
            var total = $('#total').text()

            if(name != '' && provinceText != '' && cityText != '' && courier != '' && service != '' && address != '' && codepos != '' && phone != ''  && email != '' && priceOngkir != '' ){ 
                  $.ajax({
                        type: "POST",
                        url: '{{route("processCheckout")}}',
                        data: {
                          name : name,
                          province : provinceText,
                          city : cityText,
                          courier : courier,
                          service : service,
                          address : address,
                          codepos : codepos,
                          phone : phone,
                          email : email,
                          priceOngkir : priceOngkir,
                          total : total
                        },
                        success: function(data){
                          alert('Check Out berhasil')
                          url = "{{url('home')}}/";
                          location.href=(url)
                          {{--  <?php redirect('home')->with('success', 'Checkout telah berhasil');?>  --}}
                        }
                  });
             }else{
                  alert('Lengkapi data anda')
            } 
      })
</script>
      <script src="{{asset('ui-toko/js/checkout.js')}}"></script>
@endsection