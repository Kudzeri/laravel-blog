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

                <a class="btn btn-warning mb-2 px-5 col-12 text-white" href="{{route('index')}}">Back</a>
            </section>

        </div>
    </main>
</x-index-app>
