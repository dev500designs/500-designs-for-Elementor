   <script>
        ///////////////////////////
        ///// Js for sticky ///////
        ///////////////////////////
        
        <?php if ($settings['stickys'] == 'sticky'){ ?>
        ////// make content same hight as lotti or img
        jQuery( document ).ready( function() {
            /*
            let contheight<?php echo $rand?> =  jQuery("#lottie500-<?php echo $rand?>").height(); //------------> Content Height (lottie)
            let parent<?php echo $rand?> =  jQuery("#lottie500-<?php echo $rand?>").parent(); //----------------> Parent container (lottie)
            let siblings<?php echo $rand?> =  jQuery(parent<?php echo $rand?>).siblings(); //-------------------> Siblings of lottie (content)
            let parent2<?php echo $rand?> =  jQuery(parent<?php echo $rand?>).parent().height(); //-------------> Total height of the main container.
            
            jQuery(siblings<?php echo $rand?>).css('height', contheight<?php echo $rand?>+'px');
            jQuery(siblings<?php echo $rand?>).addClass('cont<?php echo $rand?>');
*/
            <?php if($counter > 1){ ?>
            
            const controller<?php echo $rand?> = new ScrollMagic.Controller();
            const container<?php echo $rand?> = document.querySelector(".<?php echo $col_disp.$rand ?>");

            const scrollAnimation<?php echo $rand?> = new TimelineMax()

            
            var $stage<?php echo $rand?> = $('.stage<?php echo $rand?>');
            
           scrollAnimation<?php echo $rand?>.set($stage<?php echo $rand?>, {autoAlpha: 1})
            .to('.<?php echo $col_disp.$rand ?> .js-section1', 1, {autoAlpha: 1, ease:Power1.easeInOut, delay:0.75}, "trans1")
           .to('.<?php echo $col_disp.$rand ?> .js-section1', 1, {autoAlpha: 0,transform:"translatey(-20px)", ease:Power1.easeInOut}, "trans2")
            <?php for($x = 2; $x <= $counter; $x++){ ?>
            
                
                   <?php if($counter != $x){
                            
                            if($x == 2){
                                $d = $x - 1;
                            }else{
                                $d = $x;
                            }
                    ?>
            
                            .to('.<?php echo $col_disp.$rand ?> .js-section<?php echo $x; ?>', 1, {autoAlpha: 1,transform:"translatey(0px)", ease:Power1.easeInOut, delay: <?php echo $d; ?>}, "trans<?php echo $x; ?>")
                            .to('.<?php echo $col_disp.$rand ?> .js-section<?php echo $x; ?>', 1, {autoAlpha: 0,transform:"translatey(-20px)", ease:Power1.easeInOut, delay: <?php echo $x; ?>}, "trans<?php echo 1 + $x; ?>")
                            //console.log(<?php echo $x; ?> )
            
                    <?php }else{ ?>
                            .to('.<?php echo $col_disp.$rand ?> .js-section<?php echo $x?>', 1, {autoAlpha: 1,transform:"translatey(0px)", ease:Power1.easeInOut, delay: <?php echo $x; ?>}, "trans<?php echo $x; ?>")
                           // console.log(<?php echo $x; ?> + '-last')
            <?php } }?>

            var blockScroll<?php echo $rand?> = new ScrollMagic.Scene({
              triggerElement: container<?php echo $rand?>,
              triggerHook: "onLeave",
              duration: "<?php echo $settings['speed'] ?>00%"
            })
              .setPin(container<?php echo $rand?>)
              .setTween(scrollAnimation<?php echo $rand?>)
              .addIndicators()
              .addTo(controller<?php echo $rand?>);

            
            <?php } ?>
            
            function sizeAll() {
                var	w = window.innerWidth;
               setTimeout(function(){
                    if ( w < 767) {
                   blockScroll<?php echo $rand?>.enabled(false);
                        //console.log('less than');
                    } else {
                    blockScroll<?php echo $rand?>.enabled(true);
                        //console.log('more than');
                    }
                },1000)
            }

            jQuery(window).resize(sizeAll);
            sizeAll();
        });
        <?php } ?>

       

       

       
    </script>