<!DOCTYPE html>
<html>
@include('admin.include.header-link')
<body class="hold-transition skin-blue sidebar-mini">
@include('admin.include.side-bar')
<div class="wrapper">
@include('admin.include.top-header')

@yield('content')

<!-- ./wrapper -->
@include('admin.include.footer')
</div>
@include('admin.include.script')
</body>
</html>