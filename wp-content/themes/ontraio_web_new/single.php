<?php get_header();?>
<?php if(have_posts()): while(have_posts()): the_post();?>
<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>  
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
             <li><a href="<?php bloginfo('url');?>/blog">Blog</a></li>
            <li class="active"><?php the_title();?></li>
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
        <div class="blog-posts single-post clearfix">
          <article class="post post-large blog-single-post">
          <?php if($src[0]){?>
            <div class="post-image"> <img src="<?php echo $src[0];?>" class="img-responsive" width="796"> </div>
            <?php }?> 
            <div class="post-date"> <span class="day"><?php the_time('j') ?></span> <span class="month"><?php the_time('F') ?></span> </div>
            <div class="post-content">
              <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
              <div class="post-meta"> <span><i class="fa fa-user"></i> By <a href="#"><?php the_author() ?></a> </span> <span><i class="fa fa-tag"></i> <?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo trim($output, $separator);
}
?></span> <span><i class="fa fa-comments"></i> <a href="#"> <?php comments_number( 'no responses', 'one response', '% responses' ); ?></a></span> </div>
             <?php the_content();?>
               
              <div class="post-block post-comments clearfix">
                <h3><i class="fa fa-comments"></i><?php comments_number( 'no responses', 'one response', '% responses' ); ?></h3>
                  <?php comments_template();?>
              </div>
              <div class="post-block post-leave-comment" style="display:none">
                <h3>Leave a comment</h3>
                <form action="" method="post">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>Your name *</label>
                        <input type="text" value="" maxlength="100" class="form-control" name="name" id="name">
                      </div>
                      <div class="col-md-6">
                        <label>Your email address *</label>
                        <input type="email" value="" maxlength="100" class="form-control" name="email" id="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label>Comment *</label>
                        <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" value="Post Comment" class="btn btn-primary" data-loading-text="Loading...">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
    
    
             <?php endwhile; endif;?>  
    
<?php include('blog_sidebar.php');?>
  </div>
</div>
<?php get_footer();?>
