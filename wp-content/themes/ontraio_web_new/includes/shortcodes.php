<?php
class AzalaanShortcodes {
  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) ); 
  }
  function add_shortcodes() {
    						add_shortcode('three-column', array( $this, 'three_column' ));
							}
							
							
  function three_column($atts, $content = null) { 
     return '<div class="span4">' . do_shortcode( $content ) .'</div>';
 }

  

 
  

  
 
  
 

}



new AzalaanShortcodes()



?>