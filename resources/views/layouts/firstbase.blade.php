<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('assets/css/color-01.css')}}">
	@livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								</li>
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype === "ADM")
											
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
													</li>
													<li class="menu-item">
														<a title="Categories" href="{{route('admin.category')}}">Categories</a>
													</li>
													<li class="menu-item">
														<a title="products" href="{{route('admin.products')}}">All Products</a>
													</li>
													<li class="menu-item">
															<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
														</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}"> 
														@csrf

													</form>

												</ul>
											</li>
										@else
											
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
													</li>
													<li class="menu-item" >
															<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
														</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}"> 
														@csrf

													</form>
												</ul>
											</li>
										@endif
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="index.html" class="link-to-home"><img src="assets/images/InventoryManagement.png  height=300 width=100" alt="mercado"></a>
						</div>

					</div>
				</div>
		
		@livewireStyles
	</header>

	{{$slot}}
	<footer>
		
	</footer>


	
	<script src="{{asset ('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset ('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset ('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset ('assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset ('assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset ('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset ('assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset ('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset ('assets/js/functions.js')}}"></script>
	
	@livewireScripts
</body>
</html>







