<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Primary Meta Tags -->
	<title>Volt - Free Bootstrap 5 Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
	<meta name="author" content="Themesberg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-M/gy/3ZcV8+Wl3/8rD56DY0wCgQRUCXtCkLuWVLvOSzTtcCIsziB7IdhJ5J1XhxXvUKim9Kcc53bBwJ2nTHLQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    {{-- start css --}}

	@include('layout.admin.css')

    {{-- end css --}}
</head>

<body>
    {{-- start sidebar --}}
	@include('layout.admin.sidebar')
    {{-- end sidebar --}}

	<main class="content">

        {{-- start header --}}
		@include('layout.admin.header')
        {{-- end header --}}

        {{-- start main content --}}
       @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
		@include('layout.admin.footer')
        {{-- end footer --}}

	</main>
    {{-- start js --}}
	@include('layout.admin.js')
    {{-- end js --}}
</body>

</html>
