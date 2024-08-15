<x-profile-app>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card profile-card mx-auto my-4" style="max-width: 500px;">
        <div class="card-header text-center">
            @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            @else
                <img src="https://avatars.mds.yandex.net/i?id=9dfc25621de6ebe99451412e9dd57189bcb7ffaf6d2d3382-12940477-images-thumbs&n=13" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
            <h4 class="mt-3">{{ mb_strtoupper($user->name) }}</h4>
            <p class="text-muted">{{ $user->email }}</p>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">Posts: {{ $user->posts->count() }}</li>
                <li class="list-group-item">Joined: {{ $user->created_at->format('F j, Y') }}</li>
            </ul>
            <div class="text-center mt-3">
                <a href="{{route('profile.edit')}}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>

</x-profile-app>
