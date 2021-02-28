<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width: 30%; ">
  <div class="login-logo">
    <a href="../../index2.html"><b></b>Pondok Kampuh</a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="height: 180px">
    <div class="card-body login-card-body " >
      {{--  <p class="login-box-msg"></p>  --}}
      <p class="text-center">Verification email has been sent to your email</p>
      <p style="font-size: 13px">Please wait 2 minutes if the email has not been sent, please click the button below</p>
      <form action="{{route('verification.send')}}" method="post">
        @method('POST')
        @csrf
        <a class="btn btn-sm btn-success" href="{{route('auth.logout')}}">Login or Register again</a>
        <button id="btnSend" disabled type="submit" class="btn btn-sm btn-primary align-content-center">Send Email Again</button>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>


<script>
  {{--  var enableBtn = function() {
    $('#btnSend').attr("disabled", false);
    }
  $('#btnSend').click(function (){
     var that = this;
      $('#btnSend').attr("disabled", true);
      setTimeout(function() { enableBtn(that) }, 1500);
  });  --}}
  $( document ).ready(function() {
    setTimeout(function(){$('#btnSend').attr('disabled', false)}, 10000)
});
</script>



<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
