var $ = jQuery.noConflict();
$(function() {

    $(document).ready(function() {

        // Men movil ocualto al iniciar 
        $('.wrap-items-menu-mobile').css('display','none');
        
        // Menú principal
        // $('.navbar-menu .nav-item-megamenu')
        // .on('mouseenter', function(e){
        //     var positionAngle = $(e.currentTarget).position().left+50;
        //     // console.log($(e.currentTarget).position());
        //     if(positionAngle > 300){
        //         $(e.currentTarget).find('.megamenu__usm .angle').removeClass('blue');
        //     } else {
        //         $(e.currentTarget).find('.megamenu__usm .angle').addClass('blue');
        //     }
        //     $(e.currentTarget).find('.megamenu__usm .angle').css('left',positionAngle);
        //     $(e.currentTarget).find('.megamenu__usm').fadeIn('fast');

        //     // Ocultamos todos los hijos del submenú
        //     $(e.currentTarget).find('.mega-main-menu .list-main-menu .mega-sub-menu').hide();
        //     // Mostramos el primer submenú del megamenú
        //     $(e.currentTarget).find('.mega-main-menu .list-main-menu .nav-item-megamenu:first-child .mega-sub-menu').show();
        // })
        // .on('mouseleave', function(e){
        //     $(e.currentTarget).find('.megamenu__usm').hide();
        //     $(e.currentTarget).find('.megamenu__usm .angle').removeClass('blue');
        // });

        // // Evento para mostrar submenu del megamenu
        // $('.mega-main-menu .list-main-menu .item-main-menu')
        // .on('mouseenter', function(e){
        //     var targetID = $(e.currentTarget).attr('data-target');
        //     // Ocultamos todos los hijos del submenú
        //     $(e.currentTarget).parents('.megamenu__usm').find('.mega-main-menu .list-main-menu .mega-sub-menu').hide();
        //     // Mostramos el submenú del megamenú que corresponda por el id del target
        //     $(e.currentTarget).parent().find('.mega-sub-menu').show();
        // });

        // // Evento para controlar el clic sobre los items del main menú
        // $('.mega-main-menu .list-main-menu .item-main-menu')
        // .on('click', function(e){
        //     e.preventDefault();
        //     var _href = $(e.currentTarget).attr('href');
        //     // console.log(_href);
        //     if( _href != "#"){
        //         window.location = _href;
        //     }
            
        // });
    });


});