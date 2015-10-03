<?php get_header();?>
<?php if(have_posts()): while(have_posts()): the_post();?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>
          <?php the_title();?>
        </h2>
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
          <div class="col-md-9">
          	<div class="widget">
				<?php the_content();?>
                <?php  $get_cats=wp_get_post_terms($post->ID, 'resource-category', array("fields" => "all"));?>
                <?php  $get_tags=wp_get_post_terms($post->ID, 'resource-tag', array("fields" => "all"));?>
                <?php $pdf_file= get_post_meta($post->ID, "pdf_file", true);?>
                <?php if($pdf_file){?>
                <div class="download_form">
                  <div class="row"> 
                    <div class="col-md-4">
                  <a href="<?php echo $pdf_file= get_post_meta($post->ID, "pdf_file", true);?>"> 
                  <?php $file_id=get_attachment_id_from_src($pdf_file);  ?>
                  <i class="fa fa-file-text-o" style="  display: block;"></i> <span><?php echo get_the_title($file_id);?></span> </a> 
                  
                  </div>
                  </div>
                </div>
                <?php }?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="small_widget">
            <?php foreach( $get_cats as $cats){?>
             <a href="<?php bloginfo('url');?>/resource-category/<?php echo $cats->slug;?>" class="btn_1">Back to  <?php echo $cats->name;?></a>
			<?php  }?>
              <div class="other_tag">
              	<h4>See other:</h4>
                <div class="clearfix"></div>
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
              </div>
            </div>
             <?php dynamic_sidebar( 'Other Sidebar' ); ?> 
          </div>
          
        </div>
</div>
<?php endwhile; endif;?>
<?php get_footer();?>
