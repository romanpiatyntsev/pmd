jQuery(document).ready(function ($) {

    $('.lazy').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        cssEase: 'ease',
        prevArrow:"<button type='button' class='slick-arrow slick-prev'>&#xf137</button>",
        nextArrow:"<button type='button' class='slick-arrow slick-next'>&#xf138</button>"
    });
});
