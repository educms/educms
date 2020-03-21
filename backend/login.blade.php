@if(session('user_id'))
      <script>window.location.href = "{{ url('mypanel') }}";</script>
@else
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>EDUCMS - LOGIN</title>
	<!-- meta start -->
	<meta name="description" content="cms education">
	<meta name="keywords"
		content="cms, education">
	<meta name="author" content="Orapakat Dev" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- meta end -->

	<!-- Favicon -->
	<!-- <link rel="icon" type="image/png" href="{{ $backend_asset }}login/images/icons/favicon tuban.ico') }}" /> -->
	<!-- favicon end -->

	<!-- CSS star -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ $backend_asset }}login/css/main.css">
	<!--===============================================================================================-->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ $backend_asset }}plugins/toastr/toastr.min.css">
  <script src="{{ $backend_asset }}plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="{{ $backend_asset }}plugins/toastr/toastr.min.js"></script>
  <!-- CSS end -->
</head>

<body style="color:#bbdefb;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic" data-tilt>
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="carousel-item active">
								<h3><b>Buat Website</b> lebih mudah</h3>
								<p>Membuat website resmi pendidikan baik sekolah maupun kampus akan lebih mudah.</p>
							</div>
							<div class="carousel-item">
								<h3><b>Sistem Informasi Sekolah</b></h3>
								<p>EDUCMS ini dilengkapi dengan Sistem Informasi Sekolah, untuk mengelola semua terkait informasi sekolah.</p>
							</div>
						</div>
					</div>

				</div>
        @if(session('status'))
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
          });
          Toast.fire({
            type: 'warning',
            title: '{{ session("status") }}'
          })
        </script>
        @endif
				<form class="login100-form validate-form" action="{{ url('mypanel/auth/act') }}" method="post" autocomplete="off">
					<span class="login100-form-title">
						<img src="{{ $backend_asset }}images/educms.png" alt="Terima surat">
					</span>
          			{{ csrf_field() }}
					<div class="wrap-input100 validate-input" data-validate="Username tidak valid">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Format password tidak valid">
						<input class="input100" type="password" name="password" placeholder="Password" id="password-field">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<span toggle="#password-field" class="text-dark float-right text-sm"><small>Lihat Password <i toggle="#password-field" class="fa fa-fw fa-eye-slash toggle-password"></i></small></span>
						<input type="hidden" name="tahun" value="2020tte">
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							LOGIN
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="{{ $backend_asset }}login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{ $backend_asset }}login/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ $backend_asset }}login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{ $backend_asset }}login/js/main.js"></script>

	<script type="text/javascript">
      $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye-slash fa-eye");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    </script>

</body>

</html>
@endif
