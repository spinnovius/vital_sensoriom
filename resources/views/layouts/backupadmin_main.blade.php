<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/otherrole/assets/images/favicon.png') }}">
    <title>Sensoriom</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/otherrole/assets/node_modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/otherrole/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('public/otherrole/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('public/otherrole/assets/node_modules/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/otherrole/css/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <!-- You can change the theme colors from here -->
    
    <link href="{{ asset('public/otherrole/css/pages/dashboard1.css') }}" rel="stylesheet">
    <link href="{{ asset('public/otherrole/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/bootstrap_startup/images/favicon.png')}}"> 
        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link href="{{ asset('public/new_admin/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/new_admin/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/new_admin/assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/new_admin/assets/node_modules/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <link href="../assets/node_modules/daterangepicker/daterangepicker.css" rel="stylesheet">

         <link rel="stylesheet" href="{{ asset('public/admin_data/plugins/timepicker/bootstrap-timepicker.min.css') }}">
         <link rel="stylesheet" href="{{ asset('public/bower_components/timepicker/bootstrap-timepicker.min.css') }}">

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
        <link href="{{ asset('public/new_admin/node_modules/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
   <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('public/otherrole/assets/node_modules/jquery/jquery.min.js') }}"></script>    


        
    <style type="text/css">.boxheight{ min-height: 40px !important; }.boxheighticon{ height: 55px !important; line-height: 0 !important; padding-top: 10px !important;}
    </style>
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sensoriam</p>
        </div>
    </div>
 
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('admin_main.dashboard')}}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="{{ asset('public/otherrole/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <!-- <img src="{{ asset('public/otherrole/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->

                         <img src="{{ asset('public/bootstrap_startup/images/logo-2.png')}}"alt="homepage" class="dark-logo" style="width: 10em;" />
                         <!-- Light Logo text -->    
                         <img src="{{ asset('public/bootstrap_startup/images/logo-2.png')}}"class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                            @if(session('role')=='5')
                            <h4><b>Clinic:- </b>{{Auth::user()->fname}}</h4>
                            @endif

                            @if(session('role')=='2')
                            <h4><b>Doctor:- </b>{{Auth::user()->fname}}</h4>
                            @endif
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('public/otherrole/assets/images/users/1.jpg') }}" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;</span></a><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-log-out"></span>Log out</button>
                        </li> -->
                          <li>
                      <ul>
                         <!-- User image -->
                         <li class="list-group-item">
                             <a href="{{ route('admin.logout') }}" class="">Sign out</a>
                         </li>
                      </ul>
                     </li>


                </div>
                       

                    </ul>
                   
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

         @section('sidebar')

            @show
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin_main.dashboard')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                       
                        @if(session('role')=='5')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Patient</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.addpatient') }}"><i class="fa fa-plus-square"></i>       Add New</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.allpatient') }}"><i class="fa fa-circle-o"></i> All Patients</a></li>

                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Doctor</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.add_doctor') }}"><i class="fa fa-plus-square"></i>       Add New</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.all_doctor') }}"><i class="fa fa-circle-o"></i> All Doctors</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Appointment</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.upcomingappointment')}}"><i class="fa fa-circle-o"></i> Upcoming</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pendingappointment') }}"><i class="fa fa-circle-o"></i> Pending</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.cancelappointment') }}"><i class="fa fa-circle-o"></i> Cancelled</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pastappointment') }}"><i class="fa fa-circle-o"></i> Previous</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="{{ route('admin_main.editsettings',auth()->user()->id)}}">
                                <i class="fa fa-plus-square"></i> <span>Settings</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        @elseif(session('role')=='2')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Patient</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <!-- <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.addpatient') }}"><i class="fa fa-plus-square"></i>       Add New</a></li> -->
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.allpatient') }}"><i class="fa fa-circle-o"></i> All Patients</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Appointment</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.upcomingappointment')}}"><i class="fa fa-circle-o"></i> Upcoming</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pocappointment') }}"><i class="fa fa-circle-o"></i> Referral</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pocappointment') }}"><i class="fa fa-circle-o"></i> Point Of Care</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pastappointment') }}"><i class="fa fa-circle-o"></i> Previous</a></li>
                            </ul>
                        </li>
                        @elseif(session('role')=='6')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Patient</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.addpatient') }}"><i class="fa fa-plus-square"></i>       Add New</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.allpatient') }}"><i class="fa fa-circle-o"></i> All Patients</a></li>
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Doctor</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.add_doctor') }}"><i class="fa fa-plus-square"></i>       Add New</a></li>
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.all_doctor') }}"><i class="fa fa-circle-o"></i> All Doctors</a></li>
                            </ul>
                        </li>
                        @else

                        @endif


                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down"> Upgrade to Pro</a>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->

                
                
             
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © <?php echo date('Y');?> Sensoriam </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/otherrole/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('public/otherrole/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('public/otherrole/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/otherrole/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('public/otherrole/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('public/otherrole/assets/node_modules/d3/d3.min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('public/otherrole/js/dashboard1.js') }}"></script>

    <script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>       
        <!-- Select2 -->
        <script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

         <script src="{{ asset('public/bower_components/raphael/raphael.min.js')}}"></script>
        <!--<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>-->
        <!-- Sparkline -->
        <script src="{{ asset('public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('public/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>

        <script src="{{ asset('public/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{ asset('public/new_admin/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
        <script src="{{ asset('public/new_admin/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
       
        <script src="{{ asset('public/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>

        <script src="{{ asset('public/new_admin/node_modules/daterangepicker/daterangepicker.js')}}"></script>         
        <script src="{{ asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{ asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

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
       
        <script src="{{ asset('public/new_admin/node_modules/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{ asset('public/new_admin/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

        <!-- page script -->
        <script>

            $(function () {
                $('#example23').DataTable({
                     "order": [[ 0, "desc" ]]
                });
            });

            $('.timepicker').timepicker({
              showInputs: false,
            });
            
            jQuery('.labtestdate').datepicker({
                format: 'dd-mm-yyyy',
            });

            jQuery('.singledate').datepicker({
                format: 'dd-mm-yyyy',
                startDate: '-0m'
            });

            jQuery('.atdate').datepicker({
                format: 'dd-mm-yyyy',
                endDate: "today",
            });
            
            jQuery('#singledate').datepicker({
                format: 'dd-mm-yyyy',
                endDate: "today",
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
        <script type="text/javascript" src="{{ asset('public/new_admin/node_modules/multiselect/js/jquery.multi-select.js') }}"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5();
            });
        </script>



   <script>
        $(document).ready(function(){
            $('body').tooltip({
                selector: '[data-toggle="tooltip"]',
                placement: 'bottom'
            });
            $(".select2").select2();
        });
   </script>

    <script>
        $(document).ready(function(){
            
            
            $('#height').change(function(){
                var weight=$('#weight').val();
                var height=$('#height').val();                               
                var bmi = weight / (height * height);
                var newbmi=bmi.toFixed(2); 
                $('#bmi').val(newbmi);
            });
        });
       
   </script>

   <script>
        $(document).ready(function(){
            var hostipal=$('#hospital_value').val();
            var city=$('#city_value').val();
            if(city != '')
            {
                var city=$('#city_value').val();
                $.ajax({
                        url:"{{ env('APP_URL') }}/hostipal/byCity/"+city,
                        method:"get",
                        success:function(e){
                            var selected='';
                            var html = '<option value="" required>Select Hostipal</option>';
                            for(var i = 0; i < e.length; i++){
                                if(hostipal==e[i].id)
                                {
                                    selected="selected";  
                                    html += "<option value='"+e[i].id+"' "+selected+">"+e[i].name+"</option>";
                                }
                                else
                                {
                                    html += "<option value='"+e[i].id+"'>"+e[i].name+"</option>";
                                }
                            }
                            $("#hospitalnew").html(html);
                        }
                });
            }
            var speciality=$('#speciality_value').val();
            var doctor=$('#doctor_value').val();
            
            if(speciality !='' && city !='')
            {
                var speciality=$('#speciality_value').val();
                    $.ajax({
                        url:"{{ env('APP_URL') }}doctor/bySpeciality/"+speciality+"/"+city,
                        method:"get",
                        success:function(e){
                            var selected='';
                            var html = '<option value="" required>Select Doctor</option>';
                            for(var i = 0; i < e.length; i++){
                                if(doctor==e[i].id)
                                {
                                    selected="selected"; 
                                    
                                    html += "<option value='"+e[i].id+"' "+selected+">"+e[i].name+"</option>";
                                }
                                else
                                {
                                    html += "<option value='"+e[i].id+"'>"+e[i].name+"</option>";
                                }
                               
                            }
                            $("#doctors").html(html);
                        }
                    });
            }

            $('.city').change(function(){
                    var id  = $(this).val();
                    $.ajax({
                        url:"{{ env('APP_URL') }}/hostipal/byCity/"+id,
                        method:"get",
                        success:function(e){
                            var html = '<option value="" required>Select Hostipal</option>';
                            for(var i = 0; i < e.length; i++){
                                html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                            }
                            $("#hospital").html(html);
                        }
                    });
            });

            $('#city').change(function(){
                    var id  = $(this).val();
                    $.ajax({
                        url:"{{ env('APP_URL') }}/hostipal/byCity/"+id,
                        method:"get",
                        success:function(e){
                            var html = '<option value="" required>Select Hostipal</option>';
                            for(var i = 0; i < e.length; i++){
                                html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                            }
                            $("#hospitalnew").html(html);
                        }
                    });
            });

            $('.speciality').change(function(){
                    var id  = $(this).val();
                    var city_id=$('#city_id').val();
                    $.ajax({
                        url:"{{ env('APP_URL') }}doctor/bySpeciality/"+id+"/"+city_id,
                        method:"get",
                        success:function(e){
                            var html = '<option value="" required>Select Doctor</option>';
                            for(var i = 0; i < e.length; i++){
                                html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                            }
                            $("#doctors").html(html);
                        }
                    });
            });

            $("body").on("click",".add_flat",function(){
                var html = '<div class="col-md-4 mb-3"><input type="text" name="goal[]" class="form-control" placeholder="Goal"></div><div class="col-md-1 mb-1" style="padding: 0.5em 0.5em 0.5em 0.5em;"><button class="btn btn-default btn-xs delete_flat" type="button">-</button></div><div style="padding: 0.5em;"><label for="In">IN</label></div><div class="col-md-3 mb-3"><input type="text" name="no[]" class="form-control" placeholder="No."></div><div class="col-md-3 mb-3"><input type="text" name="days[]" class="form-control" placeholder="Days/Months"></div>';

                $("#flats").append(html);
            });
            $("body").on("click","#flats button.delete_flat",function(){
                $(this).closest(".form-row").remove();
            });
        });

   </script>

        @yield('custom_js')
</body>

</html>