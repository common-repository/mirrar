<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://mirrar.com/
 * @since      1.0.0
 *
 * @package    Mirrar
 * @subpackage Mirrar/admin/partials
 */ 
if(!function_exists('mirrar_option_fields')){
   function mirrar_option_fields(){
   		$args = array('mirrar_button_position', 'mirrar_button_alignment', 'mirrar_button_text', 'mirrar_brand_id', 'mirrar_global', 'mirrar_shop', 'mirrar_single_product', 'mirrar_text_font_size', 'mirrar_text_font_weight', 'mirrar_border_size', 'mirrar_border_radius', 'mirrar_button_background', 'mirrar_text_font_color', 'mirrar_border_color', 'mirrar_hover_color', 'mirrar_vertically_padding', 'mirrar_horizontally_padding', 'mirrar_top_margin', 'mirrar_right_margin', 'mirrar_bottom_margin', 'mirrar_left_margin', 'mirrar_button_icon', 'mirrar_icon_position', 'mirrar_2D_transitions_hover', 'mirrar_background_transitions_hover', 'mirrar_style', 'mirrar_btn_shadow_horizontal_offset', 'mirrar_btn_vertical_offset', 'mirrar_btn_blur', 'mirrar_btn_spread', 'mirrar_shadow_color', 'mirrar_shadow_type','mirrar_btn_product_css','mirrar_btn_product_class','mirrar_btn_category_css','mirrar_btn_category_class','mirrar_btn_checkbox','mirrar_all_post_type','mirrar_all_taxonomy');
   		return $args;
   }
}
?>