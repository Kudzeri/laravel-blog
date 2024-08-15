<x-profile-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('My Comments') }}
                    </div>

                    <div class="card-body">
                        @if ($comments->count())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Commented At</th>
                                    <th>Comment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ Str::limit($comment->post->title,50) }}</td>
                                        <td>{{ $comment->post->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ Str::limit($comment->body,25) }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $comment->post) }}" class="btn btn-info btn-sm">View</a>
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
                                {{ $comments->links('components.pagination') }}
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
