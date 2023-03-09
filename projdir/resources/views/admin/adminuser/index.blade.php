@extends('admin.layouts.admin')
@extends('admin.layouts.admin-header')

@section('mainContents')
  <div id="condition">
    {{ Form::open(['method' => 'GET', 'route' => 'admin-users.index']) }}
    {{ Form::token() }}
    {{ Form::close() }}
  </div>
@endsection
