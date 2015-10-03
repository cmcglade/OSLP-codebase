<?php get_header();?> 
<?php $resource_category =	get_query_var('resource-category');
 
 //$current_resource=get_term_by( 'slug', get_query_var( 'resource-category' ), get_query_var( 'resource-category' ) );
$current_resource = get_term_by('slug', $resource_category, 'resource-category');
//print_r($current_resource);


	$tax_term_id = $current_resource->term_taxonomy_id;
				$images = get_option('taxonomy_image_plugin');
				$img_url=wp_get_attachment_url( $images[$tax_term_id], 'medium' ); 
?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php echo $current_resource->name;?></h2>
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
  	<div class="col-md-3 col-sm-3">
    	
        
        
        <div id="item-header" role="complementary">
  <div id="item-header-avatar">
  <a href="javascript:;">
  <img alt="*" src="<?php echo $img_url;?>" class="img-responsive"></a>
 </div>
  <div id="item-header-content">
  <span class="highlight" style="display:none">
  <a href="javascript:;">Business</a>, 
  <a href="javascript:;">Language</a>,
  <a href="javascript:;">Numeracy</a>,
  <a href="javascript:;">Technology</a>
  </span>
    <h3><a href="javascript:;"><?php echo $current_resource->name;?></a></h3>
  </div>
  
</div>
        
        
        
        
        
        
    </div>
    <div class="col-md-6">
    	<div class="widget"> 
            <div class="inner_cource">
              <?php   
		 
				$child_resource_category = 	get_terms('resource-category' ,array('parent' => $current_resource->term_id ,'hide_empty'=>1));
			// $child_resource_category = get_terms( 'resource-category', $res_args );
 
			if($child_resource_category){
			?>
            <?php foreach($child_resource_category as $resources_child){			
				?>
            	<h4><?php echo $resources_child->name;?></h4>
                <section>
                 <?php 
					$count_resources=0;
					wp_reset_query();?>
               <?php query_posts(array('post_type'=>'resource','showposts'=>-1,'resource-category'=>$resources_child->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
                <article>
                	<div class="row">
                    	<div class="col-md-8 col-sm-7">
                        	<span><i class="fa fa-file-text"></i> <a href="<?php the_permalink();?>"><?php the_title();?></a></span>
                        </div>
                        <div class="col-md-4 col-sm-5">
                        	<span><i class="fa fa-certificate"></i><?php echo get_post_meta($post->ID, "board_name", true);?></span>
                        </div>
                    </div>
                </article> 
                 <?php endwhile; endif;?>  	
                </section>
             <?php }
			 
			}else{?>
             <section>
                 <?php 
					$count_resources=0;
					wp_reset_query();?>
               <?php query_posts(array('post_type'=>'resource','showposts'=>-1,'resource-category'=>$current_resource->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
                <article>
                	<div class="row">
                    	<div class="col-md-8 col-sm-7">
                        	<span><i class="fa fa-file-text"></i> <a href="<?php the_permalink();?>"><?php the_title();?></a></span>
                        </div>
                        <div class="col-md-4 col-sm-5">
                        	<span><i class="fa fa-certificate"></i><?php echo get_post_meta($post->ID, "board_name", true);?></span>
                        </div>
                    </div>
                </article> 
                 <?php endwhile; endif;?>  	
                </section>
            <?php }?>
             
            </div>
          </div>
          <div class="widget" style="display:none">
            <div class="comment">
            	<h4>Questions and Answer</h4> 
            </div>
        </div>
    </div>
    <div class="col-md-3">
    		<div class="small_widget">
            	<a href="<?php bloginfo('url');?>/resources/" class="btn_1">Back to all resources</a>
                <div class="resource_side_nav" style="display:none">
                	<ul>
                    	<li><a href="javascript:;">Ask a Question <i class="fa fa-question-circle"></i></a></li>
                        <li><a href="javascript:;">Lates Discussion <i class="fa fa-wechat"></i></a></li>
                    </ul>
                </div>
            </div>
        	  <?php dynamic_sidebar( 'Other Sidebar' ); ?> 
    </div>
  </div>

 
  
</div> 
<?php get_footer();?>
