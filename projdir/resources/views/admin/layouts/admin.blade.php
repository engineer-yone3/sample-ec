<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>{{ $htmlTitle }}</title>
  @yield('js-block')
  @yield('css-block')
</head>
<body>
<div class="row h-100">
  <div class="col col-4 nav-menu w-20">
    <header>
      @include('admin.layouts.nav')
    </header>
  </div>
  <div class="col col-8 w-80">
    <main class="col col-8">
      @yield('pageHeader')
      @yield('mainContents')
    </main>
  </div>
</div>
</body>
</html>
