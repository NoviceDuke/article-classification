<html>
<head>
  {!! Html::style(url('css/app.css'))!!}
  {!! Html::script(url('js/app.js'))!!}
</head>
<body>
  <div class="container">
    @yield('content')
  </div>

</body>
</html>
