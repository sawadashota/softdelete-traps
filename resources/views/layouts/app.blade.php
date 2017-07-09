<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <title>{{ config('app.name') }}</title>
  <style>
    .header{padding: 20px 0; border-bottom: 1px solid #ccc; margin-bottom: 40px;}
    h4{ margin-bottom: 20px;}
    .row{margin-bottom: 40px;}
    .deleted{font-weight: bold; color: #f00;}
    .error{ color: #f00 !important;}
  </style>
</head>
<body>

<div class="container">

  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right">
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="{{ route('countries.create') }}">Create Country</a>
        </li>
      </ul>
    </nav>
    <h3 class="text-muted"><a href="{{ route('countries.index') }}">{{ config('app.name') }}</a></h3>
  </div>

  @yield('content')

</div><!-- /.container -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
</body>
</html>