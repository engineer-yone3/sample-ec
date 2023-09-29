@if(empty($records))
  <div>対象のデータはありません</div>
@else
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ログインID</th>
      <th scope="col">氏名</th>
      <th scope="col">登録日時</th>
      <th scope="col">公開状態</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
      <tr>
        <td>{{ $record['id'] }}</td>
        <td>{{ $record['email'] }}</td>
        <td>{{ $record['name'] }}</td>
        <td>{{ $record['created_at'] }}</td>
        <td>{{ ($record['is_publish']) ? '有効' : '無効' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif
