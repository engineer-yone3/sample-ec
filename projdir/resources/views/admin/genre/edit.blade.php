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
  {{ Form::open(['method' => 'POST', 'route' => 'admin.genre.update']) }}
  {{ Form::token() }}
  <div class="mt-3">
    <ul>
      <li class="mt-2">
        <label>ジャンル名：</label>
        {{ Form::text('name', $data['name'] ?? null, ['class' => 'form-control']) }}
      </li>
    </ul>
    <div class="mt-3">
      {{ Form::submit('更新', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
    </div>
  </div>
  {{ Form::hidden('genre_id', $id) }}
  {{ Form::close() }}
@endsection
