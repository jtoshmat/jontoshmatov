<head>
	<meta charset="utf-8">
	<meta name="description" content="app,software responsive site template" />
	<meta name="keywords" content="app,software,ipad,iphone,marketing,responsive,business,marketing,corporate"/>
	<meta name="author" content="Tansh" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<title>A Zend Certified Engineer</title>

	<!--Fav and touch icons-->
	<link rel="shortcut icon" href="{{$template}}/img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="{{$template}}/img/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{{$template}}/img/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{{$template}}/img/icons/apple-touch-icon-114x114.png">

	<!--google web font-->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>

	<!--basic style sheets-->
	<link rel="stylesheet" media="screen" href="{{URL::to($template."/css/bootstrap.css")}}"/>
	<link rel="stylesheet" media="screen" href="{{$template}}/css/bootstrap-responsive.css"/>
	<link rel="stylesheet" media="screen" href="{{$template}}/css/style.css"/>

	<!--main jquery libraries / others are at the bottom-->
	<script src="{{$template}}/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="{{$template}}/js/modernizr.js" type="text/javascript"></script>

	<!--elastislide carousel script starts-->
	<link rel="stylesheet" media="screen" href="{{$template}}/css/elastislide.css"/>
	<script type="text/javascript" src="{{$template}}/js/jquery.elastislide.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#mycarousel').elastislide({
				imageW		: 280,	// the images width
				margin		: 20,	// image margin right
				border		: 10	// image border
			});
		});
	</script>
	<!--elastislide carousel script ends-->

	<!--flexslider scripts starts-->
	<link rel="stylesheet" media="screen" href="{{$template}}/css/flexslider.css"/>
	<script src="{{$template}}/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
//Image Slider
			$('.image-text-slider').flexslider({
				animation: "slide",
				slideshowSpeed: 4000,
				animationDuration: 600,
				controlNav: false,
				keyboardNav: true,
				directionNav: true,
				pauseOnHover: true,
				pauseOnAction: true,
			});
		});
	</script>
	<!--flexslider scripts ends-->

</head>
<!-- header starts
================================================== -->
<section id="header" class="clearfix">

	<!--header-inner starts-->
	<div id="header-inner" class="container">
		<div class="row">
			<!--logo starts-->
			<div class="span4 logo"><a href="#"><img src="{{$template}}/img/logo.png" width="128" height="28"
													 alt="logo"></a></div>
			<!--logo ends-->
			<!--menu starts-->
			@include('partials.navigation')
			<!--menu ends-->
		</div>
	</div>
	<!--header-inner ends-->

	<!--header-btm starts-->
	<div id="header-btm">
		<div class="container">
			<div class="row">
				<div class="span12"> <img src="{{$template}}/img/icons/icon-phone.png" alt="icon">
					<p>Call for support / (563) 451-6893</p>
					<ul>
						<li><img src="{{$template}}/img/icons/icon-facebook.png" alt="icon">
							<p> <a href="#">Facebook</a></p>
						</li>
						<li><img src="{{$template}}/img/icons/icon-user.png" alt="icon">
							<p> <a href="#myModal" role="button" data-toggle="modal">Login</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--header-btm ends-->

</section>
<!-- header ends
================================================== -->