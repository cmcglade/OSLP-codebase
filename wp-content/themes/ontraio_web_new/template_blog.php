<?php /*Template Name:Blog*/ 
get_header();?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Articles</h2>
      </div>
      <div class="col-md-6">
        <div class="text-right">
          <ol class="breadcrumb">
            <li><a href="<?php bloginfo('url');?>">Home</a></li>
            <li class="active">Blog</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="widget">
        <div class="blog-posts clearfix">
          <?php  wp_reset_query();?>
          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
               <?php query_posts(array('post_type'=>'post','paged'=>$paged));?>
              <?php if(have_posts()): while(have_posts()): the_post();?>
              	<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>  
                <?php $post_categories = wp_get_post_categories( $post->ID );?>
          <article class="post post-medium">
            <div class="row">
            <?php if($src[0]){?>
              <div class="col-md-5">
                <div class="post-image"> <img src="<?php echo $src[0];?>" class="img-responsive"> </div>
              </div>
              <?php }?>
              <div class="col-md-<?php if($src[0]){?>7<?php }else{?>12<?php }?>">
                <div class="post-content">
                  <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                  <?php the_excerpt();?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="post-meta"> <span><i class="fa fa-calendar"></i> <?php the_time('F jS, Y') ?> </span> <span><i class="fa fa-user"></i> By <a href="#"><?php the_author() ?></a> </span> <span><i class="fa fa-tag"></i>
               <?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo trim($output, $separator);
}
?>
                 
                 </span> <span><i class="fa fa-comments"></i> <a href="#">  <?php comments_number( 'no responses', 'one response', '% responses' ); ?>. </a></span>
                 <a href="<?php the_permalink();?>" class="btn btn-xs btn-default pull-right">Read more...</a> </div>
              </div>
            </div>
          </article> 
              <?php endwhile; endif;?>  
        
          <?php  wp_paginate();?>
        </div>
      </div>
    </div>
<?php include('blog_sidebar.php');?>
  </div>
</div>
<?php get_footer();?>
