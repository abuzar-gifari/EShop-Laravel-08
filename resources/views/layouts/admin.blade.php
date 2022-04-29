
{{-- ADMIN MASTER BLADE FILE --}}

@include('layouts.inc.admin_header')

<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.inc.admin_sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    @include('layouts.inc.admin_nav')

    <div class="container-fluid py-4">
      
      
        @yield('content')


        @include('layouts.inc.admin_footer')
    
    
    </div>
  </main>

@include('layouts.inc.admin_script')
