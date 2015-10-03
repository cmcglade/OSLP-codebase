<?php get_header();?>
<?php include('slider.php');?>

<div class="home_box_wrap">
  <div class="container">
    <div class="row">
      <div class="search_resource">
        <form role="search" method="get" id="searchform" class="validate_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <input type="hidden" name="post_type" value="resource">
          <span>
          <input type="text" name="s" id="s" placeholder="Search Resources" class="form-control">
          <button class="button-search" type="submit"> <i class="fa fa-search"></i> </button>
          </span>
        </form>
      </div>
    </div>
    <div class="row">
      <?php  
			$res_args = array( 
						'hide_empty'    => 0,           
					);
			 //$resource_category = get_terms( 'resource-category' ,$res_args );
			
			 $resource_tags = apply_filters( 'taxonomy-images-get-terms', $res_args, array('taxonomy' => 'resource-tag') );

			?>
      <?php foreach($resource_tags as $resources_tags){ 
				$src=wp_get_attachment_image_src($resources_tags->image_id,'full');
			 
				?>
      <div class="col-md-3 col-md-3">
        <section>
          <figure> <img alt="*" src="<?php echo $src[0];?>" class="img-responsive"> </figure>
          <article>
            <h3><?php echo $resources_tags->name;?></h3> 
            <a href="<?php  echo esc_url( get_term_link( $resources_tags, $resources_tags->taxonomy ) )?>">more</a> </article>
        </section>
      </div>
      <?php }?>
    </div>
  </div>
</div>
<div class="home_video">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <section>
          <div class="row">
            <div class="col-md-8">
            
              <div class="video">
              	<h3 class="heading">Summer Learning is...</h3>
       
                <iframe width="100%" height="190" src="https://www.youtube.com/embed/-HXuMynb0SU" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="col-md-4">
            	<div class="download_guide">
                	<a href="<?php bloginfo('url');?>/wp-content/uploads/2015/04/SLLP-Planning-Guide-2014-English_HR.pdf">
                        <img src="<?php bloginfo('url');?>/wp-content/uploads/2015/04/SSLPG-Summer_2014.png" style="width: 100%;" />
                        <h3>Download the SLP Planning Guide</h3>
                    </a>
                </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-md-6">
        <section>
          <div class="row">
            <div class="col-md-8">
              <div class="video">
              	<h3 class="heading">L'apprentissage d'été c'est...</h3>
             
                <iframe width="100%" height="190" src="https://www.youtube.com/embed/sD3MMFrq0GU" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="col-md-4">
            	<div class="download_guide">
                	<a href="<?php bloginfo('url');?>/wp-content/uploads/2015/04/SLLP-Planning-Guide-2014-French_D2.pdf">
                      <img src="<?php bloginfo('url');?>/wp-content/uploads/2015/04/SSLPG-Summer_2014-FR.png" style="  width: 100%;" />
                        <h3>Télécharger le guide de planification </h3>
                    </a>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
</div>
<div class="home_blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="heading">Articles</h2>
      </div>
    </div>
    <div class="inner" id="home_blog_slide">
      <?php wp_reset_query();?>
      <?php query_posts(array('post_type'=>'post','showpost'=>10));?>
      <?php if(have_posts()): while(have_posts()): the_post();?>
      <?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>
      <a href="<?php the_permalink();?>">
      <figure> <img alt="*" src="<?php echo $src[0];?>" class="img-responsive"> </figure>
      <article>
        <h3>
          <?php the_title();?>
        </h3>
      </article>
      </a>
      <?php endwhile; endif;?>
    </div>
  </div>
</div>
<?php get_footer();?>
