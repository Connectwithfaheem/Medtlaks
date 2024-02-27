 <!-- Footer Start -->
 <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
     <div class="row py-4">
         <div class="d-flex align-items-center justify-content-around">
             @if (isset($globalsetup) && count($globalsetup) > 0)
                 @foreach ($globalsetup as $global)
                     <div class="col-lg-3 col-md-6 mb-5">
                         <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                         <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>
                             {{ $global->address ?? '' }}
                         </p>
                         <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>{{ $global->phone ?? '' }}</p>
                         <p class="font-weight-medium w-100"><i
                                 class="fa fa-envelope mr-2"></i>{{ $global->email ?? '' }}</p>
                         <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                         <div class="d-flex justify-content-start">


                             <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                                 href="{{ $global->facebook ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                             <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                                 href="{{ $global->linkedin ?? '' }}"><i class="fab fa-linkedin-in"></i></a>
                             <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                                 href="{{ $global->instagram ?? '' }}"><i class="fab fa-instagram"></i></a>
                             <a class="btn btn-lg btn-secondary btn-lg-square" href="{{ $global->youtube ?? '' }}"><i
                                     class="fab fa-youtube"></i></a>
                         </div>
                     </div>
                 @endforeach
             @endif
             <div class="col-lg-3 col-md-6 mb-5">
                @if($popular)
                @foreach ($popular as $populars)
                @php
                                $categoryIds = explode(',', $populars->category_id);
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

                 <h5 class= "mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                 <div class="mb-3">
                     <div class="mb-2">
                         <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                             href="">{{ $categoryNames }}</a>
                         <a class="text-body" href=""><small>{{ $populars->created_at->format('M d, Y') }}</small></a>
                     </div>

                     <a class="small text-body text-uppercase font-weight-medium" href="{{ route('BlogDetail', ['custom_url' => $populars->custom_url]) }}">{{ \Illuminate\Support\Str::limit($populars->title, ) . '...' }}</a>
                 </div>
                 @endforeach
                 @endif
             </div>
             {{-- @if (isset($categories))

                 <div class="col-lg-3 col-md-6 mb-5">
                     <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                     <div class="m-n1">
                         @foreach ($categories as $category)
                         @if($category->custom_url)
                             <a href="{{ url('category', ['custom_url' => $category->custom_url]) }}"
                                 class="btn btn-sm btn-secondary m-1">{{ \Illuminate\Support\Str::limit($category->category, 10)}}</a>
                            @endif
                         @endforeach

                     </div>
                 </div>
             @endif --}}

         </div>

     </div>

 </div>

 <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <div class="m-0 text-center">
        <a class="m-0 text-center" href="{{ route('Privacy') }}">Privacy Policy</a>
        |
        <a class="m-0 text-center" href="{{ route('Terms') }}">Terms & Conditions</a>
        |
        <a class="m-0 text-center" href="{{ route('About') }}">About Us</a>
     </div><br><br>
     {{-- <p class="m-0 text-center">&copy; <a href="#">Dr Drehab</a>. All Rights Reserved. --}}


     <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
         <p class="m-0 text-center">&copy; <a href="#">Dr Drehab</a>. All Rights Reserved.</p><br>

            <p class="m-0 text-center">

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Design by <a href="https://htmlcodex.com">
                    <a target="_blank" href="https://connectwithfaheem.netlify.app/">FAHEEM ALI</a>


                </a>
            </p>

     </div>
 </div>



 <!-- Back to Top -->
 <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

 <!-- Template Javascript -->
 <script src="{{ asset('/frontend/js/main.js') }}"></script>

 <!-- JavaScript Libraries -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="{{ URL::asset('/frontend/lib/easing/easing.min.js') }}"></script>
 <script src="{{ URL::asset('/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

 <!-- Template Javascript -->
 <script src="{{ URL::asset('/frontend/js/main.js') }}"></script>
 <script>
     $(document).ready(function() {
         var form = $('#search-form');
         var inputField = form.find('input[name="keyword"]');
         var searchResultContainer = $('.search-result');
         var suggestionContainer = $('#suggestion-container'); // Reference to the suggestion container

         suggestionContainer.hide(); // Hide the suggestion container by default

         function fetchSearchResults() {
             var keyword = inputField.val();

             if (keyword === '') {
                 searchResultContainer.html('');
                 suggestionContainer.hide(); // Hide the suggestion container when input is empty
                 return;
             }

             $.ajax({
                 url: form.attr('action'),
                 method: form.attr('method'),
                 data: form.serialize(),
                 success: function(response) {
                     var resultsHtml = '';

                     if (response.results.length > 0) {
                         $.each(response.results, function(index, result) {
                             resultsHtml +=
                                 '<tr class="my-2 d-flex align-items-center"><td class="my-0 py-0 "  style="cursor: pointer;"><a class="text-dark" href="{{ route('BlogDetail', ['custom_url' => '']) }}/' +
                                 result.custom_url + '">' + result.title + '</a></td></tr>';
                         });

                     } else {
                         resultsHtml =
                             '<tr><td colspan="1" class="text-dark">No results found.</td></tr>';
                     }

                     suggestionContainer
                         .show(); // Show the suggestion container when there are results
                     searchResultContainer.html(resultsHtml);
                 },
                 error: function() {
                     searchResultContainer.html('<tr><td colspan="1">An error occurred.</td></tr>');
                 }
             });
         }

         inputField.on('input', fetchSearchResults);

         form.on('submit', function(event) {
             event.preventDefault();
             fetchSearchResults();
         });
     });
 </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>
