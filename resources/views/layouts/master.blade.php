<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hoàng Lê</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
	@include('layouts.header')
	<div id="content">
		<h1>Hoàng Lê</h1>
		@yield('NoiDung')
	</div>
	@include('layouts.footer')

</body>
</html>