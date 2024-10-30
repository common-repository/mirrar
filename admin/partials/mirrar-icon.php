<?php
/**
 * Mirrar font icons
 *
 *
 * @link       http://mirrar.com/
 * @since      1.0.0
 *
 * @package    Mirrar
 * @subpackage Mirrar/admin/partials
 */
if(!function_exists('mirrar_icons')) {
	function mirrar_icons(){
		$output =  array(
					''												 => esc_html__('None', 'mirrar'),
					'fa-angle-double-down'        		         	 => esc_html__('&#xf103; fa-angle-double-down', 'mirrar'),
					'fa-angle-double-left'        		         	 => esc_html__('&#xf100; fa-angle-double-left', 'mirrar'),
					'fa-angle-double-right'        		         	 => esc_html__('&#xf101; fa-angle-double-right', 'mirrar'),
					'fa-angle-double-up'        		         	 => esc_html__('&#xf102; fa-angle-double-up', 'mirrar'),
					'fa-angle-down'        		         			 => esc_html__('&#xf107; fa-angle-down', 'mirrar'),
					'fa-angle-left'        		         			 => esc_html__('&#xf104; fa-angle-left', 'mirrar'),
					'fa-angle-right'        		         		 => esc_html__('&#xf105; fa-angle-right', 'mirrar'),
					'fa-angle-up'        		         			 => esc_html__('&#xf106; fa-angle-up', 'mirrar'),	
					'fa-arrow-circle-down'        		         	 => esc_html__('&#xf0ab; fa-arrow-circle-down', 'mirrar'),
					'fa-arrow-circle-left'        		         	 => esc_html__('&#xf0a8; fa-arrow-circle-left', 'mirrar'),
					'fa-arrow-circle-o-down'        		         => esc_html__('&#xf01a; fa-arrow-circle-o-down', 'mirrar'),
					'fa-arrow-circle-o-left'        		         => esc_html__('&#xf190; fa-arrow-circle-o-left', 'mirrar'),
					'fa-arrow-circle-o-right'        		         => esc_html__('&#xf18e; fa-arrow-circle-o-right', 'mirrar'),
					'fa-arrow-circle-o-up'        		         	 => esc_html__('&#xf01b; fa-arrow-circle-o-up', 'mirrar'),
					'fa-arrow-circle-right'        		         	 => esc_html__('&#xf0a9; fa-arrow-circle-right', 'mirrar'),
					'fa-arrow-circle-up'        		         	 => esc_html__('&#xf0aa; fa-arrow-circle-up', 'mirrar'),
					'fa-arrow-down'        		         			 => esc_html__('&#xf063; fa-arrow-down', 'mirrar'),
					'fa-arrow-left'        		         			 => esc_html__('&#xf060; fa-arrow-left', 'mirrar'),
					'fa-arrow-right'        		         		 => esc_html__('&#xf061; fa-arrow-right', 'mirrar'),
					'fa-arrow-up'        		         			 => esc_html__('&#xf062; fa-arrow-up', 'mirrar'),
					'fa-arrows'        		         		     	 => esc_html__('&#xf047; fa-arrows', 'mirrar'),
					'fa-arrows-alt'        		         		 	 => esc_html__('&#xf0b2; fa-arrows-alt', 'mirrar'),
					'fa-arrows-h'        		         		 	 => esc_html__('&#xf07e; fa-arrows-h', 'mirrar'),
					'fa-arrows-v'        		         		 	 => esc_html__('&#xf07d; fa-arrows-v', 'mirrar'),
					'fa-backward'        		         			 => esc_html__('&#xf04a; fa-backward', 'mirrar'),	
					'fa-camera'        		         				 => esc_html__('&#xf030; fa-camera', 'mirrar'),
					'fa-camera-retro'        		     			 => esc_html__('&#xf083; fa-camera-retro', 'mirrar'),
					'fa-caret-down'        		         			 => esc_html__('&#xf0d7; fa-caret-down', 'mirrar'), 
					'fa-caret-left'        		         			 => esc_html__('&#xf0d9; fa-caret-left', 'mirrar'),
					'fa-caret-right'        		     			 => esc_html__('&#xf0da; fa-caret-right', 'mirrar'),
					'fa-caret-square-o-down'        				 => esc_html__('&#xf150; fa-caret-square-o-down', 'mirrar'),
					'fa-caret-square-o-left'        				 => esc_html__('&#xf191; fa-caret-square-o-left', 'mirrar'),
					'fa-caret-square-o-right'        				 => esc_html__('&#xf152; fa-caret-square-o-right', 'mirrar'),
					'fa-caret-square-o-up'        		 		   	 => esc_html__('&#xf151; fa-caret-square-o-up', 'mirrar'),
					'fa-caret-up'        		         			 => esc_html__('&#xf0d8; fa-caret-up', 'mirrar'),
					'fa-check-circle'        		     			 => esc_html__('&#xf058; fa-check-circle', 'mirrar'),
					'fa-check-circle-o'        		     			 => esc_html__('&#xf05d; fa-check-circle-o', 'mirrar'),
					'fa-check-square'        		     			 => esc_html__('&#xf14a; fa-check-square', 'mirrar'),
					'fa-check-square-o'        		     			 => esc_html__('&#xf046; fa-check-square-o', 'mirrar'),
					'fa-chevron-circle-down'        				 => esc_html__('&#xf13a; fa-chevron-circle-down', 'mirrar'),
					'fa-chevron-circle-left'        				 => esc_html__('&#xf137; fa-chevron-circle-left', 'mirrar'),
					'fa-chevron-circle-right'        				 => esc_html__('&#xf138; fa-chevron-circle-right', 'mirrar'),
					'fa-chevron-circle-up'        		 			 => esc_html__('&#xf139; fa-chevron-circle-up', 'mirrar'),
					'fa-chevron-down'        		     			 => esc_html__('&#xf078; fa-chevron-down', 'mirrar'),
					'fa-chevron-left'        		     			 => esc_html__('&#xf053; fa-chevron-left', 'mirrar'),
					'fa-chevron-right'        		     			 => esc_html__('&#xf054; fa-chevron-right', 'mirrar'),
					'fa-chevron-up'        		         			 => esc_html__('&#xf077; fa-chevron-up', 'mirrar'),
					'fa-expand'        		         				 => esc_html__('&#xf065; fa-expand', 'mirrar'),					
					'fa-external-link'        		     			 => esc_html__('&#xf08e; fa-external-link', 'mirrar'),
					'fa-external-link-square'        				 => esc_html__('&#xf14c; fa-external-link-square', 'mirrar'),
					'fa-fast-backward'        		     			 => esc_html__('&#xf049; fa-fast-backward', 'mirrar'),
					'fa-fast-forward'        		     			 => esc_html__('&#xf050; fa-fast-forward', 'mirrar'),
					'fa-forward'        		         			 => esc_html__('&#xf04e; fa-forward', 'mirrar'),
					'fa-foursquare'        		         			 => esc_html__('&#xf180; fa-foursquare', 'mirrar'),	
					'fa-long-arrow-down'        		 			 => esc_html__('&#xf175; fa-long-arrow-down', 'mirrar'),
					'fa-long-arrow-left'        		 			 => esc_html__('&#xf177; fa-long-arrow-left', 'mirrar'),
					'fa-long-arrow-right'        		 			 => esc_html__('&#xf178; fa-long-arrow-right', 'mirrar'),
					'fa-long-arrow-up'        		     			 => esc_html__('&#xf176; fa-long-arrow-up', 'mirrar')
		            );
    return $output;
    }
}
?>