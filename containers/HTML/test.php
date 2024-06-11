<?php
Session::not('USER', '/login');
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
	<link rel="shortcut icon" type="image/x-icon" href="containers/assets/images/brand/favicon.ico"/>

	<!-- TITLE -->
	<title>Noa – Тесттілеу</title>

	<!-- BOOTSTRAP CSS -->
	<link id="style" href="containers/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="containers/assets/css/style.css" rel="stylesheet" />
	<link href="containers/assets/css/skin-modes.css" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="containers/assets/css/icons.css" rel="stylesheet" />

</head>

<body class="ltr app sidebar-mini">

	<!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<img src="containers/assets/images/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /GLOBAL-LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">

			<?php require_once "containers/HTML/block/head.php"; ?>

            <?php require_once "containers/HTML/block/sidebar.php"; ?>

			<!--app-content open-->
			<div class="app-content main-content mt-0">
				<div class="side-app">
					 <!-- CONTAINER -->
					 <div class="main-container container-fluid">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-xl-12 col-lg-6">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card overflow-hidden">
											<div class="card-header border-bottom">
												<h4 class="card-title fw-semibold">Тесттілеу порталы</h4>
											</div>
											<iframe class="card-body p-0 customers mt-1" src="https://www.soyle.kz/test/level" style="height: 70vh;">

											</iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- ROW-2 END -->
						

					</div>
				</div>
			</div>
			<!-- CONTAINER END -->
		</div>

		<?php require_once "containers/HTML/block/footer.php"; ?>
	</div>

	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

	<!-- JQUERY JS -->
	<script src="containers/assets/js/jquery.min.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="containers/assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="containers/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- SIDE-MENU JS-->
	<script src="containers/assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- APEXCHART JS -->
	<script src="containers/assets/js/apexcharts.js"></script>

	<!-- INTERNAL SELECT2 JS -->
	<script src="containers/assets/plugins/select2/select2.full.min.js"></script>

	<!-- CHART-CIRCLE JS-->
	<script src="containers/assets/js/circle-progress.min.js"></script>

	<!-- INTERNAL DATA-TABLES JS-->
	<script src="containers/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="containers/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
	<script src="containers/assets/plugins/datatable/dataTables.responsive.min.js"></script>

	<!-- INDEX JS -->
	<script src="containers/assets/js/index1.js"></script>

	<!-- REPLY JS-->
	<script src="containers/assets/js/reply.js"></script>

	<!-- PERFECT SCROLLBAR JS-->
	<script src="containers/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
	<script src="containers/assets/plugins/p-scroll/pscroll.js"></script>

    <!-- STICKY JS -->
    <script src="containers/assets/js/sticky.js"></script>

    <!-- COLOR THEME JS -->
    <script src="containers/assets/js/themeColors.js"></script>

	<!-- CUSTOM JS -->
	<script src="containers/assets/js/custom.js"></script>

</body>

</html>