(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Main News carousel
    $(".main-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        center: true,
    });


    // Tranding carousel
    $(".tranding-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ]
    });


    // Carousel item 1
    $(".carousel-item-1").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
    });

    // Carousel item 2
    $(".carousel-item-2").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            }
        }
    });


    // Carousel item 3
    $(".carousel-item-3").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


    // Carousel item 4
    $(".carousel-item-4").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });

})(jQuery);

$("#frmProductReview").submit(function (e) {
    $("#faSpinner").append(
        '<i class="fa fa-spinner fa-spin" style="margin-left: 10px;"></i>'
    );
    $("#faSpinner").attr("disabled", "disabled");
    e.preventDefault();
    $("#password_msg").html("");

    // Get the selected star rating (as a string)
    var selectedRating = $("#selectedRating").val();

    // Append the selected rating to the form data
    $("#frmProductReview").append('<input type="hidden" name="rating" value="' + selectedRating + '">');

    $.ajax({
        url: "/product_review_process",
        data: $("#frmProductReview").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "success") {
                $("#faSpinner").find(".fa-spinner").remove();
                $("#faSpinner").removeAttr("disabled");
                $("#review_msg").html(result.msg);
                $("#frmProductReview")[0].reset();

                setInterval(function () {
                    window.location.href = window.location.href;

                }, 1000);
            }
            if (result.status == "error") {
                $("#faSpinner").find(".fa-spinner").remove();
                $("#faSpinner").removeAttr("disabled");
                // $("#frmProductReview")[0].reset();
                $("#review_msg").html(result.msg);
            }
        },
    });
});
    $.ajax({
        url: '{{ route("BlogDetail", ["custom_url" => $blogsdetail->custom_url]) }}?page=' + page,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            $('#comment-list').html(data);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
