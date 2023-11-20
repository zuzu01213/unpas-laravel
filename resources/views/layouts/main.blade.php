<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>WPU Blog | {{ $title }}</title>
</head>
<body>
      @include('partials.navbar')

      <div class="container mt-4">
        @yield('container')
      </div>
      <style>
        a {
            color:  red;
            text-decoration: none
        }
        a:hover {
            color: white
        }
      </style>

</body>
</html>
