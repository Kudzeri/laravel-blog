<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
        </ul>
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="https://avatars.mds.yandex.net/i?id=9dfc25621de6ebe99451412e9dd57189bcb7ffaf6d2d3382-12940477-images-thumbs&n=13" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
