<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> School Information System </title>
	<link rel="apple-touch-icon" sizes="60x60" href="assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/prism.min.css">
	<link rel="stylesheet" href="assets/vendors/js/sweetalert2/package/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="assets/css/app.css">

	<style>
		body{
			background-image: linear-gradient(to right, #2980B9, #6DD5FA, #FFFFFF)
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a href="" class="navbar-brand"> SIS </a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a href="javascript:void(0)" class="nav-link">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('/book') ?>" class="nav-link">About </a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
					<div class="dropdown-menu" style="width: 100px !important">
						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-user"></i>&nbsp; Login</a>
					</div>
				</li>
			</ul>
		</div>

	</nav>

	<div class="container-fluid" style="min-height: 100vh;">
		<div style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
			<img src="assets/img/logos/sis.png" alt="Responsive Image" class="rounded" style="width: 30%;">
		</div>
	</div>

	<div class="modal fade" id="modalLogin" data-backdrop="static" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"> Login </h3>
					<button class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form id="frm-login">
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label col-sm-2"> NIK </label>
							<div class="col-sm-12">
								<input type="text" name="txtinput[70]" class="form-control" id="txt70" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-form-label col-sm-2"> Password </label>
							<div class="col-sm-12">
								<input type="password" name="txtinput[71]" class="form-control" id="txt71" required>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" aria-hidden="true" data-dismiss="modal"> Close </button>
						<button class="btn btn-primary" id="btn_modal_save" type="submit"> Login </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
	<script src="assets/vendors/js/sweetalert2/package/dist/sweetalert2.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="assets/vendors/js/moment.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/fullcalendar.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/jquery.validate.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="assets/js/customizer.js" type="text/javascript"></script>
    <script>
    	$(document).ready(function(){
    		$('#btn_modal_save').click(function(e){
    			$('#frm-login').validate({
    				onfocusout: function(element){
    					$(element).valid();
    				},
    				submitHandler: function(){
    					e.preventDefault();
    					$.ajax({
    						url: "<?= site_url('login/ajx_check') ?>",
    						type: 'POST',
    						dataType: 'JSON',
    						data: $('#frm-login').serialize(),
    						success: function(data){
    							if(data[1][1] == 'ok'){
									Swal.fire({
										icon: 'success',
										title: data[1][0]
									}).then((result) => {
										location.replace('admin/desktop');
									});
								}else{
									Swal.fire({
										icon: 'warning',
										title: data[1][0]
									});
								}
    						}, error: function(){
								Swal.fire({
									icon: 'error',
									title: 'Error when try connect to server'
								});
							}
    					});
    				}
    			});
    		});
    	});
    </script>
</body>
</html>