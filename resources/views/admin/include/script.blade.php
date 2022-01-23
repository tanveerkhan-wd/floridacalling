<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  var base_url = '{{ url('/') }}';
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
   })
 </script>
<!-- custom script -->
<script src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $("select.hotel_type").change(function(){
            var selectedtype = $(this).children("option:selected").val();
            if(selectedtype=="3")
            {
              $('.disneyResort').css("display","block");
            }else{
              $('.disneyResort').css("display","none");
            }
        });
    });
</script>