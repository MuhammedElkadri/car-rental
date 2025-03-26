@include('car_rent.partials.dashboard.header')

<body>
  
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      @include('car_rent.partials.dashboard.aside')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('car_rent.partials.dashboard.navbar')


        <!-- Content wrapper -->
        <div class="content-wrapper">
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif
          
          @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif
          @yield('content')

          <!-- Footer -->
          @include('car_rent.partials.dashboard.footer')