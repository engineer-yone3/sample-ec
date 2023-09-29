@extends('admin.layouts.admin')
@extends('admin.layouts.admin-header')

@section('mainContents')
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
