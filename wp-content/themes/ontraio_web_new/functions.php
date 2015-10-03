<?php
include ( TEMPLATEPATH . '/includes/custom-posts.php');
include ( TEMPLATEPATH . '/includes/shortcodes.php');

function excerpt($text, $chars) 
{ 
$text = $text . " "; 
$text = strip_tags($text); 
$text = substr($text,0,$chars); 
$text = substr($text,0,strrpos($text,' ')); 
$text = $text . "..."; 
echo $text; 
}


   register_nav_menus( 
					   array
							(
							'main' =>'Main menu',
							'about_menu' =>'About menu'
						 
							) 
					 );

add_theme_support( 'post-thumbnails' );

register_sidebar( array(
'name' => 'Blog Sidebar',
'before_widget' => '<div class="blog_sidebar clearfix">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>')
);


register_sidebar( array(
'name' => 'Footer Widgets',
'before_widget' => '<div class="col-md-3"><div class="inner recent_upload">',
'after_widget' => '</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>')
);

register_sidebar( array(
'name' => 'Other Sidebar',
'before_widget' => '<div class="small_widget">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>')
); 

add_filter( 'nav_menu_css_class', 'nav_parent_class', 10, 2 );

function nav_parent_class( $classes, $item ) {
    $cpt_name = 'process-circle';
    $menu_item_id = 2201; // id of menu item to add current-menu-item class to

    if ( $cpt_name == get_post_type() ) {
		
	$classes = array_filter($classes, ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item' ? false : true ));
        if( $item->ID == $menu_item_id ) {
            $classes[] = 'current-menu-item current_page_item ';
        }
		
    }

    return $classes;
}
function lab_logged_in_bbptopics($have_posts){
	if (!is_user_logged_in()){
		header("Location: /forum-login/");
		exit ;
		}
return $have_posts;
}
add_filter('bbp_has_topics', 'lab_logged_in_bbptopics');
add_filter('bbp_has_forums', 'lab_logged_in_bbptopics');
add_filter('bbp_has_replies', 'lab_logged_in_bbptopics');