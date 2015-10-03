<?php get_header();?>
<style>
.active_tag
{
	border: 1px solid #CCC;
  border-radius: 10px;
}
</style>
<?php $current_cirle =	get_query_var('process-circle');?>
<?php if(have_posts()): while(have_posts()): the_post();?>
	<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>   
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><?php the_title();?></h1>
      </div>
      <div class="col-md-6">
        <div class="text-right">
          <ol class="breadcrumb">
            <li><a href="<?php bloginfo('url');?>">Home</a></li> 
             <li><a href="<?php bloginfo('url');?>/faq">About The SLP</a></li> 
              <li><a href="<?php bloginfo('url');?>/faq/about/">Planning Your SLP</a></li> 
            <li class="active"><?php the_title();?></li>
          </ol>
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
                <?php $circle_tags=get_terms('circle-tag');?>
                <?php foreach( $circle_tags as $circle_tag){?>
                     <?php wp_reset_query();?>
                	<div class="col-md-4 col-sm-4">
                    	<article>
                        	<h5><?php echo $circle_tag->name;?></h5>
                             <?php query_posts(array('post_type'=>'process-circle','showposts'=>-1,'circle-tag'=>$circle_tag->slug));?>
          				    <?php if(have_posts()): while(have_posts()): the_post();?>
                            <?php global $post;?>
                            <a href="<?php the_permalink();?>" <?php if($current_cirle==$post->post_name){?> class="active_tag" <?php }?>><?php the_title();?></a> 
                               <?php endwhile; endif;?>  
                        </article>
                    </div>
               
               <?php }?> 
             <?php wp_reset_query();?>
                </div>
            </div>
            <?php wp_reset_query();?>
            <?php if(have_posts()): while(have_posts()): the_post();?>
        	  <?php the_content();?>
                  <?php $download_form= get_post_meta($post->ID, "download_form", true);?>
                   <?php $related_resource= get_post_meta($post->ID, "related_resource", true);?>
                   <div class="resource_type_links">
                   				<?php if($download_form){?>
                            	<a href="<?php echo $download_form;?>" class="btn_1" target="_blank">Download Form</a>
                                <?php }?>
                                <?php if($related_resource){?>
                                <a href="<?php echo $related_resource;?>" class="btn_1">Related Resources</a>
                                <?php }?>
                            </div>
 			<?php endwhile; endif;?>  
      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>
