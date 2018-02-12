<!-- jQuery 2.2.3 -->
{{--<script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>--}}
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/app.min.js') !!}"></script>
{{-- Sparkline--}}
<script src="{!! asset('plugins/sparkline/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap -->
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{!! asset('plugins/chartjs/Chart.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>


{{----------------------------------- Data Table ---------------------------------------}}
<!-- jQuery 2.2.3 -->
{{--    <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>--}}
<script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- DataTables -->
<script src="{!! asset('plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/app.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>