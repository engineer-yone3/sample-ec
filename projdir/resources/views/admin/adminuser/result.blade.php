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
      <th scope="col">削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
      <tr>
        <td><a href="{{ route('admin.admin-users.edit', $record['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $record['id'] }}</a></td>
        <td>{{ $record['email'] }}</td>
        <td>{{ $record['name'] }}</td>
        <td>{{ $record['created_at'] }}</td>
        <td>{{ ($record['is_publish']) ? '公開' : '非公開' }}</td>
        <td>
          @livewire('delete-confirm-modal', ['target_id' => $record['id'], 'post_route' => 'admin.admin-users.delete', 'target_type' => '管理ユーザー'])
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif
