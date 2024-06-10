<?php
Session::not('USER', '/login');

if(isset($_POST['word']) && isset($_POST['kz'])){
	$data['uid'] 	= $_SESSION['USER']['id'];
	$data['word'] 	= $_POST['word'];
	$data['kz'] 	= $_POST['kz'];
	$data['status'] = 1;

	DBC::insert('words', $data);
	Router::redirect('/words');
}
elseif(isset($_GET['dell'])){
	DBC::delete('words', ['id'=>$_GET['dell']]);
	Router::redirect('/words');
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
	<link rel="shortcut icon" type="image/x-icon" href="containers/assets/images/brand/favicon.ico"/>

	<!-- TITLE -->
	<title>Noa – Сабақтар</title>

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
								<h1 class="page-title">Сөздік</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Білім ордасы</a></li>
									<li class="breadcrumb-item active" aria-current="page">Сөздік</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 -->
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
								<div class="card" style="height: 70vh; overflow-y: scroll;">
									<div class="card-body">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold"><?=DBC::count('words', ['status'=>1])?></h3>
												<p class="text-muted fs-13 mb-0">Ортақ сөздік</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
													<i class="fa fa-users" style="color: white;"></i>
                                                </div>
											</div>
										</div>
                                        <hr>

                                        <?php
                                        $result = DBC::show('words');

                                        foreach($result as $row){
                                            ?>
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="mb-2 fw-semibold"><?=$row['word']?> <i class="fa fa-chevron-right"></i> <?=$row['kz']?></h4>
                                                </div>
                                            </div>
                                        <hr>    
                                            <?
                                        }
                                        ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
								<div class="card" style="height: 70vh; overflow-y: scroll;">
									<div class="card-body">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold"><?=DBC::count('words', ['uid'=>$_SESSION['USER']['id']])?></h3>
												<p class="text-muted fs-13 mb-0">Жеке сөздік</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-info dash ms-auto box-shadow-info">
													<i class="fa fa-user" style="color: white;"></i>
                                                </div>
											</div>
										</div>

										<p class="text-muted">Сөздікке өз біліміңді қоста баршаға комектес!</p>
													<form class="form-horizontal" action="/words" method="post">
														<div class="form-group">
															<input type="text" name="word" class="form-control" id="inputName" placeholder="Өзге сөз">
														</div>
														<div class="form-group">
															<input type="text" name="kz" class="form-control" id="inputEmail2" placeholder="Аударма">
														</div>
														<div class="form-group mt-3">
															<div>
																<button class="btn btn-primary">Сөздікке қосу</button>
															</div>
														</div>
													</form>

										<hr>

                                        <?php
                                        $result = DBC::select('words', ['uid'=>$_SESSION['USER']['id']]);

                                        foreach($result as $row){
                                            ?>
                                            <div class="row">
                                                <div class="col">
												 <h4 class="mb-2 fw-semibold"><a href="words?dell=<?=$row['id']?>" style="padding-right: 20px;"><i class="fa fa-close"></i> </a>  <?=$row['word']?> <i class="fa fa-chevron-right"></i> <?=$row['kz']?></h4>
                                                </div>
                                            </div>
                                        <hr>    
                                            <?
                                        }
                                        ?>

									</div>
								</div>
							</div>
						</div>
						<!-- ROW-1 END-->

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