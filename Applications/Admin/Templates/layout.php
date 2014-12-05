<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/img/favicona.png">

	<title><?php echo isset($title) ? $title : "";?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
  

	<!-- Bootstrap core CSS -->
	<link href="/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="/fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/js/jquery.gritter/css/jquery.gritter.css" />

	<link rel="stylesheet" type="text/css" href="/js/jquery.nanoscroller/nanoscroller.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="/js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="/js/bootstrap.slider/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="/js/intro.js/introjs.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
	<link rel="stylesheet" type="text/css" href="/js/jquery.niftymodals/css/component.css" />
	<!-- Custom styles for this template -->
	<link href="/css/style.css" rel="stylesheet" />
	<link href="/css/admin.css" rel="stylesheet" />

</head>
<body>
	<div id="page">
		<!-- Fixed navbar -->
		<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-gear"></span>
					</button>
					<a class="navbar-brand" href="/admin"><span>CALM</span></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="/" target="blank">
								Voir le site
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right user-nav">
						<li class="dropdown profile_menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span>Denis</span> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="/admin/logout">Déconnexion</a></li>
							</ul>
						</li>
					</ul>

				</div><!--/.nav-collapse animate-collapse -->
			</div>
		</div>

		<div id="cl-wrapper" class="fixed-menu">
			<div class="cl-sidebar" data-position="right" data-step="1" data-intro="<strong>Fixed Sidebar</strong> <br/> It adjust to your needs." >
				<div class="cl-toggle"><i class="fa fa-bars"></i></div>
				<div class="cl-navblock">
					<div class="menu-space">
						<div class="content">
							<ul class="cl-vnavigation">
								<li>
									<a href="/admin/">
										<i class="fa fa-home"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-globe"></i>
										<span>Locations</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="/admin/country">
												Country
											</a>
										</li>
										<li>
											<a href="/admin/zone">
												Zone
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="/admin/crisis">
										<i class="fa fa-bug"></i>
										<span>Crisis</span>
									</a>
								</li>
								<li>
									<a href="/admin/refuge">
										<i class="fa fa-home"></i>
										<span>Refuge</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-group"></i>
										<span>Users</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="/admin/administrator">
												Administrator
											</a>
										</li>
										<li>
											<a href="/admin/manager">
												Manager
											</a>
										</li>
										<li>
											<a href="/admin/refugee">
												Refugee
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="/admin/configuration">
										<i class="fa fa-gear"></i>
										<span>Configuration</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="text-right collapse-button" style="padding:7px 9px;">
						<button id="sidebar-collapse" class="btn btn-default" style="">
							<i style="color:#fff;" class="fa fa-angle-left"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="container-fluid" id="pcont">
				<!--=== Content ===-->
				<?php echo $content; ?>
				<!--=== End Content ===-->
			</div>
		</div>
	</div>	

	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery.gritter/js/jquery.gritter.js"></script>

	<script type="text/javascript" src="/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script src="/js/ckeditor/ckeditor.js"></script>
	<script src="/js/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript" src="/js/behaviour/general.js"></script>
	<script src="/js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="/js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/js/jquery.select2/select2.min.js" type="text/javascript"></script>
	<script src="/js/skycons/skycons.js" type="text/javascript"></script>
	<script src="/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script src="/js/intro.js/intro.js" type="text/javascript"></script>
	<script src="/js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.datatables/jquery.datatables.min.js"></script>
	<script type="text/javascript" src="/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
	<script type="text/javascript" src="/js/jquery.niftymodals/js/jquery.modalEffects.js"></script> 
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
	$(document).ready(function(){
		//initialize the javascript
		App.init();       
		App.masks();
		App.dataTables();
		App.textEditor();
		$('.md-modal').modalEffects();
	});
	</script>
	<script src="/js/behaviour/voice-commands.js"></script>
	<script src="/js/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/jquery.flot/jquery.flot.js"></script>
	<script type="text/javascript" src="/js/jquery.flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="/js/jquery.flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="/js/jquery.flot/jquery.flot.labels.js"></script>
	<script type="text/javascript" src="/js/admin.js"></script>

	<!--=== JavaScript insert code ===-->
	<?php
	if (isset($js)) {
		foreach ($js as $javascript) {
			echo $javascript;
		}
	}
	if ($user->hasFlash()) echo $user->getFlash();?>
	<!--===  End JavaScript insert code ===-->
</body>
</html>	