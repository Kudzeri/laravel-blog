<x-admin>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-5 mx-4">Post</h3>
        </div>
        <div class="col-12">
            <a class="btn btn-warning mb-2 mx-auto col-12" href="{{ route('admin.posts.index') }}">Back</a>
        </div>
        <div class="card card-primary card-outline mb-4 col-6 mx-auto"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">{{ $post->exists ? 'Update' : 'Create' }} Post</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="post"> <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Title</label> <input value="{{ old('name', $post->title) }}"  name="title" type="text" class="form-control"> </div>
                    <div class="input-group"> <span class="input-group-text">Content</span> <textarea name="content" class="form-control" aria-label="With textarea">{{ old('name', $post->content) }}</textarea> </div>
                    <div class="col-md-6"> <label for="validationCustom04" class="form-label">Category</label> <select name="category_id"  class="form-select">
                            <option value="">No Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', optional($post->category)->id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid category.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <select multiple class="form-select" id="tags" name="tags[]">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    @if($post->exists)
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
