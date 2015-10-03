<?php /*Template Name:search*/?>
<?php get_header();?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>
          Search Results For <span style="text-transform:capitalize"><?php echo  get_search_query();?></span>
        </h2>
      </div>
      <div class="col-md-6">
        <div class="text-right">
          <ol class="breadcrumb">
            <li><a href="<?php bloginfo('url');?>">Home</a></li>
            <li class="active">
              Search
            </li>
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
          <div class="col-md-12"> </div>
        </div>
        <div class="resource_wrap"> 
          <div class="inner">
            <div class="row">
            <?php $count_search_results=1;?>
           					  <?php 
                             $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            // query_posts(array('post_type'=>'products','showpost'=>-1,'s'=>$search_keywrd));
							 ?>
                              <?php 
							  if(have_posts()): while(have_posts()): the_post(); 
							  $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>   
                              <?php if($count_search_results==1){?>
                                  <div class="col-md-4 col-sm-4">
                                    <section>
                                      <article>
                                      <?php }?>
                 			   <h3><a href="<?php the_permalink();?>"><?php the_title();?> - <?php $term_list = wp_get_post_terms($post->ID, 'resource-category');foreach($term_list as $term){ echo $term->name;}?></a></h3> 
								<?php if($count_search_results==3){$count_search_results=0; ?>
                                                  </article>
                                                </section>
                                              </div>
                                          <?php }?>
                              <?php $count_search_results++;?>
              
                                 <?php endwhile;?>
                                 <?php endif;?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>
