<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5">Category</h3>
        </div>
        <div class="col-12">
            <a class="btn btn-primary mb-2" href="{{ route('admin.categories.create') }}">Create</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th style="width: 10px">Posts</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="align-middle">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts()->count()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $categories->links('components.pagination') }}
            </div>
        </div>
</x-admin>
