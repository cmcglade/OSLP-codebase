<?php /*Template Name:About*/?>
<?php get_header();?>
<?php if(have_posts()): while(have_posts()): the_post();?>
	<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>  
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php the_title();?></h2>
      </div>
      <div class="col-md-6">
        <div class="text-right">
          
          <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <?php if($src[0]){?>
        <div class="inner_banner"> <img alt="*" src="<?php echo $src[0];?>" class="img-responsive"> </div>
        <?php }?>
       <div class="row">
            <div class="col-md-3"> 
             	 	 <div class="tabs tabbable tabs-left">
       <?php
               wp_nav_menu( array( 'theme_location' => 'about_menu','menu_id' => '' ,'menu_class' => 'nav nav-tabs', 'container' => false ) );   
              ?>
          </div> 
         	 </div>
                          <div class="col-md-6">
                                 <h2 class="heading"><?php the_title();?></h2>
                                <?php the_content();?>
                        </div>
                 
            <div class="col-md-3">
                    	<div class="add_area">
                        	<a href="javascript:;">
                            	<img alt="*" src="<?php bloginfo('template_url');?>/assets/images/ad_1.jpg" class="img-responsive">
                            </a>
                            <a href="javascript:;">
                            	<img alt="*" src="<?php bloginfo('template_url');?>/assets/images/ad_2.jpg" class="img-responsive">
                            </a>
                        </div>	
                    </div> 
            </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif;?>
<?php get_footer();?>
