@extends('admin.layouts.admin')
@extends('admin.layouts.admin-header')

@section('mainContents')
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
  <div id="register" class="mt-5">
    <div>
      <a role="button" href="{{ route('admin.admin-users.create') }}" class="btn btn-primary">新規登録</a>
    </div>
  </div>
  <div id="condition" class="mt-3">
    {{ Form::open(['method' => 'GET', 'route' => 'admin.admin-users.index']) }}
    @include('admin.adminuser.search',
        [
            'search_email' => $data['search_email'] ?? '',
            'search_name' => $data['search_name'] ?? ''
        ]
    )
    {{ Form::token() }}
    {{ Form::close() }}
  </div>
  <div id="result" class="mt-4">
    @include('admin.adminuser.result', ['records' => $data['users']])
  </div>
@endsection
