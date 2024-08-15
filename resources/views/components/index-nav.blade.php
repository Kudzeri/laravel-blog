<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{route('index')}}"><img src="http://127.0.0.1:8000/assets/images/logo.svg" alt="Edica"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="edicaMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>

                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="flag-icon flag-icon-squared rounded-circle flag-icon-gb"></span> Eng</a>
                </li>
                @can('viewAdminDashboard', Auth::user())
                    <a href="{{ route('admin.index') }}" class="btn btn-primary">Admin Dashboard</a>
                @endcan
            @auth
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.index') }}" class="btn btn-primary">Admin Panel</a>
                        @endif
                        <a href="{{ route('home') }}" class="btn btn-success mx-2">Profile</a>
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary mx-2">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-success">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>
</div>
