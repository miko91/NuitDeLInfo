<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/img/favicon.png">

	<title><?php echo isset($title) ? $title : "";?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/js/jquery.gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" href="/fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link href="/css/style.css" rel="stylesheet" />	

</head>

<body class="texture">
	<!--=== Content ===-->
	<?php echo $content; ?>
	<!--=== End Content ===-->
	
	<script src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/behaviour/general.js"></script>
	<script type="text/javascript" src="/js/admin.js"></script>
	<script type="text/javascript" src="/js/jquery.gritter/js/jquery.gritter.js"></script>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	 <script src="/js/bootstrap/dist/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="/js/jquery.flot/jquery.flot.js"></script>
	 <script type="text/javascript" src="/js/jquery.flot/jquery.flot.pie.js"></script>
	 <script type="text/javascript" src="/js/jquery.flot/jquery.flot.resize.js"></script>
	 <script type="text/javascript" src="/js/jquery.flot/jquery.flot.labels.js"></script>
	 
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
