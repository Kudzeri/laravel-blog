<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendors/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendors/aos/aos.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/style.css">
    <script src="http://127.0.0.1:8000/assets/vendors/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/loader.js"></script>
</head>
<body data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
<div class="edica-loader" style="display: none;"></div>
<header class="edica-header">
    <x-index-nav></x-index-nav>
</header>

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">Blog</h1>

        <div class="row">
            <div class="col-md-12">
                <section>
                    @foreach ($posts->chunk(2) as $postChunk)
                        <div class="row blog-post-row">
                            @foreach ($postChunk as $post)
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
                    @endforeach
                </section>
            </div>
        </div>

    </div>

</main>


<section class="edica-footer-banner-section">
    <div class="container">
        <div class="footer-banner aos-init" data-aos="fade-up">
            <h1 class="banner-title">Download it now.</h1>
            <div class="banner-btns-wrapper">
                <button class="btn btn-success"> <img src="http://127.0.0.1:8000/assets/images/apple@1x.svg" alt="ios" class="mr-2"> App Store</button>
                <button class="btn btn-success"> <img src="http://127.0.0.1:8000/assets/images/android@1x.svg" alt="android" class="mr-2"> Google Play</button>
            </div>
            <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or service.</p>
        </div>
    </div>
</section>
<footer class="edica-footer aos-init" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <a href="index.html" class="footer-brand-wrapper">
                    <img src="http://127.0.0.1:8000/assets/images/logo.svg" alt="edica logo">
                </a>
                <p class="contact-details">hello@edica.com</p>
                <p class="contact-details">+23 3000 000 00</p>
                <nav class="footer-social-links">
                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!"><i class="fab fa-twitter"></i></a>
                    <a href="#!"><i class="fab fa-behance"></i></a>
                    <a href="#!"><i class="fab fa-dribbble"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">Company</a>
                    <a href="#!" class="nav-link">Android App</a>
                    <a href="#!" class="nav-link">ios App</a>
                    <a href="#!" class="nav-link">Blog</a>
                    <a href="#!" class="nav-link">Partners</a>
                    <a href="#!" class="nav-link">Careers</a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">FAQ</a>
                    <a href="#!" class="nav-link">Reporting</a>
                    <a href="#!" class="nav-link">Block Storage</a>
                    <a href="#!" class="nav-link">Tools &amp; Integrations</a>
                    <a href="#!" class="nav-link">API</a>
                    <a href="#!" class="nav-link">Pricing</a>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="dropdown footer-country-dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-gb flag-icon-squared"></span> United Kingdom <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-us flag-icon-squared"></span> United States
                        </button>
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-au flag-icon-squared"></span> Australia
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-content">
            <nav class="nav footer-bottom-nav">
                <a href="#!">Privacy &amp; Policy</a>
                <a href="#!">Terms</a>
                <a href="#!">Site Map</a>
            </nav>
            <p class="mb-0">© Edica. 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">bootstrapdash</a> . All rights reserved.</p>
        </div>
    </div>
</footer>
<script src="http://127.0.0.1:8000/assets/vendors/popper.js/popper.min.js"></script>
<script src="http://127.0.0.1:8000/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="http://127.0.0.1:8000/assets/vendors/aos/aos.js"></script>
<script src="http://127.0.0.1:8000/assets/js/main.js"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>




</body></html>
