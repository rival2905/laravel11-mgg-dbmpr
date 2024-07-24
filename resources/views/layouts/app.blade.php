<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">
  
  <head>
      <title>
        @section('title')
          &mdash; Phoenix Admin
        @show
      </title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      
      @stack('links')
      
    {{-- <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="canonical" href="{{ asset('assets/sidebars.css') }}">
  </head>

  <body>
    <div class=".container-fluid">
      <!-- Content here -->
      <div class="col-12">
        @include('layouts.partials.header') 
      </div>
      <div class="row">
        <div class="col-3" >
          @include('layouts.partials.sidebar')
        </div>
        <div class="col-9" >
          @yield('content')
        </div>
      </div>
      <div class="col-12">
        @include('layouts.partials.footer')
      </div>
      
  
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/sidebars.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      //message with sweetalert
      @if(session('success'))
          Swal.fire({
              icon: "success",
              title: "BERHASIL",
              text: "{{ session('success') }}",
              showConfirmButton: false,
              timer: 2000
          });
      @elseif(session('error'))
          Swal.fire({
              icon: "error",
              title: "GAGAL!",
              text: "{{ session('error') }}",
              showConfirmButton: false,
              timer: 2000
          });
      @endif

  </script>
    @stack('scripts')

    
    
  </body>
</html>

