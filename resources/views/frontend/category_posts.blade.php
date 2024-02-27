@extends('frontend_layout.master')
@section('content')
    <!-- News With Sidebar Start -->

    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold"> {{ $category->category }} :</h4>
                            </div>

                        </div>
                        {{-- ----> CATEGORY POST START --}}
                        @if (isset($blogs) && count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('image/' . $blog->thumbnail) }}"
                                            style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="">{{ getCategoryName($blog->category_id) }}</a>
                                                <a class="text-body"
                                                    href=""><small>{{ $blog->created_at->format('M d, Y') }}</small></a>
                                            </div>
                                            <a class="h4 m-0 text-dark text-uppercase font-weight-bold"
                                                href="{{ route('BlogDetail', ['custom_url' => $blog->custom_url]) }}">{{ \Illuminate\Support\Str::limit($blog->title, 50) . '...' }}</a>
                                            <p class="m-0">{{ $blog->meta_description }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle mr-2" src="{{ asset('frontend/img/admin.svg') }}"
                                                    width="25" height="25" alt="">
                                                @if ($blog->written_by && $blog->writers->isNotEmpty())
                                                    @php
                                                        $firstWriter = $blog->writers->first();
                                                    @endphp

                                                    <a href="{{ $firstWriter->url }}">
                                                        <small>by
                                                            <strong>{{ $firstWriter->user_name }}</strong></small>
                                                    </a>
                                                @else
                                                    <small>By <strong>MMTS</strong></small>
                                                @endif
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                                <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center"> {{ $category->category }} blogs Coming Soon.....</p>
                        @endif

                        {{-- ----> CATEGORY POST END --}}

                    </div>

                </div>
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
                                        <i class="fab fa-facebook-f text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
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
                            <a href="https://go.fiverr.com/visit/?bta=848997&nci=14169" rel="sponsored" Target="_Top"><img
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

                </div>
            </div>
        </div>
    </div>

    <!-- News With Sidebar End -->
    <!-- Scripts Start -->

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

    <!-- Scripts End -->

@endsection
