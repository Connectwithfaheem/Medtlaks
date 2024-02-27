@extends('frontend_layout.master')
@section('content')
    <!-- Breaking News Start -->

    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 400px;">
                            <h4 class="m-0 text-uppercase font-weight-bold" style="width: 200px;">Recent post:</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            @if (isset($blogs) && count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <div class="text-truncate"><a class="text-dark text-uppercase font-weight-semi-bold"
                                            href="">{{ \Illuminate\Support\Str::limit($blog->title, 70) . '...' }}</a>
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


    <!-- News With Sidebar Start -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    @php
                        $categoryIds = explode(',', $blogsdetail->category_id);
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
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset('image/' . $blogsdetail->thumbnail) }}"
                            style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $categoryNames }}</a>
                                <a class="text-body" href="">{{ $blog->created_at->format('M d, Y') }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $blogsdetail->title }}</h1>
                            <div>
                                {!! $blogsdetail->content !!}
                            </div>
                            <div>
                                <h6 class="h5 fw-bold">Share Blog:-

                                </h6>
                                <div>
                                    <h3>
                                        <a class="text-dark"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&title={{ $blogsdetail->title }}&picture={{ $blogsdetail->thumbnail }}"
                                            target="_blank"> <i class="fab fa-facebook m-2"></i></a>

                                        <!-- Share on Twitter -->
                                        <a class="text-dark"
                                            href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $blogsdetail->title }}&via=yourTwitterUsername"
                                            target="_blank"><i class="fab fa-twitter m-3"></i></a>

                                        <!-- Share on WhatsApp -->
                                        <a class="text-dark"
                                            href="https://api.whatsapp.com/send?text={{ urlencode($blogsdetail->title . ' ' . url()->current()) }}"
                                            target="_blank"><i class="fab fa-whatsapp m-3"></i></a>

                                        <!-- Share on Instagram -->
                                        <a class="text-dark"
                                            href="https://www.instagram.com/share?url={{ url()->current() }}&title={{ $blogsdetail->title }}&media={{ $blogsdetail->thumbnail }}"
                                            target="_blank"><i class="fab fa-instagram m-3"></i></a>

                                    </h3>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('frontend/img/admin.svg') }}" width="25"
                                    height="25" alt="">
                                @if ($blogsdetail->written_by)
                                    <small>by <strong>{{ getWriterName($blogsdetail->written_by) }}
                                        </strong></small>
                                @else
                                    <small>By <strong>MMTS</strong></small>
                                @endif
                            </div>
                            @if (@$blogsdetail->count > 0)
                            <div class="d-flex align-items-center" id="view-count">
                                <span class="ml-3"..><i class="far fa-eye mr-2">{{ $blogsdetail->count }}</i></span>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
                <!-- News Detail End -->
                <!-- Comment Section -->

                  <!-- Comment Section -->


                <div class="col-lg-4">
                    <!-- Social Follow Start -->

                    <div class="mb-3">

                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Me</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @if (isset($globalsetup) && count($globalsetup) > 0)
                                @foreach ($globalsetup as $global)
                                    <a href="{{ $global->linkedin ?? '' }}" target="_blank"
                                        class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #0185AE;">
                                        <i class="fab fa-linkedin-in text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">LinkedIn</span>
                                    </a>

                                    <a href="{{ $global->facebook ?? '' }}" target="_blank"
                                        class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #39569E;">
                                        <i
                                            class="fab fa-facebook-f text-center py-4 mr-3"style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Facebook</span>
                                    </a>
                                    <a href="{{ $global->instagram ?? '' }}" target="_blank"
                                        class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #C8359D;">
                                        <i class="fab fa-instagram text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Instagram</span>
                                    </a>
                                    <a href="{{ $global->youtube ?? '' }}" target="_blank"
                                        class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #DC472E;">
                                        <i class="fab fa-youtube text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Youtube</span>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Social Follow End -->

                    <!-- Ads Start -->

                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="https://go.fiverr.com/visit/?bta=848997&nci=14169" rel="sponsored"Target="_Top"><img
                                    src="https://fiverr.ck-cdn.com/tn/serve/?cid=29121959" width="300"
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
                                            href="{{ route('BlogDetail', ['custom_url' => $tranding->custom_url]) }}">{{ \Illuminate\Support\Str::limit($tranding->title, 20), '..' }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Subscibe</h4>
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
                                <p>Subscribe to get latest content by Email and to become a fellow (MEDTALKS)</p>
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

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">



                                @foreach (explode(',', $blogsdetail->meta_keyword) as $metakyword)
                                    @php $metaKey = trim($metakyword); @endphp
                                    @if ($metaKey !== '')
                                        {{--  <a href="#!">{{ $metaKey }}</a>  --}}
                                        <a href=""
                                            class="btn btn-sm btn-outline-secondary m-1">{{ $metaKey }}</a>
                                    @endif
                                @endforeach
                                {{--  <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>  --}}

                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

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

    <!-- Script end -->


@endsection
