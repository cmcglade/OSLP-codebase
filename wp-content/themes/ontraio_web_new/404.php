	<?php if(is_user_logged_in()){?><?php }else{?>
    		<script>window.location="<?php bloginfo('url');?>/login/";</script>
    <?php }?>