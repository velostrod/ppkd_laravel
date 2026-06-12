<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src={{ asset('template/dist/assets/images/logo/logo.png') }} alt="Logo"
                        srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Master Data</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('key.index') }}">Key </a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('major.index') }}">Major Management</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>User Management</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('user.index') }}">Data User</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('user.create') }}">Create User</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('role.index') }}">Role</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('role.create') }}">Create Role</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('menu.index') }}">Menu</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">Forms &amp; Tables</li>


            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Student Management</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('student.index') }}">Student</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-egg-fill"></i>
                    <span>Instructor Management</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('instructor.index') }}">Instructor </a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-item">
                <form action="{{ route('action-logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-danger rounded-2">Sign Out</button>
                </form>

            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
