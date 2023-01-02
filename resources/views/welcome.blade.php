@extends('website')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@section('content')
<style>
	.summary-card {
		margin-top: 20px;
	}
</style>
<section role="main" class="content-body content-body-modern">
	<header class="page-header page-header-left-inline-breadcrumb">
		<h2 class="font-weight-bold text-6">Registration Form</h2>

	</header>
</section>
<section role="main" class="content-body">
	
	
	
</section>
<script>
	$(document).ready(function() {
		function disableBack() {
			window.history.forward()
		}
		window.onload = disableBack();
		window.onpageshow = function(e) {
			if (e.persisted)
				disableBack();
		}
	});
</script>
@endsection