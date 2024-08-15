<x-index-app>
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{$category->name}}</h1>

            <div class="row">
                <div class="col-md-12">
                    <section>
                            <div class="row blog-post-row">
                                @foreach ($posts as $post)
                                    <div class="col-md-6 blog-post aos-init aos-animate" data-aos="fade-up">
                                        <div class="blog-post-thumbnail-wrapper">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="blog post">
                                            @else
                                                <div class="no-image-placeholder">
                                                    <img src="{{ asset('storage/images/noimage.jpg') }}" alt="blog post">
                                                </div>
                                            @endif
                                        </div>
                                        <p class="blog-post-category">{{ $post->category->name ?? 'Uncategorized' }}</p>
                                        <a href="{{ route('posts.show', $post) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        {{$posts->links('components.pagination')}}
                    </section>
                </div>
            </div>
            <a class="btn btn-warning mb-2 px-5 col-12 text-white" href="{{route('categories.index')}}">Back</a>
        </div>

    </main>
</x-index-app>
