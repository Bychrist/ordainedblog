{{-- The head goes here --}}
@include('admin.includes.admin_head')

{{-- /The head goes here --}}

<body>

    <div id="wrapper">

       {{-- The navigation goes here --}}
          @if(Auth::user()->admin)

            @include('admin.includes.admin_navigation')

          @else

            @include('admin.includes.user_navigation')

          @endif
       {{-- /The navigation goes here --}}
       

        <div id="page-wrapper">

            <div class="container-fluid">

              @yield('content')

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{-- The footer goes here --}}
        @include('admin.includes.admin_footer')
    {{-- /The footer goes here --}}

    

</body>

</html>
