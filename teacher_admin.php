<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher - Dashboard</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Teacher_</span>Admin</a>
				<a class="navbar-brand" href="index.php"><span>home</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Teacher_admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear">
										<use xlink:href="#stroked-gear"></use>
									</svg> Settings</a></li>
							<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
								<li><a href="logout.php"><svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg> Logout</a></li>
							<?php else: ?>
								<li><a href="login.php"><svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg> Logout</a></li>
							<?php endif; ?>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="#"><svg class="glyph stroked pencil">
						<use xlink:href="#stroked-pencil"></use>
					</svg> View Course</a></li>
			<li><a href="#"><svg class="glyph stroked trash">
						<use xlink:href="#stroked-trash"></use>
					</svg> Edit Course Info</a></li>
			<li><a href="#"><svg class="glyph stroked-calendar">
						<use xlink:href="#stroked-calendar"></use>
					</svg> View Class Schedule</a></li>
			<li><a href="#"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-calendar"></use>
					</svg> Edit Class Schedule</a></li>
			<li><a href="#"><svg class="glyph stroked app-window">
						<use xlink:href="#stroked-app-window"></use>
					</svg> View Student Info</a></li>
			<li class="parent ">
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag">
								<use xlink:href="#stroked-bag"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">Students</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message">
								<use xlink:href="#stroked-empty-message"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">Active Students</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-app-window-with-content"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Views</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


	</div><!--/.col-->
	</div><!--/.row-->
	</div> <!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({});

		! function($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function() {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function() {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>