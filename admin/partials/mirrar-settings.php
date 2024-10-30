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
 *
 * Get mirrar icons
 */
 if(function_exists('mirrar_icons')) {
  $mirrar_icons = '';
  $mirrar_icons = mirrar_icons();
 }

 /**
 * Get mirrar option fields value
 */
 if(function_exists('mirrar_option_fields')){
  $mirrar_button_position = $mirrar_button_position_up = $mirrar_button_position_left = $mirrar_button_position_right = $mirrar_button_position_down = $mirrar_button_alignment = $mirrar_button_alignment_right = $mirrar_button_alignment_left = $mirrar_button_alignment_center = $mirrar_button_text = $mirrar_brand_id = $mirrar_global = $mirrar_global_toggle_class = $mirrar_global_cheked = $mirrar_shop = $mirrar_shop_toggle_class = $mirrar_shop_cheked = $mirrar_single_product = $mirrar_single_product_toggle_class = $mirrar_single_product_cheked = $mirrar_button_background = $mirrar_text_font_size = $mirrar_text_font_weight = $mirrar_border_size = $mirrar_border_radius = $mirrar_text_font_color = $mirrar_border_color = $mirrar_hover_color = $mirrar_vertically_padding = $mirrar_horizontally_padding = $mirrar_top_margin = $mirrar_right_margin = $mirrar_bottom_margin = $mirrar_left_margin = $mirrar_button_icon = $mirrar_icon_position = $mirrar_icon_position_left = $mirrar_icon_position_right = $mirrar_2D_transitions_hover = $mirrar_background_transitions_hover = $mirrar_style = $get_value_style = $mirrar_btn_shadow_horizontal_offset = $mirrar_btn_vertical_offset = $mirrar_btn_blur = $mirrar_btn_spread = $mirrar_shadow_color = $mirrar_shadow_type_outset  = $mirrar_shadow_type_inset = $mirrar_btn_product_css = $mirrar_btn_product_class  = $mirrar_btn_category_css = $mirrar_btn_category_class = $mirrar_btn_checkbox = $mirrar_all_post_type = $mirrar_all_taxonomy = $mirrar_btn_checkbox_class = $mirrar_btn_checkbox_checked = ''; 
  $args = mirrar_option_fields();
  
  if(!empty($args)) {
    foreach($args as $args_val){
          switch($args_val){
            case 'mirrar_button_position':
                $mirrar_button_position = !empty(get_option($args_val)) ? get_option($args_val) : '';
                if($mirrar_button_position == 'up'){
                         $mirrar_button_position_up = 'selected';
                }else if($mirrar_button_position == 'left'){
                   $mirrar_button_position_left = 'selected';
                }else if($mirrar_button_position == 'right'){
                   $mirrar_button_position_right = 'selected';
                }else{
                         $mirrar_button_position_down = 'selected';
                }
            break;
            case 'mirrar_button_alignment':
                $mirrar_button_alignment = !empty(get_option($args_val)) ? get_option($args_val) : '';
                if($mirrar_button_alignment == 'right'){
                        $mirrar_button_alignment_right = 'selected';
                }else if($mirrar_button_alignment == 'left'){
                  $mirrar_button_alignment_left = 'selected';
                }else if($mirrar_button_alignment == 'center'){
                  $mirrar_button_alignment_center = 'selected';
                }
            break;
            case 'mirrar_button_text':
                $mirrar_button_text = !empty(get_option($args_val)) ? get_option($args_val) : 'Virtual Try On';
            break;
            case 'mirrar_brand_id':
                $mirrar_brand_id = !empty(get_option($args_val)) ? get_option($args_val) : '';
            break;
            case 'mirrar_global':
                $mirrar_global = !empty(get_option($args_val)) ? 'true' : 'false';
                if($mirrar_global == 'true'){
                $mirrar_global_toggle_class = 'toggle-on'; 
                $mirrar_global_cheked = 'checked="checked"'; 
                }else{
                  $mirrar_global_toggle_class = 'toggle-off';
                  $mirrar_global_cheked = ''; 
                }
            break;
            case 'mirrar_shop':
                $mirrar_shop = !empty(get_option($args_val)) ? 'true' : 'false';
                if($mirrar_shop == 'true'){
                $mirrar_shop_toggle_class = 'toggle-on'; 
                $mirrar_shop_cheked = 'checked="checked"'; 
                }else{
                  $mirrar_shop_toggle_class = 'toggle-off';
                  $mirrar_shop_cheked = ''; 
                }
            break;
            case 'mirrar_single_product':
                $mirrar_single_product = !empty(get_option($args_val)) ? 'true' : 'false';
                if($mirrar_single_product == 'true'){
                $mirrar_single_product_toggle_class = 'toggle-on'; 
                $mirrar_single_product_cheked = 'checked="checked"'; 
                }else{
                  $mirrar_single_product_toggle_class = 'toggle-off';
                  $mirrar_single_product_cheked = ''; 
                }
            break;
            case 'mirrar_button_background':
                $mirrar_button_background = !empty(get_option($args_val)) ? get_option($args_val) : '#fe007d';
            break;
            case 'mirrar_text_font_size':
                $mirrar_text_font_size = !empty(get_option($args_val)) ? get_option($args_val) : 15;
            break;
            case 'mirrar_text_font_weight':
                $mirrar_text_font_weight = !empty(get_option($args_val)) ? get_option($args_val) : 200;
            break;
                case 'mirrar_border_size':
                      $mirrar_border_size = !empty(get_option($args_val)) ? get_option($args_val) : 1;
                break;
            case 'mirrar_border_radius':
                $mirrar_border_radius = !empty(get_option($args_val)) ? get_option($args_val) : 2;
            break;
            case 'mirrar_text_font_color':
                $mirrar_text_font_color = !empty(get_option($args_val)) ? get_option($args_val) : '#ffffff';
            break;
            case 'mirrar_border_color':
                $mirrar_border_color = !empty(get_option($args_val)) ? get_option($args_val) : '#fe007d';
            break;
            case 'mirrar_hover_color':
                $mirrar_hover_color = !empty(get_option($args_val)) ? get_option($args_val) : '#d8006a';
            break;
            case 'mirrar_vertically_padding':
                $mirrar_vertically_padding = !empty(get_option($args_val)) ? get_option($args_val) : 8;
            break;
            case 'mirrar_horizontally_padding':
                $mirrar_horizontally_padding = !empty(get_option($args_val)) ? get_option($args_val) : 25;
            break;
            case 'mirrar_top_margin':
                $mirrar_top_margin = !empty(get_option($args_val)) ? get_option($args_val) : 0;
            break;
            case 'mirrar_right_margin':
                $mirrar_right_margin = !empty(get_option($args_val)) ? get_option($args_val) : 0;
            break;
            case 'mirrar_bottom_margin':
                $mirrar_bottom_margin = !empty(get_option($args_val)) ? get_option($args_val) : 0;
            break;
            case 'mirrar_left_margin':
                $mirrar_left_margin = !empty(get_option($args_val)) ? get_option($args_val) : 0;
            break;
                case 'mirrar_btn_shadow_horizontal_offset':
                      $mirrar_btn_shadow_horizontal_offset = !empty(get_option($args_val)) ? get_option($args_val) : 0;
                break;
                case 'mirrar_btn_vertical_offset':
                      $mirrar_btn_vertical_offset = !empty(get_option($args_val)) ? get_option($args_val) : 0;
                break;
                case 'mirrar_btn_blur':
                      $mirrar_btn_blur = !empty(get_option($args_val)) ? get_option($args_val) : 0;
                break;
                case 'mirrar_btn_spread':
                      $mirrar_btn_spread = !empty(get_option($args_val)) ? get_option($args_val) : 0;
                break;
                case 'mirrar_shadow_color':
                      $mirrar_shadow_color = !empty(get_option($args_val)) ? get_option($args_val) : '';
                break;
                case 'mirrar_shadow_type':
                      $mirrar_shadow_type = !empty(get_option($args_val)) ? get_option($args_val) : 'inset';
                      if($mirrar_shadow_type == 'inset'){
                        $mirrar_shadow_type_inset = 'selected';
                      }else{
                        $mirrar_shadow_type_outset = '';
                      }
                break;
            case 'mirrar_button_icon':
                $mirrar_button_icon = !empty(get_option($args_val)) ? get_option($args_val) : 'fa-camera';
            break;
            case 'mirrar_icon_position':
                $mirrar_icon_position = !empty(get_option($args_val)) ? get_option($args_val) : 'left';
                if($mirrar_icon_position == 'left'){
                        $mirrar_icon_position_left = 'selected';
                }else{
                        $mirrar_icon_position_right = 'selected';
                }
            break;
            case 'mirrar_style':
                  $get_value_style = !empty(get_option($args_val)) ? get_option($args_val) : '';
               
                  if(!empty($get_value_style)){
                            $mirrar_style =  $get_value_style;
                  }else{
                            $mirrar_style = 'font-size: 15px; border-width: 1px; border-style: solid; border-radius: 2px; background: rgb(254, 0, 125); color: rgb(255, 255, 255); border-color: rgb(254, 0, 125); padding: 8px 25px; box-shadow: rgb(255, 255, 255) 0px 0px 0px 0px inset; font-weight: 258; margin-top: 0px; outline: none;';
                  }
            break;

                case 'mirrar_btn_product_css':
                  $mirrar_btn_product_css = !empty(get_option($args_val)) ? get_option($args_val) : '';
                break;
                case 'mirrar_btn_product_class':
                  $mirrar_btn_product_class = !empty(get_option($args_val)) ? get_option($args_val) : '';
                break;
                case 'mirrar_btn_category_css':
                  $mirrar_btn_category_css = !empty(get_option($args_val)) ? get_option($args_val) : '';
                break;
                case 'mirrar_btn_category_class':
                  $mirrar_btn_category_class = !empty(get_option($args_val)) ? get_option($args_val) : '';
                break;

                case 'mirrar_btn_checkbox':
                  $mirrar_btn_checkbox = get_option($args_val, 'false'); 
                  if($mirrar_btn_checkbox == 'true'){
                    $mirrar_btn_checkbox_class = 'toggle-on'; 
                    $mirrar_btn_checkbox_cheked = 'checked="checked"'; 
                  }else{
                    $mirrar_btn_checkbox_class = 'toggle-off';
                    $mirrar_btn_checkbox_cheked = ''; 
                  }
                  break;
                case 'mirrar_all_post_type':
                  $mirrar_all_post_type = !empty(get_option($args_val)) ? get_option($args_val) : '';
                  break;
                case 'mirrar_all_taxonomy':
                  $mirrar_all_taxonomy = !empty(get_option($args_val)) ? get_option($args_val) : '';
                  break;
          }
     }
   }
 }
 echo '<section class="wall clear WooCommercForm"  id="ToggleForm">
      <div class="container">
        <div class="FormInside wall clear">
          <form class="wall" method="post" action="options.php">';
            settings_fields('mirrar-settings');
            do_settings_sections('mirrar-settings');
      echo '<div class="EditBtnInsideHere wall clear">
               <div class="wall EditBtnInside clear">';
                    $icon_and_text_left = '';
                    $icon_and_text_right = '';
                    if(!empty($mirrar_button_icon)){
                        if( $mirrar_icon_position == 'left'){
                          $icon_and_text_left = '<i class="fa ' . esc_attr($mirrar_button_icon) . '"></i> ' . $mirrar_button_text;
                          if(!empty($mirrar_style)){
                        echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style">' . wp_kses( $icon_and_text_left, array('i' => array('class' => array())) ) . '</button>';
                      }else{
                        echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" data-title-slug="mirrar-style">' . esc_html($mirrar_button_text) . '</button>';
                      }
                        }else{
                            $icon_and_text_right = $mirrar_button_text . ' <i class="fa ' . esc_attr($mirrar_button_icon) . '"></i>';
                            if(!empty($mirrar_style)){
                        echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style">' . wp_kses( $icon_and_text_right, array('i' => array('class' => array())) ) . '</button>';
                      }else{
                        echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" data-title-slug="mirrar-style">' . esc_html($mirrar_button_text) . '</button>';
                      }
                        }
                    }else{
                      if(!empty($mirrar_style)){
                      echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style">' . esc_html($mirrar_button_text) . '</button>';
                    }else{
                      echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single mirrar-button-change" data-title-slug="mirrar-style">' . esc_html($mirrar_button_text) . '</button>';
                    }
                    }
           echo '</div>
            </div>
            <div class="w-50 float-left LeftSide p-3">
              <div class="HedingDiv wall" style="margin-bottom: 15px;">
                <h3 style="margin-top:0px;">' . esc_html__('Cart Button Settings', 'mirrar') . '</h3>
              </div>
               <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Apply mirrAR button on shop', 'mirrar') . '</label>
                <div class="onoffswitch2 w-50 float-left">
                  <input type="checkbox" name="mirrar_shop" class="onoffswitch2-checkbox" id="mirrar_shop" value="' . esc_attr($mirrar_shop) . '" ' . esc_attr($mirrar_shop_cheked) . '>
                  <label class="toggle float-right ' . esc_attr($mirrar_shop_toggle_class) . '" for="mirrar_shop" data-input-id="mirrar_shop"></label>
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Apply button on each product', 'mirrar') . '</label>
                <div class="onoffswitch2 w-50 float-left">
                  <input type="checkbox" name="mirrar_single_product" class="onoffswitch2-checkbox" id="mirrar_single_product" value="' . esc_attr($mirrar_single_product) . '" ' . esc_attr($mirrar_single_product_cheked) . '>
                  <label class="toggle float-right ' . esc_attr($mirrar_single_product_toggle_class) . '" for="mirrar_single_product" data-input-id="mirrar_single_product"></label>
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Custom button position', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <select class="form-control float-right" name="mirrar_button_position" id="mirrar_button_position">
                    <option value="' . esc_attr__('up', 'mirrar') . '" ' . esc_attr($mirrar_button_position_up) . '>' . esc_html__('Up', 'mirrar') . '</option>
                    <option value="' . esc_attr__('left', 'mirrar') . '" ' . esc_attr($mirrar_button_position_left) . '>' . esc_html__('Left', 'mirrar') . '</option>
                    <option value="' . esc_attr__('right', 'mirrar') . '" ' . esc_attr($mirrar_button_position_right) . '>' . esc_html__('Right', 'mirrar') . '</option>
                    <option value="' . esc_attr__('down', 'mirrar') . '" ' . esc_attr($mirrar_button_position_down) . '>' . esc_html__('Down', 'mirrar') . '</option>
                  </select>
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Custom button alignment', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <select class="form-control float-right" id="mirrar_button_alignment" name="mirrar_button_alignment">
                      <option value="">' . esc_html__('None', 'mirrar') . '</option> 
                    <option value="' . esc_attr__('right', 'mirrar') . '" ' . esc_attr($mirrar_button_alignment_right) . '>' . esc_html__('Right', 'mirrar') . '</option>
                    <option value="' . esc_attr__('left', 'mirrar') . '" ' . esc_attr($mirrar_button_alignment_left) . '>' . esc_html__('Left', 'mirrar') . '</option>
                    <option value="' . esc_attr__('center') . '" ' . esc_attr($mirrar_button_alignment_center) . '>' . esc_html__('Center', 'mirrar') . '</option>
                  </select>
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Button Text', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <input type="text" name="mirrar_button_text" id="mirrar_button_text" value="' . esc_attr($mirrar_button_text) . '" style="width:100%;" data-title-slug="button-text" class="mirrar_change">
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Brand ID', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <input type="text" name="mirrar_brand_id" id="mirrar_brand_id" value="' . esc_attr($mirrar_brand_id) . '" style="width:100%;">
                </div>
              </div>';

            echo '</div>
            <div class="w-50 float-left LeftSide RightSide  p-3 bdr-left">
              <div class="HedingDiv wall" style="margin-bottom: 15px;">
                <h3 style="margin-top:0px;">' . esc_html__('Custom Button Style', 'mirrar') . '</h3>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Text Font Size', 'mirrar') . '</label>
                <div class="RngeSliderHere w-50 float-right">
                  <input type="range" min="1" max="50" value="' . esc_attr($mirrar_text_font_size) . '" class="slider mirrar_change" id="mirrar_text_font_size" name="mirrar_text_font_size" data-title-slug="font-size">
                  <input type="number" min="1" max="50" name="mirrar_input_text_font_size" id="mirrar_input_text_font_size" value="' . esc_attr($mirrar_text_font_size) . '" class="mirrar_change" data-title-slug="font-number-size" />
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Text Font Weight', 'mirrar') . '</label>
                <div class="RngeSliderHere w-50 float-right">
                  <input type="range" min="100" max="900" value="' . esc_attr($mirrar_text_font_weight) . '" class="slider mirrar_change" id="mirrar_text_font_weight" name="mirrar_text_font_weight" data-title-slug="font-weight">
                  <input type="number" min="100" max="900" name="mirrar_input_text_font_weight" id="mirrar_input_text_font_weight" value="' . esc_attr($mirrar_text_font_weight) . '" class="mirrar_change" data-title-slug="font-weight-size" />
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Border Size', 'mirrar') . '</label>
                <div class="RngeSliderHere w-50 float-right">
                  <input type="range" min="1" max="20" value="' . esc_attr($mirrar_border_size) . '" class="slider mirrar_change" id="mirrar_border_size" name="mirrar_border_size" data-title-slug="border-width">
                  <input type="number" min="1" max="20" name="mirrar_input_border_size" id="mirrar_input_border_size" value="' . esc_attr($mirrar_border_size) . '" class="mirrar_change" data-title-slug="border-number-width" />
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Border Radius', 'mirrar') . '</label>
                <div class="RngeSliderHere w-50 float-right">
                  <input type="range" min="1" max="50" value="' . esc_attr($mirrar_border_radius) . '" class="slider mirrar_change" id="mirrar_border_radius" name="mirrar_border_radius" data-title-slug="border-radius">
                  <input type="number" min="1" max="50" name="mirrar_input_border_radius" id="mirrar_input_border_radius" value="' . esc_attr($mirrar_border_radius) . '" class="mirrar_change" data-title-slug="border-number-radius" />
                </div>
              </div>
              <div class="form-group float-left w-25">
                <label class="w-100 float-left">' . esc_html__('Button Background', 'mirrar') . '</label>
                <div class="ClrPicker w-100 float-left">
                  <input type="color" name="mirrar_button_background" id="mirrar_button_background" value="' . esc_attr($mirrar_button_background) . '" data-title-slug="background" class="mirrar_change">
                </div>
              </div>
              <div class="form-group float-left w-25">
                <label class="w-100 float-left">' . esc_html__('Text Font Color', 'mirrar') . '</label>
                <div class="ClrPicker w-100 float-left">
                  <input type="color" name="mirrar_text_font_color" id="mirrar_text_font_color" value="' . esc_attr($mirrar_text_font_color) . '" data-title-slug="color" class="mirrar_change">
                </div>
              </div>
              <div class="form-group float-left w-25">
                <label class="w-100 float-left">' . esc_html__('Border color', 'mirrar') . '</label>
                <div class="ClrPicker w-100 float-left">
                  <input type="color" name="mirrar_border_color" id="mirrar_border_color" value="' . esc_attr($mirrar_border_color) . '" data-title-slug="border-color" class="mirrar_change">
                </div>
              </div>
              <div class="form-group float-left w-25">
                <label class="w-100 float-left">' . esc_html__('Hover Color', 'mirrar') . '</label>
                <div class="ClrPicker w-100 float-left">
                  <input type="color" name="mirrar_hover_color" id="mirrar_hover_color" value="' . esc_attr($mirrar_hover_color) . '">
                </div>
              </div>
              
              <div class="form-group clear wall">
                <hr>
              </div>

              <a href="javascript:void(0)" id="showAdvanceSetting" data-id="0">Advance Settings <span class="setting_toggle_icon"><i class="fa fa-angle-double-down icon_rotate"></i></span></a>
                <div class="advance-setting-section" style="display:none;">
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Vertical Padding', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_vertically_padding) . '" class="slider mirrar_change" id="mirrar_vertically_padding_slider" name="mirrar_vertically_padding_slider" data-title-slug="padding-top-slider">
                      <input type="number" name="mirrar_vertically_padding" id="mirrar_vertically_padding" value="' . esc_attr($mirrar_vertically_padding) . '" data-title-slug="padding-top" class="mirrar_change" min="0"> 
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Horizontal Padding', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_horizontally_padding) . '" class="slider mirrar_change" id="mirrar_horizontally_padding_slider" name="mirrar_horizontally_padding_slider" data-title-slug="padding-left-slider">
                      <input type="number" name="mirrar_horizontally_padding" id="mirrar_horizontally_padding" value="' . esc_attr($mirrar_horizontally_padding) . '" data-title-slug="padding-left" class="mirrar_change" min="0">  
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Margin Top', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_top_margin) . '" class="slider mirrar_change" id="mirrar_top_margin_slider" name="mirrar_top_margin_slider" data-title-slug="margin-top-slider">
                      <input type="number" name="mirrar_top_margin" id="mirrar_top_margin" value="' . esc_attr($mirrar_top_margin) . '" data-title-slug="margin-top" class="mirrar_change" min="0">
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Margin Right', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_right_margin) . '" class="slider mirrar_change" id="mirrar_right_margin_slider" name="mirrar_right_margin_slider" data-title-slug="margin-right-slider">
                      <input type="number" name="mirrar_right_margin" id="mirrar_right_margin" value="' . esc_attr($mirrar_right_margin) . '" data-title-slug="margin-right" class="mirrar_change" min="0">   
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Margin Bottom', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_bottom_margin) . '" class="slider mirrar_change" id="mirrar_bottom_margin_slider" name="mirrar_bottom_margin_slider" data-title-slug="margin-bottom-slider">
                      <input type="number" name="mirrar_bottom_margin" id="mirrar_bottom_margin" value="' . esc_attr($mirrar_bottom_margin) . '" data-title-slug="margin-bottom" class="mirrar_change" min="0">   
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button Margin Left', 'mirrar') . '</label>
                    <div class="RngeSliderHere w-50 float-right" style="position: relative;padding-bottom: 10px;">
                      <input type="range" min="0" value="' . esc_attr($mirrar_left_margin) . '" class="slider mirrar_change" id="mirrar_left_margin_slider" name="mirrar_left_margin_slider" data-title-slug="margin-left-slider">
                      <input type="number" name="mirrar_left_margin" id="mirrar_left_margin" value="' . esc_attr($mirrar_left_margin) . '" data-title-slug="margin-left" class="mirrar_change" min="0">   
                    </div>
                  </div>
                  <div class="form-group clear wall mirrar-btn-shadow">
                    <label class="w-50 float-left">' . esc_html__('Button Shadow', 'mirrar') . '</label>
                    <div class="w-50 float-right SelectWtdh NmbrInput" style="position: relative;padding-bottom: 10px;">
                      <input type="number" min="0" name="mirrar_btn_shadow_horizontal_offset" id="mirrar_btn_shadow_horizontal_offset" value="' . esc_attr($mirrar_btn_shadow_horizontal_offset) . '" data-title-slug="horizontal-offset" class="mirrar_change">       
                      <input type="number" min="0" name="mirrar_btn_vertical_offset" id="mirrar_btn_vertical_offset" value="' . esc_attr($mirrar_btn_vertical_offset) . '" data-title-slug="vertical-offset" class="mirrar_change">     
                      <input type="number" min="0" name="mirrar_btn_blur" id="mirrar_btn_blur" value="' . esc_attr($mirrar_btn_blur) . '" data-title-slug="blur" class="mirrar_change">     
                      <input type="number" name="mirrar_btn_spread" id="mirrar_btn_spread" value="' . esc_attr($mirrar_btn_spread) . '" data-title-slug="spread" class="mirrar_change">     
                      <div class="AllIndictors">
                        <span class="SpanIndictor TopInd2" style="position:absolute;">' . esc_html__('Left / Right', 'mirrar') . '</span>
                        <span class="SpanIndictor RightInd2" style="position:absolute;">' . esc_html__('Top / Bottom', 'mirrar') . '</span>
                        <span class="SpanIndictor BtmInd2" style="position:absolute;">' . esc_html__('Blur', 'mirrar') . '</span>
                        <span class="SpanIndictor LeftInd2" style="position:absolute;">' . esc_html__('Spread', 'mirrar') . '</span>
                      </div>
                    </div>
                  </div>
                  <div class="clear w-50 float-right BoxShdowText" style="padding-bottom:20px;">
                  <div class="w-50 float-left">
                  <label class="w-100 float-left">' . esc_html__('Shadow Color', 'mirrar') . '</label>
                     <div class="ClrPicker w-100 float-left">
                      <input type="color" class="mirrar_change" name="mirrar_shadow_color" id="mirrar_shadow_color" value="' . esc_attr($mirrar_shadow_color) . '" data-title-slug="shadow-color">
                     </div>
                  </div>
                 <div class="w-50 float-left">
                     <label class="w-100 float-left">' . esc_html__('Shadow Type', 'mirrar') . '</label>
                    <div class="w-100 float-right SelectWtdh">
                      <select class="form-control float-left mirrar_change" id="mirrar_shadow_type" name="mirrar_shadow_type" data-title-slug="shadow-type">
                        <option value="" ' . esc_attr($mirrar_shadow_type_outset) . '>' . esc_html__('Outset', 'mirrar') . '</option>
                        <option value="' . esc_attr__('inset', 'mirrar') . '" ' . esc_attr($mirrar_shadow_type_inset) . '>' . esc_html__('Inset', 'mirrar') . '</option>
                      </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Custom button icon', 'mirrar') . '</label>
                    <div class="w-50 float-right SelectWtdh">
                        <select class="form-control mirrar_change" style="width: 100%;" name="mirrar_button_icon" id="mirrar_button_icon" data-title-slug="button-icon">';
                            if(!empty($mirrar_icons)) :
                              foreach($mirrar_icons as $mirrar_icon_key => $mirrar_icon_val) :
                                if($mirrar_button_icon == $mirrar_icon_key){
                                echo '<option value="' . esc_attr($mirrar_icon_key) . '" selected>' . esc_html($mirrar_icon_val) . '</option>';
                              }else{
                                echo '<option value="' . esc_attr($mirrar_icon_key) . '">' . esc_html($mirrar_icon_val) . '</option>';
                              }
                            endforeach;
                          endif;
                   echo '</select>
                    </div>
                  </div>
                  <div class="form-group clear wall">
                    <label class="w-50 float-left">' . esc_html__('Button icon position', 'mirrar') . '</label>
                    <div class="w-50 float-right SelectWtdh">
                      <select class="form-control float-left mirrar_change" id="mirrar_icon_position" name="mirrar_icon_position" data-title-slug="button-icon-position">
                        <option value="' . esc_attr__('left', 'mirrar') . '" ' . esc_attr($mirrar_icon_position_left) . '>' . esc_html__('Left', 'mirrar') . '</option>
                        <option value="' . esc_attr__('right', 'mirrar') . '" ' . esc_attr($mirrar_icon_position_right) . '>' . esc_html__('Right', 'mirrar') . '</option>
                      </select>
                    </div>
                  </div>
                  
                  <hr><br>
            <div class="mirrar_additional_settings_container">
              <div class="HedingDiv wall" style="margin-bottom: 15px;">
                <h3 style="margin-top:0px;">' . esc_html__('Additional Settings', 'mirrar') . '</h3>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Custom class on product page', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <input type="text" name="mirrar_btn_product_class" id="mirrar_btn_product_class" value="' . esc_attr($mirrar_btn_product_class) . '" placeholder="eg. custom_mirrar_btn" style="width: 100%;">
                  <span>Enter mirrAR button container class from product page, So that mirrAR button will be shown inside this container on product pages. Do not enter dot before class name.</span>
                </div>  
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Custom CSS on product pages', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <textarea name="mirrar_btn_product_css" id="mirrar_btn_product_css" value="" style="width:100%;">' . esc_attr($mirrar_btn_product_css) . '</textarea>
                  <span>Add custom CSS to apply on custom mirrAR button on product pages.</span>
                </div>
              </div>
              <div class="form-group clear wall">
                <label class="w-50 float-left">' . esc_html__('Shortcode to display on other pages', 'mirrar') . '</label>
                <div class="w-50 float-right SelectWtdh">
                  <span><code>[mirrar_btn_show post_id="REPLACE_ME"]</code><br><br>Add this shortcode to display custom mirrAR button on category, homepage or other pages using this shortcode. Just replace the REPLACE_ME field with the actual post id.</span>
                </div>
              </div>
              <div class="form-group clear wall">
                  <label class="w-50 float-left">' . esc_html__('Custom CSS on other pages', 'mirrar') . '</label>
                  <div class="w-50 float-right SelectWtdh">
                    <textarea name="mirrar_btn_category_css" id="mirrar_btn_category_css" value="" style="width:100%;">' . esc_attr($mirrar_btn_category_css) . '</textarea>
                    <span>Add custom CSS to apply on custom mirrAR button on category, homepage or other pages using this shortcode<br><br><code>[mirrar_btn_show post_id="REPLACE_ME"]</code><br></span>
                  </div>
                </div>
              <div class="form-group clear wall">
                  <label class="w-50 float-left">' . esc_html__('If not using WooCommerce plugin on website then enable this settings', 'mirrar') . '</label>
                    <div class="w-50 float-right SelectWtdh">
                        <input type="checkbox" name="mirrar_btn_checkbox" id="mirrar_btn_checkbox" value="1" ' . checked('1', $mirrar_btn_checkbox, false) . '>
                    </div>
              </div>
              <div class="form-group clear wall mirran_woo_checkbox_section">
                  <label class="w-50 float-left">'. esc_html__('Select post type', 'mirrar').'</label>
                  <div class="w-50 float-right SelectWtdh">
                      <select class="form-control mirrar_change" style="width: 100%;" name="mirrar_all_post_type" id="mirrar_all_post_type" data-title-slug="">
                        <option value="">Select Post Type</option>';

                          $all_post_types = get_post_types(array('public' => true), 'name');

                          if (!empty($all_post_types)) :
                              foreach ($all_post_types as $post_type) :
                                  $post_type_name = $post_type->name;
                                  $post_type_label = $post_type->label;

                                  if($post_type_name == 'attachment') {
                                    continue;
                                  }

                                  if ($mirrar_all_post_type == $post_type_name) {
                                      echo '<option value="' . esc_attr($post_type_name) . '" selected>' . esc_html($post_type_label) . '</option>';
                                  } else {
                                      echo '<option value="' . esc_attr($post_type_name) . '">' . esc_html($post_type_label) . '</option>';
                                  }
                              endforeach;
                          endif;
                      echo'</select>
                  </div>
              </div>
            </div>

                </div>
            </div>
            <div class="w-100 float-left LeftSide p-3">
            </div>
            <div class="form-group submit_btn_sec w-100">            
            <input type="hidden" name="mirrar_style" id="mirrar_style" value="' . esc_attr($mirrar_style) . '"/>
            <div class="mirrar-submit-btn-wrapper">';
            submit_button( esc_html__( 'Save Settings', 'mirrar' ), 'save_setting_btn', 'submit-form', false );
      echo '</div>
          </form>
      </div>
      </div>
      <div class="form-group clear wall SyncBtnSection">
        <label class="w-100 mirrar-text-center display-block">' . esc_html__('Synchronize All Products', 'mirrar') . '</label>
          <div class="onoffswitch2 w-100 mirrar-text-center display-block">
            <button id="mirrar-sync-button" name="mirrar-sync-button" class="mirrar-sync-button" type="button" style="float:none;">' . esc_html__('Sync Now', 'mirrar') . ' <i class="fa fa-spinner fa-pulse fa-spin d-none mirrar-spin"></i></button>
          </div>
      </div>
    </section>
    ';
?>




