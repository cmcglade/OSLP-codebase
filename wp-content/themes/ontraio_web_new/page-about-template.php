<?php /*Template Name:About Pages*/?>
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
          <div class="col-md-3">
            <div class="tabs tabbable tabs-left">
       
                
          <?php
               wp_nav_menu( array( 'theme_location' => 'about_menu','menu_id' => '' ,'menu_class' => 'nav nav-tabs', 'container' => false ) );   
              ?>
            </div>
          </div>
          <div class="col-md-9">
            <div class="resource_circle">
            	<div class="row"> 
                <?php if($show_process=='yes'){?>
                <?php $circle_tags=get_terms('circle-tag');?>
                <?php foreach( $circle_tags as $circle_tag){?>
                     <?php wp_reset_query();?>
                	<div class="col-md-4 col-sm-4">
                    	<article>
                        	<h5><?php echo $circle_tag->name;?></h5>
                             <?php query_posts(array('post_type'=>'process-circle','showposts'=>-1,'circle-tag'=>$circle_tag->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
                            <a href="<?php the_permalink();?>"><?php the_title();?></a> 
                               <?php endwhile; endif;?>  
                        </article>
                    </div>
               
               <?php }?>
                    <?php }?>
                          <?php wp_reset_query();?>
                </div>
            </div>
            <?php wp_reset_query();?>
            <?php if(have_posts()): while(have_posts()): the_post();?>
          <?php the_content();?>
                <?php endwhile; endif;?>
                <?php if($file_list){?>  
      <div class="download_form">
                  <div class="row">
              			<?php foreach($file_list as $files_download){
							
							$file_id=get_attachment_id_from_src($files_download);  
							?>
                    <div class="col-md-2"> <a href="<?php echo $files_download;?>" target="_blank"> <i class="fa fa-file-text-o"></i> <span><?php echo get_the_title($file_id);?></span> </a> </div>
                  		<?php }?>
                  </div>
                </div>
                <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>
