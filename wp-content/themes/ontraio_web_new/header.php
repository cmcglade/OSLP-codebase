<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta name="description" content="">

<!-- Mobile Specific Metas
  ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
  ================================================== -->

<link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/layout.css">
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/theme.css">

<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url');?>/assets/js/html5.js"></script>
    <script src="<?php bloginfo('template_url');?>/assets/js/css3-mediaqueries.js"></script>
    <script type='text/javascript' src="<?php bloginfo('template_url');?>/assets/js/respond.js"></script>
<![endif]-->

<!-- Google Font Api
  ================================================== -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>

<!-- Favicons
	================================================== -->
    
<?php wp_head(); ?> 
</head>
<body>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="logo"> <a href="<?php bloginfo('url'); ?>"> <img alt="*" src="<?php bloginfo('template_url');?>/assets/images/logo.png" class="img-responsive"> </a> </div>
      </div>
      <div class="col-md-8">
        <div class="header_right">
          <article>
            <div class="input-group">
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="text" name="s" id="s" placeholder="Search" value="">
              <input type="hidden" name="post_type" value="resource">
              <button class="button-search" type="submit"> <i class="fa fa-search"></i> </button>
              </form>
            </div>
            <div class="tp-nav clearfix">
              <ul class="mobile_meu">
              <?php if(is_user_logged_in()){?>
              <li><a href="<?php bloginfo('url'); ?>/profile/"><i class="fa fa-key"></i> View Profile</a></li>
              <?php }else{?>
                <li><a href="<?php bloginfo('url'); ?>/login/"><i class="fa fa-key"></i> Sign In</a></li>
                <li><a href="<?php bloginfo('url'); ?>/register/"><i class="fa fa-gear"></i> Register </a></li>
              <?php }?>
              </ul>
            </div>
          </article>
          <div class="main_nav clearfix">
          	          <?php
           wp_nav_menu( array( 'theme_location' => 'main','menu_id' => '' ,'menu_class' => 'sf-menu clearfix mobile_meu', 'container' => false ) );   
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>