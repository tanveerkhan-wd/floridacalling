<!DOCTYPE html>
<html lang="en">
	@include('include.head-link')
<body>
	@include('include.sticky-bar')
	@include('include.header')
	@yield('content')
	@include('include.footer')
	@include('include.loading_spinner')
	@include('include.go_to_top')
	@include('include.script')
</body>
</html>