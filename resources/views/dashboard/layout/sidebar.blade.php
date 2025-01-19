<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/allposts*') ? 'active' : ''}}" href="/dashboard/allposts">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    My posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/allusers*') ? 'active' : ''}}" href="/dashboard/allusers">
                    <span data-feather="users" class="align-text-bottom"></span>
                    List User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <span data-feather="arrow-left" class="align-text-bottom"></span>
                    Back to store
                </a>
            </li>

            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link"><span data-feather="log-out" class="align-text-bottom"></span> Logout </button>
                </form>
            </li>

        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ADMINISTRATOR</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/categories*') ? 'active' : ''}}" href="/dashboard/categories">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Post Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/allposts*') ? 'active' : ''}}" href="/dashboard/allposts">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    All posts
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/allusers*') ? 'active' : ''}}" href="/dashboard/allusers">
                    <span data-feather="user" class="align-text-bottom"></span>
                    All users
                </a>
            </li>

        </ul>
        @endcan
    </div>
</nav>