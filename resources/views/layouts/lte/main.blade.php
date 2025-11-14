<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
 @include('layouts.lte.head')
<!-- end::Head -->
<!-- begin::Body -->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- begin::Navbar -->
        @include('layouts.lte.navbar')
        <!-- end::Navbar -->
         <!-- begin::Sidebar -->
        @include('layouts.lte.sidebar')
        <!-- end::Sidebar -->
         <!-- begin::main -->
          <main class="app-main">
            @yield('content')
          </main>
            <!-- end::main -->

        <!-- begin::Footer -->
        @include('layouts.lte.footer')
        <!-- end::Footer -->
    </div>
    <!-- begin::Required JS Scripts-->