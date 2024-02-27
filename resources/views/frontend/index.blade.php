@extends('frontend_layout.master')
@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">

                    @if (isset($Sliderblogs) && count($blogs) > 0)
                        @foreach ($Sliderblogs as $blog)
                            @php
                                $categoryIds = explode(',', $blog->category_id);
                                $categoriesId = [];

                                foreach ($categoryIds as $categoryId) {
                                    $category = getCategoryName($categoryId);
                                    if ($category) {
                                        $categoriesId[] = $category;
                                    }
                                }
                                $firstCategory = count($categoriesId) > 0 ? $categoriesId[0] : '';

                                $categoryNames = $firstCategory;

                            @endphp

                            <div class="position-relative overflow-hidden" style="height: 500px;">
                                <img class="img-fluid h-100" src="{{ asset('image/' . $blog->thumbnail) }}"
                                    style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $categoryNames }}</a>
                                        <a class="text-white" href="">{{ $blog->created_at->format('M d, Y') }}</a>
                                    </div>
                                    <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                        href="{{ route('BlogDetail', ['custom_url' => $blog->custom_url]) }}">{{ \Illuminate\Support\Str::limit($blog->title) . '...' }}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">

                    @if (isset($Sliderblogs) && count($blogs) > 0)
                        @foreach ($slider as $sliders)
                            <div class="col-md-6 px-0">
                                <div class="position-relative overflow-hidden" style="height: 250px;">
                                    <img class="img-fluid w-100 h-100" src="{{ asset('image/' . $sliders->thumbnail) }}"
                                        style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="">{{ getCategoryName($sliders->category_id) }}</a>
                                            <a class="text-white"
                                                href=""><small>{{ $sliders->created_at->format('M d, Y') }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                            href="{{ route('BlogDetail', ['custom_url' => $sliders->custom_url]) }}">{{ \Illuminate\Support\Str::limit($sliders->title, 20) . '...' }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->

    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;"> Latest
                            Blog</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @if (isset($blogs) && count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold"
                                            href="{{ route('BlogDetail', ['custom_url' => $blog->custom_url]) }}">{{ \Illuminate\Support\Str::limit($blog->title) }}</a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->

    <div class="container-fluid pt-5 mb-3">
        <div class="container">

            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured articles</h4>
            </div>

            <div class="owl-carousel news-carousel carousel-item-4 position-relative">

                @if (isset($featuredBlogs) && count($blogs) > 0)
                    @foreach ($featuredBlogs as $blog)
                        @php
                            $categoryIds = explode(',', $blog->category_id);
                            $categoriesId = [];

                            foreach ($categoryIds as $categoryId) {
                                $category = getCategoryName($categoryId);
                                if ($category) {
                                    $categoriesId[] = $category;
                                }
                            }
                            $firstCategory = count($categoriesId) > 0 ? $categoriesId[0] : '';

                            $categoryNames = $firstCategory;

                        @endphp

                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid h-100" src="{{ asset('image/' . $blog->thumbnail) }}"
                                style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a
                                        class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">{{ $categoryNames }}</a><br>
                                    <a class="text-white"
                                        href=""><small>{{ $blog->created_at->format('M d, Y') }}</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ route('BlogDetail', ['custom_url' => $blog->custom_url]) }}">
                                    {{ \Illuminate\Support\Str::limit($blog->title, 20) . '...' }}
                                    <!-- Adjust the character limit as needed -->
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">

                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest Articles</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>

                        </div>

                        @if (isset($latestBlogs) && count($blogs) > 0)
                            @foreach ($latestBlogs as $blog)
                                @php
                                    $categoryIds = explode(',', $blog->category_id);
                                    $categoriesId = [];

                                    foreach ($categoryIds as $categoryId) {
                                        $category = getCategoryName($categoryId);
                                        if ($category) {
                                            $categoriesId[] = $category;
                                        }
                                    }
                                    $firstCategory = count($categoriesId) > 0 ? $categoriesId[0] : '';

                                    $categoryNames = $firstCategory;

                                @endphp

                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img style="height: 300px;" class="w-100"
                                            src="{{ asset('image/' . $blog->thumbnail) }}" style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">{{ $categoryNames }}</a>
                                                <a class="text-body"
                                                    href=""><small>{{ $blog->created_at->format('M d, Y') }}</small></a>
                                            </div>
                                            <a class="h6 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                                href="{{ route('BlogDetail', ['custom_url' => $blog->custom_url]) }}">{{ \Illuminate\Support\Str::limit($blog->title) . '...' }}</a>
                                            <p class="m-0">
                                                {{ \Illuminate\Support\Str::limit($blog->meta_description, 50) . '...' }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle mr-2"
                                                    src="{{ asset('frontend/img/admin.svg') }}" width="25"
                                                    height="25" alt="">

                                                @if ($blog->written_by && $blog->writers->isNotEmpty())
                                                    @php
                                                        $firstWriter = $blog->writers->first();
                                                    @endphp

                                                    <a href="{{ $firstWriter->url }}"> <small>by
                                                            <strong>{{ $firstWriter->user_name }}</strong></small> </a>
                                                @else
                                                    <small>By <strong>MMTS</strong></small>
                                                @endif

                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="ml-3"><i
                                                        class="far fa-eye mr-2"></i>{{ $blog->count }}</small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="col-lg-12 mb-3">
                            <a href=""><iframe src="https://fiverr.ck-cdn.com/tn/serve/geoGroup/?rgid=2&bta=848997"
                                    width="970" height="250" frameborder="0" scrolling="no"></iframe></a>
                        </div>


                    </div>


                </div>

                <div class="col-lg-4">

                    <!-- Social Follow Start -->
                    <div class="mb-3">

                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Me</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center" style="flex-direction: column;">
                                <img class="rounded-circle mr-5 ml-5" src="{{ asset('/frontend\img\diluu2.png') }}"
                                    width="150px" height="150px" style="object-fit:cover; border:4px solid #FFCC00"
                                    alt="">
                                <p class="text-dark mr-5 ml-5 "><i class="mr-4 ml-5"><u><strong>Dr Dilshad Ali
                                                PT</strong></u></i></p>

                            </div>
                            <a href="https://www.linkedin.com/in/dr-dilshad-ali-pt-9135a4163?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                                target="_blank" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">LinkedIn</span>
                            </a>
                            <a href="" target="_blank" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Twitter</span>
                            </a>
                            <a href="https://web.facebook.com/medtalkzz?mibextid=LQQJ4d&_rdc=1&_rdr" target="_blank"
                                class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Facebook</span>
                            </a>
                            <a href="" target="_blank" class="d-block w-100 text-white text-decoration-none mb-3"
                                style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Instagram</span>
                            </a>
                            <a href="https://www.youtube.com/@drdilshadali" target="_blank"
                                class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3"
                                    style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Youtube</span>
                            </a>

                        </div>
                    </div>

                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="https://go.fiverr.com/visit/?bta=848997&nci=14169" rel="sponsored"
                                Target="_Top"><img src="https://fiverr.ck-cdn.com/tn/serve/?cid=29121959" width="300"
                                    height="250"></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach ($trending as $tranding)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" style="width: 110px; height: 110px;"
                                        src="{{ asset('image/' . $tranding->thumbnail) }}" alt="">
                                    <div
                                        class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                href="">{{ getCategoryName($tranding->category_id) }}</a>
                                            <a class="text-body"
                                                href=""><small>{{ $tranding->created_at->format('M d, Y') }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                            href="{{ route('BlogDetail', ['custom_url' => $tranding->custom_url]) }}">
                                            {{ \Illuminate\Support\Str::limit($tranding->title, 20), '..' }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Subscribe</h4>
                        </div>
                        <div class="alert alert-success" style="display: none;">
                        </div>

                        @if (session()->has('error'))
                            <div style="margin-top: 12px;" class="alert alert-danger alert-dismissible fade show"
                                role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div style="margin-top: 12px;" class="alert alert-success alert-dismissible fade show"
                                role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                        <form id="Form" action="{{ route('StoreSub') }}" method="post" id="ContactForm">
                            @csrf
                            <div class="bg-white text-center border border-top-0 p-3">
                                <p>Subscribe to get latest content by Email and to become a fellow (Dr Drehab)</p>
                                <div class="input-group mb-2" style="width: 100%;">
                                    <input id="subscriber" type="text" name="email" class="form-control"
                                        placeholder="Your Email">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary font-weight-bold px-3">Sign
                                            Up</button>
                                    </div>
                                </div>
                                <span class="error text-danger " id="subscriber_emailError"
                                    style="font-style: italic; font-size: .8rem;"><span class="text-danger error"
                                        id="emailErr"></span>
                                    <span class="text-danger error" id="emailError"></span></span>
                                <small>Be the <span class="font-weight-bold">FIRST</span>to get a spoonful !</small>
                            </div>
                        </form>
                    </div>
                    <!-- Newsletter End -->

                </div>
            </div>
        </div>
    </div>

    <!-- Script start -->

    <script src="{{ asset('dist/assets/modules/jquery.min.js ') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#ContactForm").submit(function(event) {
                event.preventDefault();

                // Display the loader
                $("#loader").show();

                // Clear previous error messages
                $(".error").text("");

                // var isValid = true;
                // var name = $("#name").val();
                // if (name === "") {
                //     $("#nameErr").text("Name is required");
                //     isValid = false;
                // }

                var email = $("#email").val();
                if (email === "") {
                    $("#emailErr").text("Email is required");
                    isValid = false;
                }

                // var subject = $("#subject").val();
                // if (subject === "") {
                //     $("#subjectErr").text("Subject is required");
                //     isValid = false;
                // }

                if (isValid) {
                    // Prepare the data to be sent
                    var formData = {
                        // name: name,
                        email: email,
                        // subject: subject,
                        message: $("#message").val(), // Add the message field
                        _token: "{{ csrf_token() }}"
                    };

                    // Send an AJAX request to save the data
                    $.ajax({
                        type: "POST",
                        url: "{{ route('StoreSub') }}",
                        data: formData,
                        success: function(response) {
                            // Hide the loader
                            $("#loader").hide();
                            document.getElementById("ContactForm").reset();
                            // Display the success alert
                            $("#successAlert").show();

                            // Hide the success alert after 5 to 7 minutes (300,000 to 420,000 milliseconds)
                            setTimeout(function() {
                                    $("#successAlert").hide();
                                }, Math.floor(Math.random() * 2000) +
                                3000); // Random time between 5 to 7 minutes
                        },
                        error: function(xhr, status, error) {
                            // Handle the error here, e.g., show an error message
                            console.error(error);

                            // Hide the loader
                            $("#loader").hide();
                        }
                    });
                } else {
                    // Hide the loader if the form is not valid
                    $("#loader").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#Form').submit(function(e) {
                e.preventDefault();
                $('.error').text('');
                $('.alert-success').hide().empty();

                let subscriber = $('#subscriber').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('StoreSub') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'subscriber': subscriber
                    },
                    success: function(response) {
                        $('#subscriber').val('');
                        $('.alert-success').text(response.message).show();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $('.error').text('');

                        $.each(errors, function(key, value) {
                            $('#' + key + 'Error').text(value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <!-- Script End -->

@endsection
