<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CarServ - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- start css --}}

    @include('layouts.css')

    {{-- end css --}}
</head>

<body>
      {{-- start header --}}
		@include('layouts.header')
        {{-- end header --}}

    {{-- start main content --}}
    @yield('contents')
    {{-- end main content --}}

    {{-- start footer --}}
    @include('layouts.footer')
    {{-- end footer --}}

    {{-- start js --}}
	@include('layouts.js')
    {{-- end js --}}
</body>
</html>
