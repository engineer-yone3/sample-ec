<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>ログイン</title>
  <style>
    .login-form-container {
      width: 300px;
    }
    .alert-danger p {
      margin-bottom: 0;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container-lg">
  <div class="mt-3">
    <header>
      <div class="text-center">
        <div>Management System</div>
        <div>Login</div>
      </div>
    </header>
    @if($errors->any())
    <div class="alert alert-danger mt-3">
      @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
    @endif
    @if(!empty($infoMessages))
      <div id="message-context" class="mt-3 border rounded-md bg-green-300">
        <ul>
          @foreach($infoMessages as $infoMessage)
            <li>{{ $infoMessage }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <main class="mt-5 container login-form-container w-1/3">
      {{ Form::open(['url' => url(route('admin.login'))]) }}
      {{ Form::token() }}
      <div class="row align-content-center">
        <div class="form-group">
          <label>ログインID</label>
          {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label>パスワード</label>
          {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="mt-2 d-flex align-items-center flex-column">
        <div class="mt-auto">
          {{ Form::submit('ログイン', ['class' => 'bg-blue-500 text-white rounded px-3 py-2 hover:bg-blue-700']) }}
        </div>
      </div>
      {{ Form::close() }}
    </main>
  </div>
</body>
</html>
