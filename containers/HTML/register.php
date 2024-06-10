<?php
Session::yes('USER', '/index');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
	$data['name'] 		= $_POST['name'];
	$data['login'] 		= $_POST['email'];
	$data['password'] 	= md5($_POST['pass']);

	DBC::insert('users', $data);
	Router::redirect('/login');
}
?>
<!doctype html>
<html lang="ru" dir="ltr">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Noa – Bootstrap 5 Admin & Dashboard Template">
		<meta name="author" content="ASPC">
		<meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="containers/assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Noa – Тіркелу</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="containers/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="containers/assets/css/style.css" rel="stylesheet"/>
		<link href="containers/assets/css/skin-modes.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="containers/assets/css/icons.css" rel="stylesheet"/>

	</head>

	<body class="ltr login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="containers/assets/images/loader.svg" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div>
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto text-center">
						<a href="index">
							<img src="containers/assets/images/brand/logo.png" class="header-brand-img" alt="">
						</a>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" action="/register" method="post">
									<span class="login100-form-title">
										Тіркелде
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100" type="text" name="name" placeholder="Есіміңіз">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="mdi mdi-account" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100" type="text" name="email" placeholder="Логин">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" name="pass" placeholder="Құпия сөз">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="container-login100-form-btn">
										<button class="login100-form-btn btn-primary">
											Тіркелу
										</button>
									</div>
									<div class="text-center pt-3">
										<p class="text-dark mb-0">Акаунт барма?<a href="login" class="text-primary ms-1">Кіру</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- END PAGE -->

		<!-- JQUERY JS -->
		<script src="containers/assets/js/jquery.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="containers/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="containers/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="containers/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

		<!-- STICKY JS -->
		<script src="containers/assets/js/sticky.js"></script>

		<!-- COLOR THEME JS -->
		<script src="containers/assets/js/themeColors.js"></script>

		<!-- CUSTOM JS -->
		<script src="containers/assets/js/custom.js"></script>

	</body>
</html>
