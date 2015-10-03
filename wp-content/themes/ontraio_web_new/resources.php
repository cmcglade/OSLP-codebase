<?php /*Template Name:Resources*/?>
<?php get_header();?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php the_title();?></h2>
      </div>
      <div class="col-md-6">
        <div class="text-right">
          <ol class="breadcrumb">
            <li><a href="<?php bloginfo('url');?>">Home</a></li>
            <li class="active"><?php the_title();?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="widget">
        <div class="row">
          <div class="col-md-12">
            <div class="home_blog inner">
              <h3 class="heading">Articles</h3>
              <div class="inner" id="home_blog_slide"> 
                  <?php wp_reset_query();?>
 <?php query_posts(array('post_type'=>'post','showpost'=>10));?>      
                    	<?php if(have_posts()): while(have_posts()): the_post();?>
                        
	<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>  
              <a href="<?php the_permalink();?>">
                <figure> <img alt="*" src="<?php echo $src[0];?>" class="img-responsive"> </figure>
                <article>
                  <h3><?php the_title();?></h3>
                </article>
                </a>  
                
		         <?php endwhile; endif;?>  	
               </div>
            </div>
          </div>
        </div>
        <div class="resource_wrap">
          <h3 class="heading">Community Contributed Resources</h3>
          <div class="inner">
            <div class="row">
            <?php  
			$res_args = array(
						'parent '       => 0, 
						'hide_empty'    => false,           
					);
			 //$resource_category = get_terms( 'resource-category' ,$res_args );
			
			 $resource_category = apply_filters( 'taxonomy-images-get-terms', $res_args, array('taxonomy' => 'resource-category') );

			?>
            <?php foreach($resource_category as $resources_parent){ 
				$src=wp_get_attachment_image_src($resources_parent->image_id,'full');
				
				?>
              <div class="col-md-4 col-sm-4">
                <section>
                  <figure>  
                  <img src="<?php echo $src[0];?>" class="img-responsive" />
                  </figure>
                  <article> 
                    <h3><a href="<?php  echo esc_url( get_term_link( $resources_parent, $resources_parent->taxonomy ) )?>"><?php echo $resources_parent->name;?></a></h3>
                    <?php 
					$count_resources=0;
					wp_reset_query();?>
               <?php query_posts(array('post_type'=>'resource','showposts'=>-1,'resource-category'=>$resources_parent->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
                 <?php $count_resources++;?>
		         <?php endwhile; endif;?>  	
                 
                    <h3><a href="<?php  echo esc_url( get_term_link( $resources_parent, $resources_parent->taxonomy ) )?>"><?php echo $count_resources;?> Resources</a></h3>
                    <?php 
					$count_resources=0;
					wp_reset_query();?>
                 <?php query_posts(array('post_type'=>'resource','showposts'=>1,'resource-category'=>$resources_parent->slug));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
                    <!--<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>-->
                      <?php endwhile; endif;?>  
                  </article>
                </section>
              </div> 
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<?php get_footer();?>
