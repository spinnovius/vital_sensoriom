@php
$userid = Auth::user()->id;
if(session('role')=='5'){
$upcomingappointment = App\Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
->join('users as d','appointment_details.doctor_id','=','d.id')
->join('users as p','appointment_details.patient_id','=','p.id')
->where('appointment_details.clinic_id','=',$userid)
->where('appointment_details.date','>=', date('Y-m-d'))
->where('appointment_details.flag','=', 1)
->get()->count();
$pendingappointment = App\Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
->join('users as d','appointment_details.doctor_id','=','d.id')
->join('users as p','appointment_details.patient_id','=','p.id')
->where('appointment_details.clinic_id','=',$userid)
->where('appointment_details.flag','=',0)
->get()->count();
}elseif(session('role')=='2'){
    $upcomingappointment = App\Appointments::select('d.fname as doctorname','p.fname as patientname','appointment_details.*')
    ->join('users as d','appointment_details.doctor_id','=','d.id')
    ->join('users as p','appointment_details.patient_id','=','p.id')
    ->where('appointment_details.doctor_id','=',$userid)
    ->where('appointment_details.date','>=', date('Y-m-d'))
    ->where('appointment_details.flag','=',1)
    ->where('appointment_details.is_read',0)
    ->where('appointment_details.is_prescription','=', 0)
    ->get()->count();
    $referralcount=DB::table('doctodoc')
        ->select('doctodoc.*','doc.fname as Dfname','C.fname as Cfname','doc.id as doc_id','city.city','pd.age','pd.gender','pd.patient_id','patient.fname as patientname','doctodoc.message as question')
        ->join('appointment_details', 'doctodoc.appointment_id', '=','appointment_details.id')
        ->join('city', 'appointment_details.city_id', '=', 'city.id')
        ->leftjoin('patient_detail as pd','appointment_details.patient_id','=','pd.patient_id')
        //doctor
        ->leftjoin('users as doc', 'doctodoc.doc_send', '=', 'doc.id')
        ->join('users as patient', 'appointment_details.patient_id', '=', 'patient.id')
        ->leftjoin('users as C', 'appointment_details.clinic_id', '=', 'C.id')
        ->where('doc_rec','=',$userid)
        ->where('doctodoc.is_read',0)
        ->count();
    $pointofcarecount=App\Doctorrefer::select('doctorrefer.*','poc.fname as pocfname','pointofcare.poc_no as poc_no','pointofcare.city as poccity','pd.age as age','pd.gender as gender','pd.status as status','patient.fname as patientname','doctor_speciality.speciality as speciality','city.city as city','C.fname as Cfname','doc.fname as Dfname')
            //poc
            ->leftjoin('users as poc','doctorrefer.poc_id','=','poc.id')
            ->leftjoin('pointofcare','poc.id','=','pointofcare.user_id')
            ->leftjoin('users as patient','doctorrefer.user_id','=','patient.id')
            ->leftjoin('patient_detail as pd','doctorrefer.user_id','=','pd.patient_id')
            //doctor
            ->leftjoin('users as doc','doctorrefer.doc_id','=','doc.id')
            ->leftjoin('doctors','doctorrefer.doc_id','=','doctors.doctor_id')
            ->leftjoin('doctor_speciality','doctors.speciality','=','doctor_speciality.id')
            ->leftjoin('city','doctors.city','=','city.id')
            ->leftjoin('users as C','doctors.clinic_id','=','C.id')
            ->where('doctorrefer.doc_id','=',$userid)
            ->where('doctorrefer.is_read',0)
            ->count();
}
@endphp
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
    <!-- <link href="{{ asset('public/otherrole/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet"> -->
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
    
        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Bootstrap datapicker 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
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
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

   <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('public/otherrole/assets/node_modules/jquery/jquery.min.js') }}"></script> 
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/bootstrap.min.js') }}"></script>  
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 


        
    <style type="text/css">.boxheight{ min-height: 40px !important; }.boxheighticon{ height: 55px !important; line-height: 0 !important; padding-top: 10px !important;}
    .logoutsignout{
            padding: 15px;
            font-size: 15px;
    }
    .datepicker table tr td.disabled,
    .datepicker table tr td.disabled:hover {
      background: none;
      color: #999999;
      cursor: default;
    }
    .datepicker table tr td.active,
.datepicker table tr td.active:hover {
  background-color: #00ced1;
}
.datepicker table tr td span.active {
  background-color: #00ced1;
}
.h3, h3 {
    font-size: 18px;
}
.label-dark{
background-color: grey !important;
color: white;
}
.nav li a  b{
   font-weight: 600;
}
.btn-outline-primary {
    color: #007bff;
    background-color: transparent;
    background-image: none;
    border-color: #007bff;
}
 .m-1{
        margin: 1px!important;
    }
    .mt-5{
        margin-top: 5px!important;
    }
 
    </style>
    @yield('custom_head')
