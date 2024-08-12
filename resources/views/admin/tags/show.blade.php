<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5">Tag</h3>
        </div>
        <div class="col-12">
            <a class="btn btn-primary mb-2" href="{{ route('admin.tags.create') }}">Create</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Tag "{{$tag->name}}"</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="col-12">
                <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.tags.index') }}">Back</a>
                <form action="{{route('admin.tags.destroy', $tag)}}" method="post" class="col-12">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger px-5 col-12" type="submit">Delete</button></form>
            </div>
        </div>
</x-admin>
