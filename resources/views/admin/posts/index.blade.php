<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5">Post</h3>
        </div>
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @if(session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
            <a class="btn btn-primary mb-2" href="{{ route('admin.posts.create') }}">Create</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th style="width: 10px">Created at</th>
                        <th class="col-2">Links</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="align-middle">
                            <td>{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}</td>
                            <td>{{ucfirst($post->title)}}</td>
                            <td>{{Str::limit($post->content, 60)}}</td>
                            <td>{{ $post->createdDate() }}</td>
                            <td class="col-2">
                                <a class="btn btn-success mb-2 px-5" href="{{ route('admin.posts.show', $post) }}">Show</a>
                                <a class="btn btn-warning mb-2 px-5" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger px-5" type="submit">Delete</button></form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $posts->links('components.pagination') }}
            </div>
            <div class="col-12">
                <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>
</x-admin>
