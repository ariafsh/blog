<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('admin.home') }}" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('post.index') }}" class="nav-link">
                                <p>Post</p>
                            </a>
                        </li>

                        @can('posts.category', Auth::user())
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">
                                    <p>Categories</p>
                                </a>
                            </li>
                        @endcan

                        @can('posts.tag', Auth::user())
                            <li class="nav-item">
                                <a href="{{ route('tag.index') }}" class="nav-link">
                                    <p>Tags</p>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <p>Permissions</p>
                            </a>
                        </li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-primary"><p>Lag Out</p></button>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
