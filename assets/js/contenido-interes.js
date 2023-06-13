jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        initContenidoInteres($element)
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/contenido-interes-usmcl.default', addHandler)
});
const initContenidoInteres = function ($el) {
    var carouselContenidoInteres = $el.find('.contenido-interes-owl');
    carouselContenidoInteres.on('changed.owl.carousel', function (event) {
        if (event.item.index != null) {
            var sizeItems = event.page.size;
            var totalItems = event.item.count;
            if (sizeItems > totalItems) {
                var currentItem = totalItems
            } else {
                var currentItem = sizeItems + event.item.index
            }
            $el.find('.current-number__usm').text(currentItem);
            $el.find('.total-number__usm').text(totalItems)
        }
    });
    carouselContenidoInteres.owlCarousel({
        center: !1,
        loop: !1,
        margin: 30,
        dots: !1,
        mouseDrag: !1,
        responsiveClass: !0,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 4
            }
        }
    });
    $el.find('.next-carousel__usm').click(function (e) {
        e.preventDefault();
        carouselContenidoInteres.trigger('next.owl.carousel')
    });
    $el.find('.prev-carousel__usm').click(function (e) {
        e.preventDefault();
        carouselContenidoInteres.trigger('prev.owl.carousel', [300])
    })
}
