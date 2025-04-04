@include('car_rent.partials.dashboard.header')

<body>
  @include('car_rent.components.alert')
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

          @yield('content')

          <!-- Footer -->
          @include('car_rent.partials.dashboard.footer')