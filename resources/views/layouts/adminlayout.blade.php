<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- Title -->
  <title>{{ env('APP_NAME') }}</title>
  <i rel="icon" class="fa fa-hand-paper-o" aria-hidden="true"></i>
  <link href="{{ URL::to('admin/css/style.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::to('admin/css/styles.css') }}" rel="stylesheet" />
  <script src="{{ URL::to('admin/js/fontawesomeall.js') }}" crossorigin="anonymous"></script>
  <link rel="icon" class="fa fa-hand-paper-o" href="fa fa-hand-paper-o" type="image/icon type">

  <!-- Datetime -->


  <!-- not needed now -->
  <!-- Popperjs -->
  <script src="{{ URL::to('admin/js/popper.min.js') }}" crossorigin="anonymous"></script>
  <!-- Tempus Dominus JavaScript -->
  <script src="{{ URL::to('admin/js/tempus-dominus.min.js') }}" crossorigin="anonymous"></script>
  <!-- Tempus Dominus Styles -->
  <link href="{{ URL::to('admin/css/tempus-dominus.min.css') }}" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">

  @stack('style')

  <style type="text/css">
    from .dropdown-item {
      display: block;
      width: 100%;
      padding: var(--bs-dropdown-item-padding-y) var(--bs-dropdown-item-padding-x);
      clear: both;
      font-weight: 400;
      color: var(--bs-dropdown-link-color);
      text-align: inherit;
      text-decoration: none;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }

    table.servicetable tbody td {
      word-break: break-word !important;
      vertical-align: top !important;
      width: 20%;
    }


    table.servicetable tbody td a {
      margin: 10px !important;
    }
  </style>
  @include('element.adminheader')
  <div id="layoutSidenav">

    @include('element.adminsidebar')

    <div id="layoutSidenav_content">
      <!-- Main content -->
      @yield('content')
      @include('element.adminfooter')
    </div>
  </div>
  <!-- End of Main Content -->

  <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
  <script src="{{ URL::to('admin/js/jquery.min.js') }}"></script>
  <script src="{{ URL::to('admin/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ URL::to('admin/js/scripts.js') }}"></script>
  <script src="{{ URL::to('admin/js/Chart.min.js') }}" crossorigin=" anonymous"></script>
  <script src="{{ URL::to('admin/assets/demo/chart-area-demo.js') }}"></script>
  <script src="{{ URL::to('admin/assets/demo/chart-bar-demo.js') }}"></script>
  <script src="{{ URL::to('admin/js/simple-datatables.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ URL::to('admin/js/datatables-simple-demo.js') }}"></script>
  <script src="{{ URL::to('admin/js/datatables-simple-demo.js') }}"></script>
  <script src="{{ URL::to('admin/js/bootbox.min.js') }}"></script>
  <script src="{{ URL::to('admin/js/bootbox.js') }}"></script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  @include('element.modal')

  @stack('scripts')
  @include('element.jqueryscripts')

</body>

</html>