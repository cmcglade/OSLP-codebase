<?php get_header();?>
<?php $resource_category =	get_query_var('resource-tag');
 
 //$current_resource=get_term_by( 'slug', get_query_var( 'resource-category' ), get_query_var( 'resource-category' ) );
$current_resource = get_term_by('slug', $resource_category, 'resource-tag');

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
    <div class="col-md-12">
      <div class="widget">
      
      
      <div class="inner">
            <div class="row"> 
              <div class="col-md-12 col-sm-2">
                <section>
                    <p><?php echo term_description($current_resource->term_id,'resource-tag'); ?></p>
                </section>
              </div>   	
           
            </div>
          </div>
      <?php wp_reset_query();?>
      <?php query_posts(array('post_type'=>'resource','resource-tag'=>$resource_category ));?>
       <?php if(have_posts()): while(have_posts()): the_post();?>
       		<?php $get_cats=wp_get_post_terms($post->ID, 'resource-category', array("fields" => "all"));
					foreach($get_cats as $cats){
					$get_all_cats[]=$cats->slug;
					} 
			?>
       <?php endwhile; endif;?>  	
       <?php $resources_cats=array_unique($get_all_cats);?>
       <?php foreach($resources_cats as $res_cat){		   
		   $current_res= get_term_by('slug', $res_cat, 'resource-category');
		    $french_title = get_option( "taxonomy_term_$current_res->term_id" );
		 		$tax_term_id = $current_res->term_taxonomy_id;
				$images = get_option('taxonomy_image_plugin');
		    ?><?php $img_url=wp_get_attachment_url( $images[$tax_term_id], 'medium' ); ?>
           
        <div class="resource_wrap">
          <h3 class="heading">
          <?php if($img_url){?>
      			  <span>  <img src="<?php echo $img_url;?>" alt="*" style="  width: 50px;"></span>
          <?php }?>
              <?php  if($resource_category=='en-francais')
			 		 {?>
                     <?php if($french_title['french_title']){?>
          <?php echo $french_title['french_title'];?>
          <?php }else{?>
            <?php echo $current_res->name;?>
          <?php }?>
          <?php }else{?>
          <?php echo $current_res->name;?>
          <?php }?>
          </h3>
           
          
          <div class="inner">
            <div class="row">
                <?php 
					$count_resources=0;
					wp_reset_query();?>
               <?php query_posts(array('post_type'=>'resource','showposts'=>-1,'resource-category'=>$current_res->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
              <?php $res_c_tag=wp_get_post_terms($post->ID, 'resource-tag', array("fields" => "all"));?>
              <?php //print_r($res_c_tag);?>
              <?php
			  	$selected_tags=array();
			  foreach($res_c_tag as $cu_tags)
			  {
				  	$selected_tags[]=$cu_tags->slug;
			  }
			  if($resource_category=='en-francais')
			  {
				  	$download_btn_text='Téléchargez';
					$readmore_btn_text='Savoir plus';
			  }
			  else
			  {
				  $download_btn_text='Download';
				  $readmore_btn_text='Learn More';
			  }
			  ?>
              <?php if(in_array($resource_category,$selected_tags, true)){?>
             		 <div class="col-md-3 col-sm-3">
                <section>
                  <figure class="resource_type_detail">
                  	<div class="row">
                    	<div class="col-md-5">
                        	<div class="resource_type_icon">
                            	<i class="fa fa-file-pdf-o"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                        	<div class="resource_type_links">
                            	<a href="<?php echo get_post_meta($post->ID, "pdf_file", true);?>" class="btn_1" target="_blank"><?php echo $download_btn_text;?></a>
                                <a href="<?php the_permalink();?>" class="btn_1"><?php echo $readmore_btn_text;?></a>
                            </div>
                        </div>
                    </div>
                  </figure>
                  <article>
                  
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <h3 style="display:none"><a href="javascript:;">Name of Contributor</a></h3> 
                  </article>
                </section>
              </div>
              <?php }?>
              <?php endwhile; endif;?>  	
           
            </div>
          </div>
        </div>
        <?php }?>
         
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>