</head>

<body class="card-no-border">
    @php
        $completeappointment=DB::table('appointment_details')
        ->where('date','<',date("Y-m-d"))
        //->get();
        ->update(['flag'=>2]);
        //dd($completeappointment);
    @endphp
    
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
                    <div class="datettime">
                        <div class="date"><b>DATE : {{ Date('d-m-Y') }} &nbsp; TIME : {{ Date('h:i:s A') }}</b></div>
                    </div>
                    <div class="navbar-nav mr-auto text-center" style="width: 30%;display: block;">
                        <div class="nav-item" >
                            @if(session('role')=='2')
                            <h3><b>Doctor:- </b>{{Auth::user()->fname}}</h3>
                            @endif

                            @if(session('role')=='3')
                            <h3><b>Coach:- </b>{{Auth::user()->fname}}</h3>
                            @endif

                            @if(session('role')=='5')
                            <h3><b>Clinic:- </b>{{Auth::user()->fname}}</h3>
                            @endif
                           
                            @if(session('role')=='6')
                            <h3><b>POC:- </b>{{Auth::user()->fname}}</h3>
                            @endif

                            @if(session('role')=='8')
                            <h3><b>Panelist:- </b>{{Auth::user()->fname}}</h3>
                            @endif
                            
                        </div>
                    </div>
                    @if(session('role')=='2')
                    <div class="row" style="width: 22%">
                    <a class="btn btn-primary m-1" href="{{ url('upcomingappointment') }}">{{@$upcomingappointment}} UPCOMING<br>APPOINTMENTS</a>
                    </div>
                    @endif
                    @if(session('role')=='5')
                    <div class="row" style="width: 30%">
                    <a class="btn btn-danger m-1" href="{{ url('pendingappointment') }}">{{@$pendingappointment}} PENDING<br>APPOINTMENTS</a>
                    <a class="btn btn-primary m-1" href="{{ url('upcomingappointment') }}">{{@$upcomingappointment}} UPCOMING<br>APPOINTMENTS</a>
                    </div>
                    @endif
                    <div class="logoutbtn" style="width: 12%;">
                        <a href="{{ route('admin.logout') }}" class="logoutsignout">Sign out</a>
                    </div>
                    <!-- <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                            @if(session('role')=='5')
                            <h4><b>Clinic:- </b>{{Auth::user()->fname}}</h4>
                            @endif

                            @if(session('role')=='2')
                            <h4><b>Doctor:- </b>{{Auth::user()->fname}}</h4>
                            @endif
                        
                    </ul> -->
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <!-- <ul class="navbar-nav my-lg-0"> -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('public/otherrole/assets/images/users/1.jpg') }}" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;</span></a><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-log-out"></span>Log out</button>
                        </li> -->
                         <!--  <li>
                      <ul>
                         <li class="list-group-item">
                             <a href="{{ route('admin.logout') }}" class="">Sign out</a>
                         </li>
                      </ul>
                     </li>


                    </ul> -->
                </div>
                       

                   
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
                               <li>
                                    <a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.upcomingappointment')}}">
                                    <i class="fa fa-circle-o"></i> Upcoming ({{$upcomingappointment}})
                                    </a>
                                </li>
                                <li>
                                    <a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.referral') }}">
                                        <i class="fa fa-circle-o"></i>
                                         Referral ({{$referralcount}})
                                     </a>
                                 </li>
                                <li>
                                    <a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.pocappointment') }}">
                                        <i class="fa fa-circle-o"></i> 
                                    Point Of Care ({{$pointofcarecount}})
                                    </a>
                                </li>
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
                        @elseif(session('role')=='4')
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
                                {{-- <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.add_doctor') }}"><i class="fa fa-plus-square"></i>       Add New</a></li> --}}
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.all_doctor') }}"><i class="fa fa-circle-o"></i> All Doctors</a></li>
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
                        
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin_main.panelists')}}" aria-expanded="false"><i class="fa fa-circle-o"></i><span class="hide-menu">Our Panelists</span></a>
                        </li>
                        <li class="treeview">
                            <a href="{{ route('admin_main.editsettings',auth()->user()->id)}}">
                                <i class="fa fa-plus-square"></i> <span>Settings</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        </li>
                        
                        <!--<li class="treeview">-->
                        <!--    <a href="#">-->
                        <!--        <i class="fa fa-plus-square"></i> <span>Doctor</span>-->
                        <!--        <span class="pull-right-container">-->
                        <!--            <i class="fa fa-angle-left pull-right"></i>-->
                        <!--        </span>-->
                        <!--    </a>-->
                        <!--    <ul class="treeview-menu">-->
                        <!--        {{-- <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.add_doctor') }}"><i class="fa fa-plus-square"></i>       Add New</a></li> --}}-->
                        <!--        <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.all_doctor') }}"><i class="fa fa-circle-o"></i> All Doctors</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        @elseif(session('role')=='8')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus-square"></i> <span>Patient</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <!-- <li><a id='admincurrent_tripongoingtrip' href="{{ route('admin_main.addpatient') }}"><i class="fa fa-plus-square"></i>       Add New</a></li> -->
                                <li><a id='admincurrent_tripongoingtrip' href="{{ route('panel.allpatient') }}"><i class="fa fa-circle-o"></i> All Patients</a></li>
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
            <footer class="footer"> © <?php echo date('Y');?> Sensoriom </footer>
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
    <!-- <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/bootstrap/js/bootstrap.min.js') }}"></script> -->
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
    <!-- <script src="{{ asset('public/otherrole/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/morrisjs/morris.min.js') }}"></script> -->
    <!--c3 JavaScript -->
    <script src="{{ asset('public/otherrole/assets/node_modules/d3/d3.min.js') }}"></script>
    <script src="{{ asset('public/otherrole/assets/node_modules/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <!-- <script src="{{ asset('public/otherrole/js/dashboard1.js') }}"></script> -->

    <script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>       
        <!-- Select2 -->
        <script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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
        <!-- <script src="{{ asset('public/dist/js/pages/dashboard.js')}}"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/dist/js/demo.js')}}"></script>
        <!-- bootbox code -->
        <script src="{{ asset('public/js/bootbox.min.js')}}"></script>
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
            $(function () {
                $('#example26').DataTable({
                     
                });
            });

            $(function () {
                $('#exampleupcoming').DataTable({
                     "order": false
                });
            });

            $('.timepicker').timepicker({
              showInputs: false,
            });
            
            jQuery('.labtestdate').datepicker({
                format: 'dd/mm/yyyy',//format: 'yyyy-mm-dd',
            });

            // jQuery('.singledate').datepicker({
            //     format: 'yyyy-mm-dd',
            //     startDate: '-0m'
            // });

            jQuery('.atdate').datepicker({
                format: 'dd-mm-yyyy',
                // endDate: "today",
                startDate: '-0m'
            });
            
            jQuery('#singledate').datepicker({
                format: 'dd/mm/yyyy',
                endDate: "today",
            });

            jQuery('.daymonthselect').datepicker({
                format: 'mm-mm',
                // endDate: "today",
                startDate: '-0m'
            });

            jQuery('.dobpicker').datepicker({
                format: 'yyyy-mm-dd',
                endDate: '-0m'
            });
            jQuery('.dobDMYpicker').datepicker({
                format: 'dd-mm-yyyy',
                endDate: '-0m'
            });
            jQuery('.singleDMYdate').datepicker({
                format: 'dd-mm-yyyy',
                startDate: '-0m'
            });
             jQuery('.singleDMYEdate').datepicker({
                format: 'dd-mm-yyyy',
                // startDate: '-0m'
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
                //bootstrap WYSIHTML5 - text editor
                // CKEDITOR.replace('editor1');
                // $('.textarea').wysihtml5();
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
//$(document).ready(function(){
//    $('#height').change(function(){
//        var weight=$('#weight').val();
//        var height=$('#height').val();                               
//        var bmi = weight / (height * height);
//        var newbmi=bmi.toFixed(2); 
//        $('#bmi').val(newbmi);
//    });
//});
       
   </script>

   <script>
        $(document).ready(function(){
            var hostipal=$('#hospital_value').val();
            var city=$('#city_value').val();
            if(city != '')
            {
                var city=$('#city_value').val();
                $.ajax({
                        url:"{{ env('APP_URL') }}hospital/byCity/"+city,
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
                        url:"{{ env('APP_URL') }}hospital/byCity/"+id,
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
                        url:"{{ env('APP_URL') }}clinic/byCity/"+id,
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
                    var city_id = $('#city').val();
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
            $('.speciality').change(function(){
                    var id  = $(this).val();
                    var city_id = $('#city').val();
                    $.ajax({
                        url:"{{ env('APP_URL') }}doctor/bySpeciality/"+id+"/"+city_id,
                        method:"get",
                        success:function(e){
                            var html = '<option value="" required>Select Doctor</option>';
                            for(var i = 0; i < e.length; i++){
                                html += "<option  value='"+e[i].id+"'>"+e[i].name+"</option>";
                            }
                            $("#doctorslot").html(html);
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
<script>
        $(document).ready(function(){
             $(".isnumbertype").keypress(function(e) {
               var charCode = (e.which) ? e.which : event.keyCode;
                  if (charCode != 46 && charCode > 31 
                    && (charCode < 48 || charCode > 57))
                     return false;

                  return true;
            });
        });
       
   </script>
        @yield('custom_js')
        <script>
            $('.basicExample1').timepicker({
                format: 'hh:mm:ss'
            });
        </script>

</body>

</html>