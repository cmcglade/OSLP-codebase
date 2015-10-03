<?php /* Template Name: Discussion Page */ ?>

<?php get_header();?>
<?php if(have_posts()): while(have_posts()): the_post();?>
	<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>  
    <?php $show_process= get_post_meta($post->ID, "show_process", true);
			$file_list=get_post_meta($post->ID, "download_files", true);
	
	?>
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
<?php endwhile; endif;?>
<div class="container">
  <div class="row">
    <div class="col-md-9">
            <?php wp_reset_query();?>
            <?php if(have_posts()): while(have_posts()): the_post();?>
          <?php the_content();?>
                <?php endwhile; endif;?>
                <?php if($file_list){?>  
                <?php }?>
     </div>
    <div class="col-md-3">
            <div class="small_widget">
            <?php foreach( $get_cats as $cats){?>
             <a href="<?php bloginfo('url');?>/resource-category/<?php echo $cats->slug;?>" class="btn_1">Back to  <?php echo $cats->name;?></a>
			<?php  }?>
              <!--<div class="other_tag">-->
              	<!--<h4>See other:</h4>-->
                <!--<div class="clearfix"></div>-->
                <?php foreach($get_tags as $res_tag){?>
                <a href="<?php  echo esc_url( get_term_link( $res_tag, $res_tag->taxonomy ) )?>">
                	<figure>
                    	<img alt="*" src="<?php bloginfo('template_url');?>/assets/images/home_service_icon_1_thumb.png" class="img-responsive">
                    </figure>
                    <span>
                    	<?php echo $res_tag->name;?>
                    </span>
                </a> 
                <?php }?>
              <!--</div>-->
            </div>
             <?php dynamic_sidebar( 'Other Sidebar' ); ?> 
          </div>
  </div>
</div>

<?php get_footer();?>
