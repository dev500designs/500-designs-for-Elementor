<div class="video-container" id="video500-<?php echo $rand?>">
 
    <?php
        
    if (isset($settings['youtube_source_url']["url"])) {
        $youtube = str_replace("watch?v=","embed/", $settings['youtube_source_url']["url"]);
    }
        
    if (isset($settings['vimeo_source_url']["url"])) {
        $vimeo = $settings['vimeo_source_url']["url"];
    }
        
    if (isset($settings['selfhosted_video']["url"])) {
        $selfhost = $settings['selfhosted_video']["url"];
    }        
    if (isset($settings['feature_video_image']['url'])) {
        $poster   = $settings['feature_video_image']['url'];
    }else{
        $poster   = '';
    }       
    if (isset($settings['feature_video_play_image']['url'])) {
        $play   = $settings['feature_video_play_image']['url'];
    }else{
        $play   = '';
    }        
    if (isset($settings['feature_video_pause_image']['url'])) {
        $pause  = $settings['feature_video_pause_image']['url'];
    }else{
        $pause   = '';
    }       
    if (isset($settings['start_time'])) {
        $start_time   = $settings['start_time'];
    }else{
        $start_time   = '';
    }      
    if (isset($settings['end_time'])) {
        $end_time   = $settings['end_time'];
    }else{
        $end_time   = '';
    }
        $autoplay = $settings['video_autoplay'];
        $loop     = $settings['video_loop'];
        $mute     = $settings['video_mute'];
        $controls = $settings['video_control'];
        
        
        if($autoplay !== '1'){
            $autoplay = '';
            $hostedvid_autoplay = '';
        }else{
            $autoplay = '&autoplay=1';
            $hostedvid_autoplay = 'autoplay';
        }
    
        if($loop !== '1'){
            $loop = '';
            $hostedvid_loop = '';
        }else{
            $loop = '&loop=1';
            $hostedvid_loop = 'loop';
        }

        if($mute !== '1'){
            $mute = '';
            $mute2 = '';
            $hostedvid_muted = '';
            if ($settings['video_play_onview'] === 'yes'){
                $mute = '&mute=1';
                $mute2 = '&muted=1';
                $hostedvid_muted = 'muted';
            }else{
                $hostedvid_muted = '';
            }
        }else{
            $mute  = '&mute=1';
            $mute2 = '&muted=1';
            $hostedvid_muted = 'muted';
        }

        if($controls !== '1'){
            $controls = '0';
            $hostedvid_controls = '';
        }else{
            $hostedvid_controls = 'controls';
        }
https://player.vimeo.com/video/235215203?color&autopause=0&loop=0&muted=0&title=1&portrait=1&byline=1#t=

        //var_dump($poster);
        //src="'.$youtube.'?controls='.$controls. $autoplay . '&mute='.$mute.'&playsinline=0&modestbranding=0&enablejsapi=1&loop=1">
        if($settings['video_cource'] === 'youtube' ){
            echo '<iframe class="indi_'.$rand.'" width="514" height="289" id="iframe-'. $rand .'"
                    src="'.$youtube.'?controls='.$controls. $autoplay . $mute. $loop. '">
                 </iframe>';
        }elseif($settings['video_cource'] === 'vimeo' ){
            echo '<iframe class="indi_'.$rand.'" width="514" height="289" class="vim" id="iframe-'. $rand .'" allowfullscreen
                    src="'.$vimeo.'?color'.$autoplay. $mute2 .'&controls='. $controls . $loop .'">
                 </iframe>';
        }else{

            echo'<video class="indi_'.$rand.'" width="320" height="240" '.$hostedvid_autoplay .' '. $hostedvid_muted . ' ' . $hostedvid_loop . ' ' . $hostedvid_controls . '>
                    <source src="'.$selfhost.'#t='.$start_time.','.$end_time.'">
                    Your browser does not support the video tag.
                </video>';
        }
    ?>
        <?php include 'animationjs.php'; ?>
        
        
</div>

