<x-index-app>
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"> • Created at: {{ $post->createdDate() }} • </p>
            <section class="blog-post-featured-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <img src="@if($post->image == '') {{ asset('storage/images/noimage.jpg') }} @else {{ asset('storage/' . $post->image) }} @endif" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto aos-init aos-animate" data-aos="fade-up">
                        <p class="text-break">{{$post->content}}</p>
                    </div>
                </div>
                <div class="mx-auto">
                    <span class="like-count mr-3">{{ $post->likes->count() }} likes</span>

                    @auth
                        @php
                            $userLiked = $post->likes->contains('user_id', auth()->id());
                        @endphp

                        @if($userLiked)
                            <form action="{{ route('posts.unlike', $post) }}" method="POST" class="mr-2 mx-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Unlike</button>
                            </form>
                        @else
                            <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-2 mx-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Like</button>
                            </form>
                        @endif
                    @endauth

                    @guest
                        <p class="text-muted">Please <a href="{{ route('login') }}">log in</a> to like this post.</p>
                    @endguest
                </div>
                <a class="btn btn-warning mb-2 px-5 col-12 text-white" href="{{route('index')}}">Back</a>
            </section>

        </div>
    </main>
</x-index-app>
