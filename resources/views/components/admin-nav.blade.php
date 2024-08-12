<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
        </ul>
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="https://avatars.mds.yandex.net/i?id=33cf8b8f5c72c3a276d2e36f86728d4b051dd881-4935624-images-thumbs&n=13" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
