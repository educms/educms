@if(!session('user_id'))
  <script>window.location.href = "{{ url('mypanel/auth/login') }}";</script>
@else
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Backend Educms | @yield('titles')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="{{ $backend_asset }}images/favicon.png') }}">

  <!-- jQuery -->
  <script src="{{ $backend_asset }}plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ $backend_asset }}plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ $backend_asset }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ $backend_asset }}dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/summernote/summernote-bs4.css">

  <link rel="stylesheet" href="{{ $backend_asset }}plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <script src="{{ $backend_asset }}plugins/datatables/jquery.dataTables.js"></script>
  <script src="{{ $backend_asset }}plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  
  <script src="{{ $backend_asset }}plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="{{ $backend_asset }}plugins/toastr/toastr.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="{{ $backend_asset }}dist/css/bootstrap-datepicker.css" />
  <script src="{{ $backend_asset }}dist/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/summernote/summernote-bs4.css">
  <!-- daterangepicker -->
  <script src="{{ $backend_asset }}plugins/moment/moment.min.js"></script>
  <script src="{{ $backend_asset }}plugins/daterangepicker/daterangepicker.js"></script>
  <script src="{{ $backend_asset }}plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Select2 -->
  <script src="{{ $backend_asset }}plugins/select2/js/select2.full.min.js"></script>
  <style>
    .dataTables_processing {
      background:transparent;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-indigo navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" onclick="confirm_logout()" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> SignOut
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend::partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 EDUCMS {{ FunctionStatic::versi_app() }}</strong>
    <div class="float-right d-none d-sm-inline-block">
      <a href="https://orapakat.com" target="_blank">Orpakat Dev</a>
    </div>
  </footer>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="{{ $backend_asset }}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ $backend_asset }}plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ $backend_asset }}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Summernote -->
<script src="{{ $backend_asset }}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ $backend_asset }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ $backend_asset }}dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ $backend_asset }}dist/js/demo.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ $backend_asset }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- InputMask -->
<script src="{{ $backend_asset }}plugins/moment/moment.min.js"></script>
<script src="{{ $backend_asset }}plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="{{ $backend_asset }}plugins/daterangepicker/daterangepicker.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ $backend_asset }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
      height: 250
    });
  })
</script>
<script language="javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  //Initialize Select2 Elements
  $('.select2dt1').select2({
    theme: 'bootstrap4'
  })
  $('.select2dt2').select2({
    theme: 'bootstrap4'
  })
  $('.select2dt3').select2({
    theme: 'bootstrap4'
  })
  $('.select2dt4').select2({
    theme: 'bootstrap4'
  })
  $('.select2dt5').select2({
    theme: 'bootstrap4'
  })

  function confirm_logout(){
    Swal.fire({
      title: 'Keluar Aplikasi',
      text: "Anda yakin akan keluar dari aplikasi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Keluar!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
          window.location.href = "{{ url('mypanel/auth/logout') }}";
      }
    })
  }
  
  function confirm_lockscreen(){
    Swal.fire({
      title: 'Tutup Layar Aplikasi',
      text: "Anda yakin akan menutup sementara layar aplikasi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Tutup!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
          window.location.href = "{{ url('mypanel/lockscreen/close') }}";
      }
    })
  }

  function confirm_delete(txt,url){
    Swal.fire({
      title: 'Hapus Data',
      text: txt,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
          window.location.href = "{{ url('/') }}/"+url;
      }
    })
  }

  $(function () {
    // Summernote
    $('.setting1').summernote()
    $('.setting2').summernote()
  })

  $('#dtpicker1').daterangepicker({
    locale: {
      format: 'YYYY-MM-DD',
      separator: ' sampai dengan '
    }
  })
  $(function () {
    // INITIALIZE DATEPICKER PLUGIN
    $('.startdate').datepicker({
        todayBtn:  1,
        autoclose: true,
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('.enddate').datepicker('setStartDate', minDate);
    });

    $(".enddate").datepicker({
      format: 'yyyy-mm-dd'
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('.startdate').datepicker('setEndDate', minDate);
    });

    $('.date1').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
    $('.date2').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
    $('.date3').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
    $('.date4').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
    $('.date5').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
    $('.date6').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd",
        todayHighlight:'TRUE',
        autoclose: true,
    });
  });
</script>
</body>
</html>
@endif