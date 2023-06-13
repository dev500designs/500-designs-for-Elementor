<?php
    if($settings['image']['url'] != ''){
        $img_url = $settings['image']['url'];
    }else{
        $img_url = plugin_dir_url( __FILE__ ).'img/default.png';
    }
    
    if($settings['alt_img'] != ''){
        $img_alt = $settings['alt_img'];
    }else{
        if(isset($settings['image']['alt'])){
            $img_alt = $settings['image']['alt'];
        }
    }
    
//var_dump($settings['image']);
?>
<div class="lottie500" id="lottie500-<?php echo $rand?>">
   <?php  if($settings['link_to_img'] == 'custom'){ ?>
        <a class="img-container" href="<?php echo $img_url ?>">
            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
        </a>
    <?php }elseif($settings['link_to_img'] == 'file'){?>
        <a class="img-container" href="<?php echo $img_url ?>" data-elementor-open-lightbox="<?php echo $settings['open_lightbox']?>">
            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
        </a>
    <?php }else{?>
        <div class="img-container">
            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
        </div>
    <?php } ?>

        
        <?php include 'animationjs.php'; ?>
        
</div>