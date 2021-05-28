<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>

    @yield('lcontent')
    


  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.min.js"><\/script>')</script>
  <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
  <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
  <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
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
  </body>
</html>
