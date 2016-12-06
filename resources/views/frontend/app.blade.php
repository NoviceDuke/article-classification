<!DOCTYPE html>
<html>
  <head>
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
