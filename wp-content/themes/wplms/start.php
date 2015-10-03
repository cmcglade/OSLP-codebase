<?php
/**
 * Template Name: Start Course Page
 */

// COURSE STATUS : 
// 0 : NOT STARTED 
// 1: STARTED 
// 2 : SUBMITTED
// > 2 : EVALUATED

do_action('wplms_before_start_course');

get_header('buddypress');

do_action('wplms_start_course');

$user_id = get_current_user_id();  

if(isset($_POST['course_id'])){
    $course_id=$_POST['course_id'];
    $coursetaken=get_user_meta($user_id,$course_id,true);
}else if(isset($_COOKIE['course'])){
      $course_id=$_COOKIE['course'];
      $coursetaken=1;
}

if(!isset($course_id) || !is_numeric($course_id))
    wp_die(__('INCORRECT COURSE VALUE. CONTACT ADMIN','vibe'));

$course_curriculum=vibe_sanitize(get_post_meta($course_id,'vibe_course_curriculum',false));
$unit_id = wplms_get_course_unfinished_unit($course_id);



if ( have_posts() ) : while ( have_posts() ) : the_post();

?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="unit_content">
                <div class="unit_title">
                	<?php
            		if(isset($unit_id)){
                		the_unit_tags($unit_id);
                        if(is_numeric($unit_id))
                		  the_unit_instructor($unit_id);
                        else
                          the_unit_instructor($course_id);  
                	}
                    $minutes=0;
                    $mins = get_post_meta($unit_id,'vibe_duration',true);
                    $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter',60);
                    if($mins){
                        if($mins > $unit_duration_parameter){
                          $hours = floor($mins/$unit_duration_parameter);
                          $minutes = $mins - $hours*$unit_duration_parameter;
                        }
                      
                        do_action('wplms_course_unit_meta');
                        if($mins < 9999){
                          if($unit_duration_parameter == 1)
                            echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Minutes','vibe'):'').' '.$minutes.__(' seconds','vibe').'</span>';
                          else if($unit_duration_parameter == 60)
                            echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Hours','vibe'):'').' '.$minutes.__(' minutes','vibe').'</span>';
                          else if($unit_duration_parameter == 3600)
                            echo '<span><i class="icon-clock"></i> '.(isset($hours)?$hours.__(' Days','vibe'):'').' '.$minutes.__(' hours','vibe').'</span>';
                        } 

                      }
                	?>
                	<h1><?php 
                    if(isset($course_id)){
                    	echo get_the_title($unit_id);
                    }else
                    	the_title();
                     ?></h1>
                    <?php
					if(isset($course_id)){
                    	the_sub_title($unit_id);
                    }else{
                    	the_sub_title();	
                    }	
                    ?>	
                </div>
                    <?php

                    if(isset($coursetaken) && $coursetaken && $unit_id !=''){
                    	if(isset($course_curriculum) && is_array($course_curriculum)){
							the_unit($unit_id);
                    	}else{
                    		echo '<h3>';
                    		_e('Course Curriculum Not Set.','vibe');
                    		echo '</h3>';
                    	}
                    }else{
                        the_content();
                    }
                    
                endwhile;
                endif;
                ?>
                <?php
                $units=array();
                if(isset($course_curriculum) && is_array($course_curriculum) && count($course_curriculum)){
                  foreach($course_curriculum as $key=>$curriculum){
                    if(is_numeric($curriculum)){
                        $units[]=$curriculum;
                    }
                  }
                }else{
                    echo '<div class="error"><p>'.__('Course Curriculum Not Set','vibe').'</p></div>';
                }   

                  if($unit_id ==''){
                    echo  '<div class="unit_prevnext"><div class="col-md-3"></div><div class="col-md-6">
                          '.((isset($done_flag) && $done_flag)?'': '<a href="#" data-unit="'.$units[0].'" class="unit unit_button">'.__('Start Course','vibe').'</a>').
                        '</div></div>';
                  }else{

                    $k = array_search($unit_id,$units);
                  
                  if(empty($k)) $k = 0;

            	  $next=$k+1;
                  $prev=$k-1;
                  $max=count($units)-1;

                  $done_flag=get_user_meta($user_id,$unit_id,true);
                  

                  echo  '<div class="unit_prevnext"><div class="col-md-3">';
                  if($prev >=0){
                    if(get_post_type($units[$prev]) == 'quiz'){
                            $quiz_status = get_user_meta($user_id,$units[$prev],true);
                            if(!empty($quiz_status))
                                echo '<a href="#" data-unit="'.$units[$prev].'" class="unit unit_button">'.__('Back to Quiz','vibe').'</a>';
                            else          
                                echo '<a href="'.get_permalink($units[$prev]).'" class=" unit_button">'.__('Back to Quiz','vibe').'</a>';
                        }else    
                            echo '<a href="#" id="prev_unit" data-unit="'.$units[$prev].'" class="unit unit_button">'.__('Previous Unit','vibe').'</a>';
                  }
                  echo '</div>';

                  echo  '<div class="col-md-6">';
                    if(!isset($done_flag) || !$done_flag){
                            if(get_post_type($units[($k)]) == 'quiz'){
                                $quiz_status = get_user_meta($user_id,$units[($k)],true);
                                if(is_numeric($quiz_status)){
                                    echo '<a href="'.bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_RESULTS_SLUG.'/?action='.$units[($k)].'" class="quiz_results_popup">'.__('Check Results','vibe').'</a>';
                                }else{
                                    echo '<a href="'.get_permalink($units[($k)]).'" class=" unit_button">'.__('Start Quiz','vibe').'</a>';
                                }
                            }else{
                                echo apply_filters('wplms_unit_mark_complete','<a href="#" id="mark-complete" data-unit="'.$units[($k)].'" class="unit_button">'.__('Mark this Unit Complete','vibe').'</a>',$unit_id,$course_id);
                            }
                    }else{
                        if(get_post_type($units[($k)]) == 'quiz'){
                            echo '<a href="'.bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_RESULTS_SLUG.'/?action='.$units[($k)].'" class="quiz_results_popup">'.__('Check Results','vibe').'</a>';
                          }
                          // If unit does not show anything
                    }
                    echo '</div>';

                  echo  '<div class="col-md-3">';

                  $nextflag=1;
                  if($next <= $max){
                    $nextunit_access = vibe_get_option('nextunit_access');
                    if(isset($nextunit_access) && $nextunit_access){
                        for($i=0;$i<$next;$i++){
                            $status = get_post_meta($units[$i],$user_id,true);
                            if(!empty($status)){
                                $nextflag=0;
                                break;
                            }
                        }
                    }
                    if($nextflag){
                        if(get_post_type($units[$next]) == 'quiz'){
                            $quiz_status = get_user_meta($user_id,$units[$next],true);
                            if(!empty($quiz_status))
                                echo '<a href="#" data-unit="'.$units[$next].'" class="unit unit_button">'.__('Proceed to Quiz','vibe').'</a>';
                            else          
                                echo '<a href="'.get_permalink($units[$next]).'" class=" unit_button">'.__('Proceed to Quiz','vibe').'</a>';
                        }else{
                            if(get_post_type($units[$next]) == 'unit'){ //Display Next unit link because current unit is a quiz on Page reload
                                echo '<a href="#" id="next_unit" data-unit="'.$units[$next].'" class="unit unit_button">'.__('Next Unit','vibe').'</a>';
                            }else{
                                echo '<a href="#" id="next_unit" data-unit="'.$units[$next].'" class="unit unit_button hide">'.__('Next Unit','vibe').'</a>';
                            }
                        } 
                    }else{
                        echo '<a href="#" id="next_unit" class="unit unit_button hide">'.__('Next Unit','vibe').'</a>';
                    }
                  }
                  echo '</div></div>';

                } // End the Bug fix on course begining
	            ?>
                </div>
                <?php
                	wp_nonce_field('security','hash');
                	echo '<input type="hidden" id="course_id" name="course" value="'.$course_id.'" />';
                ?>
            </div>
            <div class="col-md-3">
            	<div class="course_time">
            		<?php
            			the_course_time("course_id=$course_id&user_id=$user_id");

            		?>
            	</div>
                <?php 

                do_action('wplms_course_start_after_time',$course_id,$unit_id);  

                echo the_course_timeline($course_id,$unit_id);

                do_action('wplms_course_start_after_timeline',$course_id,$unit_id);

            	if(isset($course_curriculum) && is_array($course_curriculum)){
            		?>
            	<div class="more_course">
            		<a href="<?php echo get_permalink($course_id); ?>" class="unit_button full button"><?php _e('BACK TO COURSE','vibe'); ?></a>
            		<form action="<?php echo get_permalink($course_id); ?>" method="post">
            		<?php
            		$finishbit=get_post_meta($course_id,$user_id,true);
            		if(isset($finishbit) && $finishbit!=''){
            			if($finishbit>0 && $finishbit < 3){
                            echo '<input type="submit" name="review_course" class="review_course unit_button full button" value="'. __('REVIEW COURSE ','vibe').'" />';
            			    echo '<input type="submit" name="submit_course" class="review_course unit_button full button" value="'. __('FINISH COURSE ','vibe').'" />';
            			}
            		}
            		?>	
            		<?php wp_nonce_field($course_id,'review'); ?>
            		</form>
            	</div>
            	<?php
            		}
            	?>	
            </div>
        </div>
    </div>
</section>
</div>

<?php
get_footer();
?>