<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li>
            <a href="{{route("home")}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
        </li>
        @if (Auth::user()->type == 1)
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Kategori</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('category.index')}}">List Kategori</a></li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->type)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tags</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('tag.index')}}">List Tags</a></li>
                </ul>
            </li>
        @endif
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('post.index')}}">List Post</a></li>
            <li><a class="nav-link" href="{{route('post.recycle')}}">Recycle</a></li>
            </ul>
        </li>
        @if (Auth::user()->type == 1)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('user.index')}}">List User</a></li>
                </ul>
            </li>
        @endif
        </ul>
    </aside>
</div>