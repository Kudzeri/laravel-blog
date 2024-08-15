<x-profile-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('My Posts') }}
                    </div>

                    <div class="card-body">
                        @if ($posts->count())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Comments</th>
                                    <th>Likes</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $post->comments->count() }}</td>
                                        <td>{{ $post->likes->count() }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>
{{--                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $posts->links('components.pagination') }}
                            </div>
                        @else
                            <p class="text-muted">No posts found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-profile-app>
