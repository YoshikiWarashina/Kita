<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center" style="text-decoration: none;">
        <span class="brand-text font-weight-light text-white">Kita</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-header text-white">MENU</li>
                <li class="nav-item">
                    <a href="{{ route('admin_users.index') }}" class="nav-link text-white">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>管理者管理</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.index') }}" class="nav-link text-white">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>会員管理</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tag.index') }}" class="nav-link text-white">
                        <i class="nav-icon fa-solid fa-tag"></i>
                        <p>タグ管理</p>
                    </a>
                </li>
                <li class="nav-item">
                    {!! Form::open(['route' => 'admin/logout', 'method' => 'POST']) !!}
                    {!! csrf_field() !!} <!-- CSRF トークンを追加 -->
                    <button type="submit" class="btn-link nav-link text-white text-start">
                        <i class="nav-icon fa-solid fa-door-open"></i>
                        <p>ログアウト</p>
                    </button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </nav>
    </div>
</aside>
