<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5">Category</h3>
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
            <a class="btn btn-primary mb-2" href="{{ route('admin.categories.create') }}">Create</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th style="width: 10px">Posts</th>
                        <th class="col-2">Links</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="align-middle">
                            <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts()->count()}}</td>
                            <td class="col-2">
                                <a class="btn btn-success mb-2 px-5" href="{{ route('admin.categories.show', $category) }}">Show</a>
                                <a class="btn btn-warning mb-2 px-5" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                <form action="{{route('admin.categories.destroy', $category)}}" method="post">
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
                {{ $categories->links('components.pagination') }}
            </div>
            <div class="col-12">
                <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>
</x-admin>
