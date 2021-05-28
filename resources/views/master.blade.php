<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('app.name')}}</title>

        <!-- Styles -->

        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <link rel="stylesheet" href="{{mix('/css/toastr.css')}}">
        <link rel="stylesheet" href="{{mix('/css/blog.css')}}">

    </head>
    
    <body>

        <div class="container" id="app">
          
            @include('partials.nav-bar')

            {{-- @includeWhen(request()->is('/'),'partials.jumbotron')   --}}

        </div>
    
        <main role="main" class="container">
          <div class="row">
            <div class="col-md-8 blog-main">
              
                @yield('content')
    
            </div><!-- /.blog-main -->
    
            @include('partials.sidebar')
    
          </div><!-- /.row -->
    
        </main><!-- /.container -->
    
        @include('partials.footer')

        <script src="{{mix('js/app.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        @if(Session::has('success'))
        <script>
            toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "timeOut": "3000",
                    }
            toastr["success"]("{{Session::get('success')}}", "KlassrooM")
        </script>
        @endif

        @if(Session::has('error'))
        <script>
            toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "timeOut": "3000",
                    }
            toastr["error"]("{{Session::get('error')}}", "KlassrooM")
        </script>
        @endif

        <script>
          Echo.private('post-created')
            .listen('PostCreated', (e) => {
                $.notify(e.post.title + " has been published now.");
            });
        </script>
      </body>
    </html>