<script>
    jQuery(document).ready(function(){
        
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
        //Start video on viewport
        ///////////////////////////
        
        
        function play_onviewport(){
            <?php if (isset($settings['selfhosted_video']["url"])) { ?>
                            var video<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').get(0);
                            jQuery(this).find('img').css('display','none');
                            jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                            setTimeout(function(){
                                var video<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').get(0);
                                video<?php echo $rand?>.play();
                            }, 0)
                            
                <?php }else {?>
                            jQuery(this).find('img').css('display','none');
                            jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                            jQuery("#iframe-<?php echo $rand?>")[0].src += "&autoplay=1";
                            jQuery("#iframe-<?php echo $rand?>")[0].src += "&muted=1";
                <?php }?>
        }
        
        /////*************
        
        <?php if ($settings['video_play_onview'] === 'yes'){ ?>
            
        jQuery( document ).ready( function() {
            var c_<?php echo $rand?> = 0;
            if( isOnScreen( jQuery( '#video500-<?php echo $rand?> .indi_<?php echo $rand?>' ) ) ) { 
                play_onviewport();
                var c_<?php echo $rand?> = 1;
            }
            
            window.addEventListener('scroll', function(e) {

                if( isOnScreen( jQuery( '#video500-<?php echo $rand?> .indi_<?php echo $rand?>' ) ) ) { 
                    c_<?php echo $rand?>++;
                    if(c_<?php echo $rand?> === 1 ){
                        play_onviewport();
                    }
                }else{
                    c_<?php echo $rand?> = 0;
                }
                
            });
            
        });
        
        <?php }
        
        
        ///////////////////////////
        ///////////////////////////
        
        if($settings['video_autoplay'] !== '1'){ 
        
        if (isset($settings['selfhosted_video']["url"])) { ?>
            var vid_width<?php echo $rand?>  = jQuery('#video500-<?php echo $rand?> video').width();
            var vid_height<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').height();
        <?php } else{ ?>
            var vid_width<?php echo $rand?>  = jQuery('#video500-<?php echo $rand?> iframe').width();
            var vid_height<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> iframe').height();
        <?php } ?>    
        
        <?php if($settings['video_featureimage'] === 'yes') { ?>
                
                jQuery('#video500-<?php echo $rand?>').append('<img class="featimg_video" src="<?php echo $poster; ?>" alt="">');
                jQuery('#video500-<?php echo $rand?> img').css({"width": vid_width<?php echo $rand?> + "px", "height": vid_height<?php echo $rand?> + "px", "object-fit": "cover"});
                
                
        <?php }else{ ?>

                jQuery('#video500-<?php echo $rand?>').append('<img class="featimg_video" src="<?php echo $poster; ?>" alt="" style="opacity:0 ;">');
                jQuery('#video500-<?php echo $rand?> .featimg_video').css({"width": vid_width<?php echo $rand?> + "px", "height": vid_height<?php echo $rand?> + "px", "object-fit": "cover"});
        <?php } ?>
        ////////////////////////// Self Hosted video ///////////////////////
        <?php if (isset($settings['selfhosted_video']["url"])) { ?>

            jQuery('#video500-<?php echo $rand?> .featimg_video').click(function(){
                jQuery('#video500-<?php echo $rand?> video').trigger('click');
                jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                var video<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').get(0);
                video<?php echo $rand?>.play();
            })
        <?php } 
            ////////////////////////// Youtube Video ///////////////////////
            if (isset($settings['youtube_source_url']["url"])) { ?>
                
                jQuery('#video500-<?php echo $rand?> .featimg_video').click(function(ev){
                    jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                    jQuery("#iframe-<?php echo $rand?>")[0].src += "&autoplay=1";
                    ev.preventDefault();
                    
                })
                
        <?php } 
            
            ////////////////////////// Vimeo Video ///////////////////////
            if (isset($settings['vimeo_source_url']["url"])) { ?>
                
                jQuery('#video500-<?php echo $rand?> .featimg_video').click(function(ev){
                    jQuery(this).find('img').css('display','none');
                    jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                    jQuery("#iframe-<?php echo $rand?>")[0].src += "&autoplay=1";
                    
                })
                
        <?php } 
        
            //////////////////////////  ////////////////////////
            if ($settings['play_icon_switch'] === 'yes') { ?>
                
                jQuery('#video500-<?php echo $rand?>').append('<img class="play_video" src="<?php echo $play ?>" alt="">');
                jQuery('#video500-<?php echo $rand?> .play_video').click(function(){

                    
                    <?php   if(isset($settings['vimeo_source_url']["url"]) || isset($settings['youtube_source_url']["url"]) ) { ?>
                                jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                                jQuery("#iframe-<?php echo $rand?>")[0].src += "&autoplay=1";
                                console.log('click');
                    <?php  }else{ ?>
                                jQuery('#video500-<?php echo $rand?> video').trigger('click');
                                jQuery('#video500-<?php echo $rand?>').find('img').css('display','none');
                                var video<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').get(0);
                                video<?php echo $rand?>.play();
                    <?php } ?>
                })
                
            <?php } ?>
        
                jQuery('#video500-<?php echo $rand?>').append('<img class="pause<?php echo $rand?> pause" src="<?php echo $pause ?>" alt="">');
                jQuery(".pause").hide();

                var counter_vid<?php echo $rand?> = 0;
                jQuery('#video500-<?php echo $rand?> video, #video500-<?php echo $rand?> .pause').click(function() {
                    var video<?php echo $rand?> = jQuery('#video500-<?php echo $rand?> video').get(0);
                    jQuery('#video500-<?php echo $rand?>').find('.play_video').css('display','none');
                    counter_vid<?php echo $rand?> ++;
                    if(counter_vid<?php echo $rand?> > 1){
                    if ( video<?php echo $rand?>.paused ) {
                        console.log('paused');
                        video<?php echo $rand?>.play();
                        jQuery(".pause<?php echo $rand?>").hide();
                    } else {
                        console.log('played');
                        video<?php echo $rand?>.pause();
                        jQuery(".pause<?php echo $rand?>").show();
                    }

                    return false;
                    }

                });
        
        
        
    <?php } ?>
        
    });
</script>


