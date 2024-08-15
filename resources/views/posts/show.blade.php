<x-index-app>
    <main class="blog-post">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

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
            @auth()
                <section class="comment-section">
                    <h2 class="section-title mb-5 aos-init aos-animate" data-aos="fade-up">Leave a Reply</h2>
                    <form action="{{route('comments.store',$post)}}" method="post">
                        <div class="row">
                            <div class="form-group col-12 aos-init aos-animate" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="body" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                @csrf
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 aos-init aos-animate" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                    @endauth
                    <div class="comments mt-5">
                        <h4>Comments</h4>

                        @forelse($post->comments as $comment)
                            <div class="mb-3">
                                <strong>{{ $comment->user->name }}</strong>
                                <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                <p>{{ $comment->body }}</p>
                            </div>
                        @empty
                            <p>No comments yet.</p>
                    @endforelse
                        @guest
                            <p class="text-muted">Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
                    @endguest
                </section>
        </div>
    </main>
</x-index-app>
