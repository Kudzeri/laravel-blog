<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ route('admin.index') }}" class="brand-link"> <!--begin::Brand Image-->
            <img src="{{asset('dist/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">Admin Panel</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div>
    <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-circle"></i>
                        <p>Home</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('admin.posts.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-circle"></i>
                        <p>Posts</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-circle"></i>
                        <p>Categories</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('admin.tags.index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-circle"></i>
                        <p>Tags</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('index') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-circle"></i>
                        <p>Back to site</p>
                    </a></li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
