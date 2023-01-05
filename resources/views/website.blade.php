<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Topdawg Website</title>
	<meta name="keywords" content="Topdawg Website" />
	<meta name="description" content="Topdawg">
	<meta name="author" content="Topdawg.net">

	<!-- Title Logo -->
	<link rel="shortcut icon" href="{{asset('ThemeData/img/logo-default.png')}}">
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/animate/animate.compat.css')}}">
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/font-awesome/css/all.min.css')}}" />
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/boxicons/css/boxicons.min.css')}}" />
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
	<link rel="stylesheet" href="{{asset('ThemeData/vendor/datatables/media/css/dataTables.bootstrap5.css')}}" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('ThemeData/css/theme.css')}}" />

	<!-- Theme Layout -->
	<link rel="stylesheet" href="{{asset('ThemeData/css/layouts/modern.css')}}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{asset('ThemeData/css/skins/default.css')}}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{asset('ThemeData/css/custom.css')}}">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/animate/animate.compat.css')}}">
	<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/all.min.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('css/theme.css')}}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{asset('css/skins/default.css')}}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">

	<!-- Head Libs -->
	<script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
	<!-- Head Libs -->
	<script src="{{asset('ThemeData/vendor/modernizr/modernizr.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<section class="body">

		<!-- start: header -->
		@include('Header.index')
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			@include('Sidebar.index')
			<!-- end: sidebar -->

			<!-- start: Dashboard content -->
			@yield('content')
			<!-- end: Dashboard content -->

		</div>

	</section>
	@if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled'))
	<script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
	<script src="https://unpkg.com/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
	<script @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled')) data-turbolinks-eval="false" @endif>
		var AppBridge = window['app-bridge'];
		var actions = AppBridge.actions;
		var utils = window['app-bridge-utils'];
		var createApp = AppBridge.default;
		var app = createApp({
			apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', $shopDomain ?? Auth::user()->name ) }}",
			shopOrigin: "{{ $shopDomain ?? Auth::user()->name }}",
			host: "{{ \Request::get('host') }}",
			forceRedirect: true,
		});
	</script>
	@include('shopify-app::partials.token_handler')
	@include('shopify-app::partials.flash_messages')
	
	@endif
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Vendor -->
	<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/jquery/jquery.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/popper/umd/popper.min.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/common/common.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/nanoscroller/nanoscroller.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

	<!-- Specific Page Vendor -->
	<script src="{{asset('ThemeData/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('ThemeData/vendor/datatables/media/js/dataTables.bootstrap5.min.js')}}"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="{{asset('ThemeData/js/theme.js')}}"></script>

	<!-- Theme Custom -->
	<script src="{{asset('ThemeData/js/custom.js')}}"></script>

	<!-- Theme Initialization Files -->
	<script src="{{asset('ThemeData/js/theme.init.js')}}"></script>

	<!-- Examples -->
	<script src="{{asset('ThemeData/js/examples/examples.header.menu.js')}}"></script>
	<script src="{{asset('ThemeData/js/examples/examples.ecommerce.datatables.list.js')}}"></script>

</body>

</html>