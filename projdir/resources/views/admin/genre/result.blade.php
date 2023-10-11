@if(empty($records))
  <div>対象のデータはありません</div>
@else
  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ジャンル名</th>
      <th scope="col">登録日時</th>
      <th scope="col">削除</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
      <tr>
        <td><a href="{{ route('admin.genre.edit', $record['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $record['id'] }}</a></td>
        <td>{{ $record['name'] }}</td>
        <td>{{ $record['created_at'] }}</td>
        <td>
          <p>あとで</p>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endif
