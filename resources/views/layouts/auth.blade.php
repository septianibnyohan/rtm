
<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>@yield('title')</title>
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ config('app.url') }}/dist/css/vendor.styles.css">
		<link rel="stylesheet" href="{{ config('app.url') }}/dist/css/demo/flite-template.css">
		<!-- endinject -->
        <link rel="shortcut icon" href="{{ config('app.url') }}/dist/images/favicon.png"/>
        @yield('css')
</head>
<body class="minimized-sidebar">
<div class="main-container">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
				<div class="user-auth-v2">
						<div class="row no-gutters">
								<div class="col-lg-12 auth-header">
										<div class="logo-container">
												<a class="brand-logo" href="../dashboards/index.html">
														{{config('app.name')}}
												</a>
										</div>
										<div class="link-container">
												<a href="index.html">About</a>
												<a href="index.html">Privacy Policy</a>
												<a href="index.html">Help</a>
												<a href="index.html">Sign Up</a>
										</div>
								</div>
                        </div>
                        @yield('content')
						
				</div>
		</div>
</div>
<!-- End main-container -->

<!-- inject:js -->
<script src="{{ config('app.url') }}/dist/js/vendor.base.js"></script>
<script src="{{ config('app.url') }}/dist/js/vendor.bundle.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ config('app.url') }}/dist/js/components/flite-sidebar/common.js"></script>
<script src="{{ config('app.url') }}/dist/js/vendor-override/tooltip.js"></script>
<!-- End custom js for this page-->

@yield('js')
</body>

</html>