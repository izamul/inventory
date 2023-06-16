<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .main-footer {
        margin-top: auto;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>


<footer class="main-footer">

    <div class="float-left d-none d-sm-inline-block text-right">
        <b>Proyek</b> 1 - <strong class="text-info">Kelompok 1</strong>
        TI 2F
    </div>
</footer>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins')}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE/plugins')}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE/plugins')}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE/plugins')}}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE/plugins')}}/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE/plugins')}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist')}}/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist')}}/js/pages/dashboard.js"></script>
</body>

</html>
