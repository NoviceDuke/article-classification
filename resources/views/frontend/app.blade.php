<!DOCTYPE html>
<html>
  <head>
    {!! Html::style(url('css/app.css'))!!}
    {!! Html::script(url('js/app.js'))!!}
    <meta charset="utf-8"/>
  </head>
<body>
  @section('topbar')
  @show
  <div class="container">
    @yield('content')
  </div>
  @include('site.footbar')
</body>
</html>
