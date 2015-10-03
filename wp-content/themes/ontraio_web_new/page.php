<?php if(is_bbpress()){?>
	<?php if(is_user_logged_in()){?><?php }else{?>
    		<script>window.location="<?php bloginfo('url');?>";</script>
    <?php }?>
<?php }?>
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
    <div class="col-md-12">
      <div class="widget">
        <div class="row">
           
          <div class="col-md-12">
             
            <?php wp_reset_query();?>
            <?php if(have_posts()): while(have_posts()): the_post();?>
          <?php the_content();?>
                <?php endwhile; endif;?>
             
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>
