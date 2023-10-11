<div class="mt-3">
  <nav class="text-center">
    <ul>
      <li><div class="menu-home menu-item"><a href="{{ url(route('admin.home')) }}">HOME</a></div></li>
      <li><div class="menu-item"><a href="{{ url(route('admin.admin-users.index')) }}">管理者設定</a></div></li>
      <li><div class="menu-item"><a href="{{ url(route('admin.genre.index')) }}">商品ジャンル管理</a></div></li>
      <li><div class="menu-item"><a href="#">商品管理</a></div></li>
      <li>
        <div>
          <div class="menu-item absolute bottom-1 mb-3 w-full">
            <a href="{{ route('admin.logout') }}" class="anchor-button">ログアウト</a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
</div>


