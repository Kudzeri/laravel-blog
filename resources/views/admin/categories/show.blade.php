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
                <h3 class="card-title">Category "{{$category->name}}"</h3>
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
                        <tr class="align-middle">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts()->count()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="col-12">
                <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.categories.index') }}">Back</a>
                <form action="{{route('admin.categories.destroy', $category)}}" method="post" class="col-12">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger px-5 col-12" type="submit">Delete</button></form>
            </div>
        </div>
</x-admin>
