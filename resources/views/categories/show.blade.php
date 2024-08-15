<x-index-app>
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{$category->name}}</h1>

            <div class="row">
                <div class="col-md-12">
                    <section>
                        @foreach ($posts->chunk(3) as $postChunk)
                            <div class="row blog-post-row">
                                @foreach ($postChunk as $post)
                                    <div class="col-md-4 blog-post aos-init aos-animate" data-aos="fade-up">
                                        <div class="blog-post-thumbnail-wrapper">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="blog post">
                                            @else
                                                <div class="no-image-placeholder">
                                                    <img src="{{ asset('storage/images/noimage.jpg') }}" alt="blog post">
                                                </div>
                                            @endif
                                        </div>
                                        <p class="blog-post-category">| {{ $post->category->name ?? 'Uncategorized' }} | {{$post->author->name}} | {{$post->createdDate()->diffForHumans()}}</p>
                                        <a href="{{ route('posts.show', $post) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                        <span class="like-count mr-3">{{ $post->likes->count() }} likes</span>

                                        @auth
                                            @php
                                                $userLiked = $post->likes->contains('user_id', auth()->id());
                                            @endphp

                                            @if($userLiked)
                                                <form action="{{ route('posts.unlike', $post) }}" method="POST" class="mr-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Unlike</button>
                                                </form>
                                            @else
                                                <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Like</button>
                                                </form>
                                            @endif
                                        @endauth

                                        @guest
                                            <p class="text-muted">Please <a href="{{ route('login') }}">log in</a> to like this post.</p>
                                        @endguest
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        {{$posts->links('components.pagination')}}
                    </section>
                </div>
            </div>
            <a class="btn btn-warning mb-2 px-5 col-12 text-white" href="{{route('categories.index')}}">Back</a>
        </div>

    </main>
</x-index-app>
