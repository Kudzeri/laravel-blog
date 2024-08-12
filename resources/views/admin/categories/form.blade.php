<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5 mx-4">Category</h3>
        </div>
        <div class="col-12">
            <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.categories.index') }}">Back</a>
        </div>
        <div class="card card-primary card-outline mb-4 col-6 mx-auto"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">{{ $category->exists ? 'Update' : 'Create' }} Category</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="post"> <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Name</label> <input value="{{ old('name', $category->name) }}"  name="name" type="text" class="form-control"> </div>
                    @csrf
                    @if($category->exists)
                        @method('PUT')
                    @endif
                </div> <!--end::Body--> <!--begin::Footer-->
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button></div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-admin>
