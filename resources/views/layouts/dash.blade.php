<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Renal</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('dash') }}/images/favicon.ico">

    <link href="{{ asset('dash') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('dash') }}/plugins/morris/morris.css">

    <link href="{{ asset('dash') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/style.css" rel="stylesheet" type="text/css">
    @stack('head')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                   <h3>Renal</h3>
                </a>
            </div>

            <!-- Search input -->

            <nav class="navbar-custom">
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->

                    <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="{{ route('home') }}" class="waves-effect"><span>
                                    Dashboard </span></a>
                        </li>
                        @if (Auth::user()->is_admin())
                            <li> <a href="{{ route('admin.admins') }}" class="waves-effect"><span> Admins
                                    </span></a> </li>
                            <li> <a href="{{ route('admin.doctors') }}" class="waves-effect"><span> Doctors
                                    </span></a> </li>
                            <li> <a href="{{ route('admin.staffs') }}" class="waves-effect"><span> Staffs
                                    </span></a> </li>
                            <li> <a href="{{ route('admin.branches') }}" class="waves-effect"><span> Branchs
                                    </span></a> </li>
                                    </span></a> </li>


                        @endif
                        @if (Auth::user()->is_staff())

                             <li> <a href="{{ route('staff.patient') }}" class="waves-effect"><span> Petients
                                    </span></a> </li>
                        @endif
                        @if (Auth::user()->is_doctor())
                        <li> <a href="{{route('doctor.dashboard')}}" class="waves-effect"><span> Patients Chart
                               </span></a> </li>
                        @endif

                        <li>

                            <a href="#" class="waves-effect" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span>
                                    Logout </span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">
                    <div class="page-title-box">

                        <div class="row align-items-center ">
                            <div class="col-md-8">
                                <div class="page-title-box">
                                    <h4 class="page-title">{{ ucwords(Request::segment(2, 'Dashboard')) }}</h4>

                                </div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="float-right d-none d-md-block app-datepicker">
                                    <input type="text" class="form-control" data-date-format="MM dd, yyyy" readonly="readonly" id="datepicker">
                                    <i class="mdi mdi-chevron-down mdi-drop"></i>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- end page-title -->

                    @yield('content')

                </div>
                <!-- container-fluid -->

            </div>

            <!-- content -->
        </div>
        <footer class="footer">
            © 2021 Zegva <span class="d-none d-sm-inline-block"> - Made with <i
                    class="mdi mdi-heart text-danger"></i> by Shailesh</span>.
        </footer>

    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('dash') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dash') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dash') }}/js/metismenu.min.js"></script>
    <script src="{{ asset('dash') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('dash') }}/js/waves.min.js"></script>

   

    {{-- <script src="{{ asset('dash') }}/pages/dashboard.init.js"></script> --}}

    <!-- App js -->
    {{-- <script src="{{ asset('dash') }}/js/app.js"></script> --}}
    @stack('js')
</body>

</html>
