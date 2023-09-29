@section('pageHeader')
  @if(!empty($subTitle))
    <div class="pageTitle">
      <h2 class="inline">{{ $headerTitle }}</h2>
      <h3 class="ml-3 text-black inline text-2xl">{{ $subTitle }}</h3>
    </div>
  @else
    <div class="pageTitle">
      <h2>{{ $headerTitle }}</h2>
    </div>
  @endif
@endsection
