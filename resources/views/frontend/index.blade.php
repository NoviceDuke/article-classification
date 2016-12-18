<html>
<head>
  {!! Html::style(url('css/app.css'))!!}
  {!! Html::script(url('js/app.js'))!!}
  <style>

        @font-face {
            font-family: 'shigon';
            src: url('{{asset('fonts/chu6.tte')}}'),url('{{asset('fonts/chucdpeudpn6.tbl')}}') ,
            url('{{asset('fonts/chueudccjn6.tbl')}}')
             
        }
        .title {} body {
            font-family: 'shigon';
        }
        .ch {
            font-family: 'shigon';
        }

    </style>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>

</body>
</html>
