<div class="home_banner">
  <ul>
    <?php query_posts(array('post_type'=>'slider'));?>
    <?php if(have_posts()): while(have_posts()): the_post();?>
    <?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>
    <li>
      <?php $slider_link_text= get_post_meta($post->ID, "slider_link_text", true);?>
      <?php if($slider_caption_box!='yes'&&$slider_link_text){?>
      <a href="<?php echo $slider_link_text;?>"> <img src="<?php echo $src[0];?>" class="img-responsive" width="" height="" alt="Banner"> </a>
      <?php }else{?>
      <img src="<?php echo $src[0];?>" class="img-responsive" width="" height="" alt="Banner">
      <?php }?>
      <?php $slider_caption_box=get_post_meta($post->ID, "slider_caption_box", true);?>
      <?php if($slider_caption_box=='yes'){?>
      <div class="caption">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner">
                <h3>
                  <?php the_title();?>
                </h3>
                <p>
                  <?php $content=get_the_content(); echo($content);?>
                </p>
                <a href="<?php echo get_post_meta($post->ID, "slider_link_text", true);?>" class="btn btn-success"><?php echo get_post_meta($post->ID, "slider_btn_text", true);?> <i class="fa fa-angle-double-right"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </li>
    <?php endwhile; endif;?>
  </ul>
</div>
