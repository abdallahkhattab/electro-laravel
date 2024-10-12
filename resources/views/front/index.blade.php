<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>

	@include('front.includes.css')
		

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		@include('front.includes.header')

		<main class="content">
			@yield('homeContent')
		</main>

		<div class="product">
			@yield('product')
		</div>

		<div class="checkout">
			@yield('checkout')
		</div>

		<div class="store">
			@yield('store')
		</div>

		<div class="blank">
			@yield('blank')
		</div>
		


		<!-- newsLetter -->

@include('front.includes.newsLetter')
		<!-- newsLetter -->

		<!-- FOOTER -->
	@include('front.includes.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->

		@include('front.includes.js')


	</body>
</html>
