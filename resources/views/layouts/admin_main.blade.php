<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Bus Booking</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.min.css')}}">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('css/frontstyle.css')}}">
    @yield('head')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/buses" class="nav-link">Buses</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/routes" class="nav-link">Routes</a>
                </li>
            </ul>

            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Bus Ticket Booking</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="/admin" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Buses</li>
                        <li class="nav-item">
                            <a href="/admin/buses" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Buses
                                </p>
                            </a>
                        </li> 

                        <li class="nav-header">Bus Routes</li>
                        <li class="nav-item">
                            <a href="/admin/routes" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Bus Routes
                                </p>
                            </a>
                        </li> 

                        <li class="nav-header">Time Table</li>
                        <li class="nav-item">
                            <a href="/admin/date_time" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Time Table
                                </p>
                            </a>
                        </li>   

                        <li class="nav-header">Tickets</li>
                        <li class="nav-item">
                            <a href="/admin/tickets" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Tickets
                                </p>
                            </a>
                        </li>                       
                        

                        <li class="nav-header">Settings</li>                      

                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @yield('component')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?php echo date('Y') ?> Bus Ticket Booking</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboard/dist/js/adminlte.min.js')}}"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('dashboard/dist/js/pages/dashboard2.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(function() {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
    @yield('scripts')




</body>

</html>