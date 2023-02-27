<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
  <title>{{ $htmlTitle }}</title>
  @yield('js-block')
  @yield('css-block')
</head>
<body>
  <header>
    @include('admin.layouts.nav')
    @yield('pageHeader')
  </header>
  <main>
    @yield('mainContents')
  </main>
</body>
</html>
