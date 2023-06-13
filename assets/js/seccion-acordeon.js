jQuery( window ).on( 'elementor/frontend/init', () => {

    const addHandler = ( $element ) => {
        initSectionAccordion($element);
    };
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/seccion-acordeon-usmcl.default', addHandler );
} );



const initSectionAccordion = function($el) {
    if(!$('body').hasClass("elementor-editor-active")) {
        let elementId 	= $el.find('.accordion').data('id');
        let sectionId 	= $el.find('.accordion').data('section');
        let accContent 	= $el.find('.acc-content');
        
        let section     = $('#'+sectionId);

        accContent.empty().append(section);
	    console.log(elementId, sectionId, accContent, section, section.length);
        
        $el.find('.accordion .acc-header').append('<span class="icon"><i class="fas fa-chevron-down"></i></span>');
        $el.find('.accordion .acc-header .icon').empty().html('<i class="fas fa-chevron-down"></i>');
        $el.find('.accordion .acc-content').hide();
        $('#'+elementId+'.accordion .acc-header').click(function(){
            console.log('clic accordion');
            $(this).toggleClass('active').next().stop().slideToggle();
            if ($(this).hasClass('active')){
                $(this).children('.icon').empty().html('<i class="fas fa-chevron-up"></i>');
            } else {
                $(this).children('.icon').empty().html('<i class="fas fa-chevron-down"></i>');
            }
        });
    }
}
