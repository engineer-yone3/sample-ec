<div class="card">
  <div class="card-header bg-info">
    検索条件
  </div>
  <ul class="list-group">
    <li class="list-group-item">
      <div class="form-group">
        <label>ジャンル名(部分一致)：</label>
        {{ Form::text('search_name', $search_name, ['placeholder' => '検索したい名前を入力', 'class' => 'form-control']) }}
      </div>
      <div class="mt-3 btn btn-primary">
        {{ Form::submit('検索') }}
      </div>
    </li>
  </ul>
</div>
