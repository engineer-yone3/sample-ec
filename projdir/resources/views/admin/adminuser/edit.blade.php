@extends('admin.layouts.admin')
@extends('admin.layouts.admin-header')

@section('mainContents')
  @php
    $id = $data['id'] ?? null;
  @endphp
  @if(!empty($errors->all()))
    <div id="message-context" class="mt-3 border rounded-md bg-red-200">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(!empty($errorMessages))
    <div id="message-context" class="mt-3 border rounded-md bg-red-300">
      <ul>
        @foreach($errorMessages as $errorMessage)
          <li>{{ $errorMessage }}</li>
        @endforeach
      </ul>
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
  {{ Form::open(['method' => 'POST', 'route' => 'admin.admin-users.update']) }}
  {{ Form::token() }}
  <div class="mt-3">
    <ul>
      <li>
        <label>ログインID：</label>
        {{ Form::text('email', $data['email'] ?? null, ['class' => 'form-control']) }}
      </li>
      <li class="mt-2">
        <label>氏名：</label>
        {{ Form::text('name', $data['name'] ?? null, ['class' => 'form-control']) }}
      </li>
      <li class="mt-2">
        <label>パスワード：</label>
        {{ Form::password('password', ['class' => 'form-control']) }}
      </li>
      <li class="mt-2">
        <label>パスワード(確認入力)：</label>
        {{ Form::password('password_confirm', ['class' => 'form-control']) }}
      </li>
      <li class="mt-2 w-64">
        <label>公開状態：</label>
        <div class="relative">
          {{ Form::select('is_publish', [0 => '非公開', 1 => '公開'], is_null($id) ? 1 : $data['is_publish'], ['class' => 'block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-700 focus:border-gray-500']) }}
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>

      </li>
    </ul>
    <div class="mt-3">
      {{ Form::submit('更新', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
    </div>
  </div>
  {{ Form::hidden('user_id', $id) }}
  {{ Form::close() }}
@endsection
