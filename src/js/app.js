jQuery(function () {

    // ajax load
    // get a tag

    $(document).on('click', '.js-filter-item', function(e) {
        e.preventDefault();

        // data-category tag on a tag
        var category  = $(this).data('category');

        $.ajax({
            // comes from function.php wp_localize_scripts
            url: wpAjax.ajaxUrl,
            data: {action: 'filter', category: category},
            //  doesn't matter
            type: 'post',
            success: function(result) {
                $('.js-directory-listing-target').html(result);
            }, error: function(result) {
                console.warn(result);
            },
        });
    });

    // get header heights
    function setMainMarginTop() {
        var headerHeight = jQuery('#header').outerHeight();
        jQuery('main').css('margin-top', headerHeight + 'px');
    }

    setMainMarginTop();

    $( window ).resize(function() {
        var headerHeight = jQuery('#header').outerHeight();
        jQuery('main').css('margin-top', headerHeight + 'px');
    });

    // Hero Carousel
    jQuery('#hero-slider').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        dots: true,
        nav: false,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        navText: ["<i class='hero--arrows left-arrow--svg'></i>", "<i class='hero--arrows right-arrow--svg'></i>"],
        responsive: {
            992: {
                dots: false,
                nav: true,
            }
        }
    });

    // Sponsor slider
    jQuery('#supporters-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        navText: ["<i class='support--arrows svg-support-left-arrow'></i>", "<i class='support--arrows svg-support-right-arrow'></i>"],
        responsive: {
            450: {
                items: 2,
            },
            992: {
                items: 5,
            }
        }
    });

    // Quote slider
    jQuery('#quote_slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        dots: true,
    });

    // Team Testimonial slider
    jQuery('#teamtestimonial_slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoplaySpeed: 1500,
        autoplayTimeout: 9000,
        autoplay: true,
        items: 1,
        dots: false,
        navText: ["<i class='testimonial--arrows svg-testimonial-left-arrow'></i>", "<i class='testimonial--arrows svg-testimonial-right-arrow'></i>"],
    });

    // Remove WP Block element iframe classes
    if (jQuery('.wp-block-embed-youtube').length) {
        jQuery('.wp-block-embed-youtube').removeClass().addClass('embed-responsive-item');
    }

    // Scrolling anchors
    jQuery('.scrollable-anchor').on('click', function (e) {
        e.preventDefault();

        jQuery('html,body').animate({
            scrollTop: jQuery(this.hash).offset().top
        }, 1000);
    });
});

var trackEvent = function (name, options) {
    trackGA(name, options);
    trackPixel(name, options);
};

var trackGA = function (name, options) {
    if (typeof gtag !== 'undefined') {
        gtag('event', name, {
            'event_category': options.category,
            'event_label': options.label,
            'value': options.value || 0
        });
    }
};

var trackPixel = function (name, options) {
    if (typeof gtag !== 'undefined') {
        fbq('track', 'Lead', {
            'event_category': options.category,
            'event_action': name,
            'value': options.value || 0,
            'currency': 'CAD'
        });
    }
};

// var targetBlankExternalLinks = function () {
//     var internalLinkRegex = new RegExp('^((((http:\\/\\/|https:\\/\\/)(www\\.)?)?'
//         + window.location.hostname
//         + ')|(localhost:\\d{4})|(\\/.*))(\\/.*)?$', '');
//
//     jQuery('a').filter(function () {
//         var href = jQuery(this).attr('href');
//         return !internalLinkRegex.test(href);
//     })
//         .each(function () {
//             jQuery(this).attr('target', '_blank');
//         });
// };

