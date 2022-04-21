<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset ('adminAssets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('adminAssets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('adminAssets/css/style.css')}}" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('adminAssets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">({{Auth::user()->name}})</h6>
                        <span> ({{Auth::user()->name}})</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('admin.dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="{{route('admin.products')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>All Products</a>
                    <a href="{{route('admin.categories')}}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Categories</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>View Orders</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages </a>
                        <div class="dropdown-menu bg-transparent border-0">
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
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        {{$slot}}
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('adminAssets/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('adminAssets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('adminAssets/js/main.js')}}"></script>
    @livewireScripts
</body>

</html>