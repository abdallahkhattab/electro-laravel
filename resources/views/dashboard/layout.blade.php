<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>


		@include('dashboard.includes.css')
		@stack('css')

	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item"><a href="pages.html">Dashboard</a></li>
						<li class="breadcrumb-item active">@yield('link')</li>
					</ol>
				</div>
		@include('dashboard.includes.navbar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
		@include('dashboard.includes.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				@yield('main')
				@yield('pages')
				@yield('brands')
				@yield('users')
				@yield('categories')
				@yield('subCategory')
				@yield('editSubCategory')
				@yield('editCategory')
				@yield('createUser')
				@yield('createBrand')
				@yield('editBrand')
				@yield('createCategory')
				@yield('createSubCategory')
				@yield('createPage')
				@yield('createProduct')
				@yield('EditProduct')
				@yield('orderDetail')
				@yield('orders')
				@yield('paymentMethods')
				@yield('products')
			</div>
			<!-- /.content-wrapper -->
	
			@include('dashboard.includes.footer')
			
		</div>
		<!-- ./wrapper -->
	    
		@include('dashboard.includes.js')
		
		
		@stack('js')

	</body>
</html>