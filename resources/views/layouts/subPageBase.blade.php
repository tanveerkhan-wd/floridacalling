<!DOCTYPE html>
<html lang="en">
	@include('include.head-link')
<body>
	@include('include.sticky-bar')
	@include('include.sub-page-header')
	@yield('content')
	@include('include.loading_spinner')
	@include('include.footer')
	@include('include.script')

</body>
</html>