<x-admin>
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-sm-6">
            <h3 class="mb-5">Post</h3>
        </div>
        <div class="col-12">
            <a class="btn btn-primary mb-2" href="{{ route('admin.posts.create') }}">Create</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Post "{{$post->title}}"</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="align-middle">
                        <td>{{ucfirst($post->title)}}</td>
                        <td>{{Str::limit($post->content, 60)}}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-thumbnail" width="100">
                            @else
                                <img src="{{ asset('storage/images/noimage.jpg') }}" alt="Image" class="img-thumbnail" width="100">
                            @endif
                        </td>
                        <td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $post->createdDate() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="col-12">
                <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                <form action="{{route('admin.posts.destroy', $post)}}" method="post" class="col-12">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger px-5 col-12" type="submit">Delete</button></form>
                <a class="btn btn-primary mt-2 mx-auto col-12" href="{{ route('admin.posts.index') }}">Back</a>
            </div>
        </div>
</x-admin>
