<html>
<head>
  {!! Html::style(url('css/app.css'))!!}
  {!! Html::script(url('js/app.js'))!!}
  <style>

        @font-face {
            font-family: 'shigon';
            src: url('fonts/chu6.tte'), url('fonts/chucdpeudpn6.tbl'), url('fonts/chueudccjn6.tbl')
        }
        .title {} body {
            font-family: 'shigon';
        }
        #text {
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
