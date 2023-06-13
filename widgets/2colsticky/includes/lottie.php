<div class="lottie500" id="lottie500-<?php echo $rand?>">
    
    <script>

        /**********************/
        /****** Variables *****/
        /**********************/
        <?php if($settings['infinite-loop'] == 'yes'){ ?> let loop<?php echo $rand;?> = true; <?php } else { ?> let loop<?php echo $rand;?> = false; <?php } ?>
        let show<?php echo $rand;?> = 0;
        let lottie<?php echo $rand?> = document.getElementById('lottie500-<?php echo $rand?>'); //---> Container ID 
        let animation<?php echo $rand;?> = bodymovin.loadAnimation({
            container: document.getElementById('lottie500-<?php echo $rand?>'),
            path: '<?php echo $lottdir; ?>',
            render: 'svg',
            loop: loop<?php echo $rand;?>,
            autoplay: false,
            mode:"scroll",
            name: 'demo 500'
            
        });

        var container_h<?php echo $rand?> = jQuery('.id-'+<?php echo $rand?>).height();
        console.log(container_h<?php echo $rand?>);
        
        //animation<?php echo $rand;?>.setDirection(-1);
        <?php if( $settings['trigger-lottie'] != 'scroll'){?>
                animation<?php echo $rand;?>.setSpeed(<?php echo $settings['play_speed']['size']; ?>);
        <?php } ?>

        /***** On viewport ****/
        /**********************/
        
        function isOnScreen(elem) {
            // if the element doesn't exist, abort
            if( elem.length == 0 ) {
                return;
            }
            let $window = jQuery(window)
            let viewport_top = $window.scrollTop()
            let viewport_height = $window.height()
            let viewport_bottom = viewport_top + viewport_height
            let $elem = jQuery(elem)
            let top = $elem.offset().top
            let height = $elem.height()
            let bottom = top + height
            

            return (top >= viewport_top && top < viewport_bottom) ||
            (bottom > viewport_top && bottom <= viewport_bottom) ||
            (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
        }

        ///////////////////////////
        //Start Lottie on Click
        ///////////////////////////
       
        <?php if($settings['trigger-lottie'] == 'onclick'){ ?>
            lottie<?php echo $rand?>.addEventListener('click', function() {
                let lottFr<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(true)
                let lottSe<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(false)
                animation<?php echo $rand;?>.play();
                <?php if($settings['play-loop'] == 'yes'){ ?>
                    animation<?php echo $rand;?>.playSegments([0,lottFr<?php echo $rand?>], true);
                <?php }?>
            });
        <?php } 
        
        ///////////////////////////
        //Start Lottie on mouse Hover
        ///////////////////////////
        
        elseif ($settings['trigger-lottie'] == 'onhover'){ ?>
            lottie<?php echo $rand?>.addEventListener('mouseenter', function() {
                let lottFr<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(true)
                <?php if($settings['play-loop'] == 'yes'){ ?>
                        animation<?php echo $rand;?>.playSegments([0,lottFr<?php echo $rand?>], true);
                <?php }else {?>
                        animation<?php echo $rand;?>.play();
                <?php } ?>  
            });
                        
        <?php }
        
        ///////////////////////////
        //Start Lottie on viewport
        ///////////////////////////
        
        elseif ($settings['trigger-lottie'] == 'viewport'){ ?>

        jQuery( document ).ready( function() {
            if( isOnScreen( jQuery( '#lottie500-<?php echo $rand?>' ) ) ) { 
                    animation<?php echo $rand;?>.play();
                    show<?php echo $rand;?> = 1
                    //animation<?php echo $rand;?>.playSegments([0,lottFr<?php echo $rand?>], true);
            }	
            window.addEventListener('scroll', function(e) {
                if( isOnScreen( jQuery( '#lottie500-<?php echo $rand?>' ) ) ) { 
                    
                    let lottFr<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(true)
                    let lottSe<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(false)
                    show<?php echo $rand?> ++;
                    animation<?php echo $rand;?>.play();
                        
                    <?php if($settings['play-loop'] == 'yes'){ ?>
                        if(show<?php echo $rand;?> == 1){
                            animation<?php echo $rand;?>.playSegments([0,lottFr<?php echo $rand?>], true);
                        }
                        
                        
                    <?php }?>
                }else{
                    show<?php echo $rand;?> = 0;

                }
            });
            
        });
    
        <?php }
        
        ///////////////////////////
        //Start Lottie on Scroll (Not finished)
        ///////////////////////////
        
        elseif ($settings['trigger-lottie'] == 'scroll'){ ?>
        
         jQuery( document ).ready( function() {
            if( isOnScreen( jQuery( '#lottie500-<?php echo $rand?>' ) ) ) { /* Pass element id/class you want to check */
                
                let lottFr<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(true)
                let lottSe<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(false)
                   
            }
                let animationStart = 0;
                let lastScrollTop = 0;
                let lottFr<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(true)
                let lottSe<?php echo $rand?> = animation<?php echo $rand;?>.getDuration(false)
            window.addEventListener('scroll', function(e) {
                if( isOnScreen( jQuery( '#lottie500-<?php echo $rand?>' ) ) ) { /* Pass element id/class you want to check */


                   // console.log(lottFr<?php echo $rand?>); 
                    
                        let st = window.pageYOffset || document.documentElement.scrollTop; 

                        if (st > lastScrollTop) {
                            if(animationStart <= lottFr<?php echo $rand?> ){
                                animationStart++;
                            }
                        } else if (st < lastScrollTop) {
                            if(animationStart > 0){
                                animationStart--;
                            }

                        }  // else was horizontal scroll
                        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
                        animation<?php echo $rand;?>.playSegments([animationStart,animationStart+1], true);

                       // console.log(animationStart);
                    animation<?php echo $rand;?>.stop();
                }
                    animation<?php echo $rand;?>.stop();
            });
        });
        //animation<?php echo $rand;?>.playSegments([0,400], true);

        <?php } ?>
        
        
        ///////////////////////////
        //Detect when animation stop
        ///////////////////////////
        
        animation<?php echo $rand;?>.addEventListener('complete',stop);
        function stop(){
            //alert('stop');
        }
        
        
</script>

<?php include 'animationjs.php'; ?>

</div>