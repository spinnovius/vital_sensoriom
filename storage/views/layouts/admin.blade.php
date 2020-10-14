<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Vitalx | Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/bootstrap_startup/images/favicon.png')}}">
        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/Ionicons/css/ionicons.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css')}}">        
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('public/dist/css/skins/_all-skins.min.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/morris.js/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/jvectormap/jquery-jvectormap.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css ') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <!-- css for date picker -->
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/select2/dist/css/select2.min.css') }}">

        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <!-- fonts -->
        <link rel="stylesheet" href="{{ asset('public/fonts/Verdana.ttf') }}">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{ route('admin.index')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b style='font-size: 10px;'><img class="adm-log-logo" style="width:100%;height:auto" src="{{ asset('public/bootstrap_startup/images/logo.jpg')}}"></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b><img class="adm-log-logo" style="width:100%;height:auto" src="{{ asset('public/bootstrap_startup/images/logo.jpg')}}"></b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                

                            <li class="dropdown tasks-menu" style="display: none;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">3</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 3 notification</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        John has paid $32.23 for his trip.                                                       
                                                    </h3>
                                                    
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Norman has accepted his new trip.                                                        
                                                    </h3>
                                                   
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Nadia booked driver for her trip.
                                                    </h3>
                                                    
                                                </a>
                                            </li>
                                            <!-- end task item -->                                           
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="{{ route('admin.index')}}" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->
                                    <span class="hidden-xs">
                                        <?php echo Session::get('admin_name'); ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu list-group" style="width: 50%;">
                                    <!-- User image -->
                                    <li class="list-group-item">
                                        <a href="{{ route('admin.profile') }}" class="">Profile</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('admin.logout') }}" class="">Sign out</a>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </header>
            @section('sidebar')

            @show
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                   
                    <input type="hidden" id="current_route" value="{{ \Request::route()->getName() }}">
                    <ul id="admin_sidebar" class="sidebar-menu" data-widget="tree">        
                        <li id="dashboard">
                            <a id="adminindex" href="{{ route('admin.index')}}"><i class="fa fa-dashboard"></i> <span class="">Dashboard</span></a>
                        </li>

                        <?php if(Session::get('admin_role')==1){?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Admin</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin.viewall_admin') }}"><i class="fa fa-circle-o"></i>View Admin</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('admin.new') }}"><i class="fa fa-circle-o"></i>Add Admin</a></li>
                            </ul>
                        </li>
                        <?php } ?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Doctor</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('doctor.viewall_pending_doctor') }}"><i class="fa fa-circle-o"></i>Pending Doctor</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin.viewall_admin') }}"><i class="fa fa-circle-o"></i>Approved Doctor</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-hospital-o"></i> <span>Hospital</span>
                                    <span class="pull-right-container">
                                     <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('hospital.viewall_hospital') }}"><i class="fa fa-circle-o"></i>View Hospital</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('hospital.new') }}"><i class="fa fa-circle-o"></i>Add Hospital</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Configuration</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripindex' href="{{ route('speciality.new') }}"><i class="fa fa-circle-o"></i>Speciality</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('city.new') }}"><i class="fa fa-circle-o"></i>City</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('authority_council.new') }}"><i class="fa fa-circle-o"></i>Auhthority Council</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('health_problem.new') }}"><i class="fa fa-circle-o"></i>Health Problem</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('unit.new') }}"><i class="fa fa-circle-o"></i>Unit For Lab Details</a></li>
                                <li><a id='admincurrent_tripindex' href="{{ route('health_plan.new') }}"><i class="fa fa-circle-o"></i>Health Plan</a></li>
                            </ul>
                        </li>

                        

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">               
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <!--      <b>Version</b> 2.4.0-->
                </div>
                <strong>Copyright &copy; @php echo date('Y') @endphp <a href="">Travel</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
           
            <div class="control-sidebar-bg"></div>
        </div>
      
        <script src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('public/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
$.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>       
        <!-- Select2 -->
        <script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <!-- Morris.js charts -->
        <script src="{{ asset('public/bower_components/raphael/raphael.min.js')}}"></script>
        <!--<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>-->
        <!-- Sparkline -->
        <script src="{{ asset('public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('public/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('public/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{ asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{ asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- Slimscroll -->
        <script src="{{ asset('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('public/bower_components/chart.js/Chart.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset('public/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('public/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/dist/js/demo.js')}}"></script>
        <!-- bootbox code -->
        <script src="{{ asset('public/js/bootbox.min.js')}}"></script>

        <script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

        <!-- page script -->
        <script>
$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
});
        </script>
        <!-- date pickrs -->
        <script>
            
            function confirm(url, name) {

                bootbox.confirm({
                    title: '',
                    message: '<h4><i class="fa fa-remove text-danger"></i>&nbsp;&nbsp;' + name + '</h4>',
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Confirm'
                        }
                    },
                    callback: function (result) {
                        if (result == true) {
                            window.location.replace(url);
                        }
                    }
                });
            }
        </script>
        <!-- CK Editor -->
        <script src="{{ asset('public/bower_components/ckeditor/ckeditor.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5();
            });
        </script>

        @yield('custom_js')

    </body>
</html>
