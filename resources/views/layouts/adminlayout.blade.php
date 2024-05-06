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


  <script src="{{ URL::to('admin/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ URL::to('admin/js/scripts.js') }}"></script>
  <script src="{{ URL::to('admin/js/Chart.min.js') }}" crossorigin=" anonymous"></script>
  <script src="{{ URL::to('admin/assets/demo/chart-area-demo.js') }}"></script>
  <script src="{{ URL::to('admin/assets/demo/chart-bar-demo.js') }}"></script>
  <script src="{{ URL::to('admin/js/simple-datatables.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ URL::to('admin/js/datatables-simple-demo.js') }}"></script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- model for admin user add in database -->

  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Large</button>
  <div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Admin</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="{{ URL::to('registeradmin') }}">
              @csrf
              <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="form-control form-control-solid" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>

              <input type="hidden" name="madeby" value="1">

              <div class="mb-4">
                <label for="exampleFormControlSelect1">User type</label><select class="form-control form-control-solid" name="usertype" id="exampleFormControlSelect1">
                  <option value="0">Master Admin</option>
                  <option value="1">Sub Admin</option>
                  <option value="2">Blogger</option>
                </select>
              </div>

              <!-- Email Address  -->
              <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control form-control-solid" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <!-- Password  -->
              <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="form-control form-control-solid" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <!-- Confirm Password  -->
              <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="form-control form-control-solid" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>

              <div class="mt-4">
                <x-primary-button class="ms-4 btn btn-primary">
                  {{ __('Register') }}
                </x-primary-button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
      </div>
    </div>
  </div>

  @stack('scripts')

</body>

</html>