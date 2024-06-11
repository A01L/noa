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
	<title>Noa – Басты бет</title>

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
						<!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">Басты бет</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Мәзір</a></li>
									<li class="breadcrumb-item active" aria-current="page">Басты бет</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 -->
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-body">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold"><?=DBC::count('words', ['status'=>1])+DBC::count('video', ['status'=>1])?></h3>
												<p class="text-muted fs-13 mb-0">Алаңдағы статистикам</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class='fa fa-long-arrow-up'></i>
														<?=100-(DBC::count('words', ['status'=>1])+DBC::count('video', ['status'=>1]))?>%</span>
													коэфицент барлық уақытта
												</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"/></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-body">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold"><?=DBC::count('words', ['uid'=>$_SESSION['USER']['id']])+DBC::count('video', ['uid'=>$_SESSION['USER']['id']])?></h3>
												<p class="text-muted fs-13 mb-0">Менің статистикам</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class='fa fa-long-arrow-up'></i>
														<?=100-(DBC::count('words', ['uid'=>$_SESSION['USER']['id']])+DBC::count('video', ['uid'=>$_SESSION['USER']['id']]))?>%</span>
													Коэфицент барлық кезде
												</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-info dash ms-auto box-shadow-info">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M7.5,12C7.223877,12,7,12.223877,7,12.5v5.0005493C7.0001831,17.7765503,7.223999,18.0001831,7.5,18h0.0006104C7.7765503,17.9998169,8.0001831,17.776001,8,17.5v-5C8,12.223877,7.776123,12,7.5,12z M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v14c0.0018311,1.6561279,1.3438721,2.9981689,3,3h14c1.6561279-0.0018311,2.9981689-1.3438721,3-3V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z M21,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H5c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h14c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z M12,6c-0.276123,0-0.5,0.223877-0.5,0.5v11.0005493C11.5001831,17.7765503,11.723999,18.0001831,12,18h0.0006104c0.2759399-0.0001831,0.4995728-0.223999,0.4993896-0.5v-11C12.5,6.223877,12.276123,6,12,6z M16.5,10c-0.276123,0-0.5,0.223877-0.5,0.5v7.0005493C16.0001831,17.7765503,16.223999,18.0001831,16.5,18h0.0006104C16.7765503,17.9998169,17.0001831,17.776001,17,17.5v-7C17,10.223877,16.776123,10,16.5,10z"/></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- ROW-1 END-->

						<!-- ROW-2 -->
						<div class="row">
							<div class="col-sm-12 col-md-12 col-xl-12 col-lg-6">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card overflow-hidden">
											<div class="card-header border-bottom">
												<h4 class="card-title fw-semibold">Соңғы алаңдағы әрекетім</h4>
											</div>
											<div class="card-body p-0 customers mt-1">
												<div class="list-group py-1">
													<?php
													$result = DBC::select('words', ['uid'=>$_SESSION['USER']['id']]);

													foreach ($result as $row) {
													?>
													<a href="javascript:void(0);" class="border-0">
														<div class="list-group-item border-0">
															<div class="media mt-0 align-items-center">
																<div class="transaction-icon"><i class="fe fe-chevrons-right"></i>
																</div>
																<div class="media-body">
																	<div class="d-flex align-items-center">
																		<div class="mt-0">
																			<h5 class="mb-1 fs-13 fw-normal text-dark">Сөздік: <span class="fs-13 fw-semibold ms-1">'<?=$row['word']?>' аудармасы '<?=$row['kz']?>'</span></h5>
																		</div>
																		<span class="ms-auto fs-13">
																			<span class="float-end text-dark">Орталық сөздікте</span>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</a>
													<?php
													}

													$result = DBC::select('video', ['uid'=>$_SESSION['USER']['id']]);

													foreach ($result as $row) {
													?>
													<a href="<?=$row['url']?>" target="_blank" class="border-0">
														<div class="list-group-item border-0">
															<div class="media mt-0 align-items-center">
																<div class="transaction-icon"><i class="fe fe-chevrons-right"></i>
																</div>
																<div class="media-body">
																	<div class="d-flex align-items-center">
																		<div class="mt-0">
																			<h5 class="mb-1 fs-13 fw-normal text-dark">Бейне сабақ: <span class="fs-13 fw-semibold ms-1"><?=$row['url']?></span></h5>
																		</div>
																		<span class="ms-auto fs-13">
																			<span class="float-end text-dark">Орталық порталда</span>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</a>
													<?php
													}

													$result = DBC::select('lessons', ['uid'=>$_SESSION['USER']['id']]);

													foreach ($result as $row) {
													?>
													<a href="tab?id=<?=$row['id']?>" target="_blank" class="border-0">
														<div class="list-group-item border-0">
															<div class="media mt-0 align-items-center">
																<div class="transaction-icon"><i class="fe fe-chevrons-right"></i>
																</div>
																<div class="media-body">
																	<div class="d-flex align-items-center">
																		<div class="mt-0">
																			<h5 class="mb-1 fs-13 fw-normal text-dark">Жаңа сабақ: <span class="fs-13 fw-semibold ms-1"><?=$row['title']?></span></h5>
																		</div>
																		<span class="ms-auto fs-13">
																			<span class="float-end text-dark">Орталық порталда</span>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</a>
													<?php
													}
													?>
												</div>
											</div>
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