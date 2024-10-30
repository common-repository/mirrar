(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 $(document).ready(function(){
	 	/**
	 	* Mirrar class toggle on various switches
	 	*/
	 	$('.toggle').click(function(e) {
	        var toggle = this;
	        e.preventDefault();
	        var get_input_id = $(toggle).attr('data-input-id');
	        $(toggle).toggleClass('toggle-on').toggleClass('toggle-off').addClass('toggle-moving');
	        var mirrar_find = $(toggle).hasClass('toggle-on');
	        if(mirrar_find == true && get_input_id != 'undefined'){
            	$('#'+get_input_id).attr('value', 'true');
            	$('#'+get_input_id).attr( 'checked', true );
	        }else{
	        	$('#'+get_input_id).attr('value', 'false');
	        	$('#'+get_input_id).removeAttr('checked');
	        }
	        setTimeout(function() {
	          $(toggle).removeClass('toggle-moving');
	        }, 200)
	    });
	    /**
	    * Mirrar button styling
	    */
	    $('.mirrar_change').on('input', function(){
			
	    	var button_text = '';
	    	var font_size = '';
	    	var font_weight = '';
	    	var border_width = '';
	    	var border_radius = '';
	    	var background = '';
	    	var color = '';
	    	var border_color = '';
	    	var padding_top = '';
	    	var padding_left = '';
	    	var margin_top = '';
	    	var margin_right = '';
	    	var margin_bottom = '';
	    	var margin_left = '';
	    	var button_icon = '';
	    	var button_icon_position = '';
	    	var horizontal_offset = '';
	    	var vertical_offset = '';
	    	var blur = '';
	    	var spread = '';
	    	var shadow_color = '';
	    	var shadow_type = '';
	    	var title_slug = $(this).attr('data-title-slug');
	    	var title_value = $(this).val();
		
	    	switch(title_slug){
	    		case 'button-text':
	    		    var mirrar_button_icon = $('#mirrar_button_icon').val();
	    		    var align = $('#mirrar_icon_position').val();
	    		    if(title_value != ''){
		    			if(mirrar_button_icon != ''){
		    				if( align == 'right'){
		    					$('#mirror-button').html(title_value+' <i class="fa '+mirrar_button_icon+'"></i>');
		    				}else{
		    					$('#mirror-button').html('<i class="fa '+mirrar_button_icon+'"></i> '+title_value);
		    				}
		    			}else{
		    				$('#mirror-button').text(title_value);
		    			}
	    			}
	    		break;
	    		case 'font-size':
	    			font_size = title_value+'px';
	    			$('#mirror-button').css('font-size', font_size);
	    			$('#mirrar_input_text_font_size').val(title_value);
	    		break;
	    		case 'font-number-size':
	    			font_size = title_value+'px';
	    			$('#mirror-button').css('font-size', font_size);
	    			$('#mirrar_text_font_size').val(title_value);
	    		break;
	    		case 'font-weight':
	    			font_weight = title_value;
	    			$('#mirror-button').css('font-weight', font_weight);
	    			$('#mirrar_input_text_font_weight').val(title_value);
	    		break;
	    		case 'font-weight-size':
	    			font_weight = title_value;
	    			$('#mirror-button').css('font-weight', font_weight);
	    			$('#mirrar_text_font_weight').val(title_value);
	    		break;
	    		case 'border-width':
	    			border_width = title_value+'px';
	    			$('#mirror-button').css('border-width', border_width);
	    			$('#mirror-button').css('border-style', 'solid');
	    			$('#mirrar_input_border_size').val(title_value);
	    		break;
	    		case 'border-number-width':
	    			border_width = title_value+'px';
	    			$('#mirror-button').css('border-width', border_width);
	    			$('#mirror-button').css('border-style', 'solid');
	    			$('#mirrar_border_size').val(title_value);
	    		break;
	    		case 'border-radius':
	    			border_radius = title_value+'px';
	    			$('#mirror-button').css('border-radius', border_radius);
	    			$('#mirrar_input_border_radius').val(title_value);
	    		break;
	    		case 'border-number-radius':
	    			border_radius = title_value+'px';
	    			$('#mirror-button').css('border-radius', border_radius);
	    			$('#mirrar_border_radius').val(title_value);
	    		break;
	    		case 'background':
	    			background = title_value;
	    			$('#mirror-button').css('background', background);
	    		break;
	    		case 'color':
	    			color = title_value;
	    			$('#mirror-button').css('color', color);
	    		break;
	    		case 'border-color':
	    			border_color = title_value;
	    			$('#mirror-button').css('border-color', border_color);
	    		break;
	    		case 'padding-top-slider':
	    			padding_top = title_value+'px';
	    			$('#mirror-button').css('padding-top', padding_top);
	    			$('#mirror-button').css('padding-bottom', padding_top);
	    			$('#mirrar_vertically_padding').val(title_value);
	    		break;
	    		case 'padding-top':
	    			padding_top = title_value+'px';
	    			$('#mirror-button').css('padding-top', padding_top);
	    			$('#mirror-button').css('padding-bottom', padding_top);
	    			$('#mirrar_vertically_padding_slider').val(title_value);
	    		break;
	    		case 'padding-left-slider':
	    			padding_left = title_value+'px';
	    			$('#mirror-button').css('padding-left', padding_left);
	    			$('#mirror-button').css('padding-right', padding_left);
	    			$('#mirrar_horizontally_padding').val(title_value);
	    		break;
	    		case 'padding-left':
	    			padding_left = title_value+'px';
	    			$('#mirror-button').css('padding-left', padding_left);
	    			$('#mirror-button').css('padding-right', padding_left);
	    			$('#mirrar_horizontally_padding_slider').val(title_value);
	    		break;
	    		case 'margin-top-slider':
	    			margin_top = title_value+'px';
	    			$('#mirror-button').css('margin-top', margin_top);
	    			$('#mirrar_top_margin').val(title_value);
	    		break;
	    		case 'margin-top':
	    			margin_top = title_value+'px';
	    			$('#mirror-button').css('margin-top', margin_top);
	    			$('#mirrar_top_margin_slider').val(title_value);
	    		break;
	    		case 'margin-right-slider':
	    			margin_right = title_value+'px';
	    			$('#mirror-button').css('margin-right', margin_right);
	    			$('#mirrar_right_margin').val(title_value);
	    		break;
	    		case 'margin-right':
	    			margin_right = title_value+'px';
	    			$('#mirror-button').css('margin-right', margin_right);
	    			$('#mirrar_right_margin_slider').val(title_value);
	    		break;
	    		case 'margin-bottom-slider':
	    			margin_bottom = title_value+'px';
	    			$('#mirror-button').css('margin-bottom', margin_bottom);
	    			$('#mirrar_bottom_margin').val(title_value);
	    		break;
	    		case 'margin-bottom':
	    			margin_bottom = title_value+'px';
	    			$('#mirror-button').css('margin-bottom', margin_bottom);
	    			$('#mirrar_bottom_margin_slider').val(title_value);
	    		break;
	    		case 'margin-left-slider':
	    			margin_left = title_value+'px';
	    			$('#mirror-button').css('margin-left', margin_left);
	    			$('#mirrar_left_margin').val(title_value);
	    		break;
	    		case 'margin-left':
	    			margin_left = title_value+'px';
	    			$('#mirror-button').css('margin-left', margin_left);
	    			$('#mirrar_left_margin_slider').val(title_value);
	    		break;
	    		case 'button-icon':
	    		    var text = $('#mirror-button').text();
	    		    var align = $('#mirrar_icon_position').val();
	    		    if(title_value != ''){
		    		    if(align == 'right'){
		    		    	$('#mirror-button').html(text+' <i class="fa '+title_value+'"></i>');
		    		    }else{
		    		    	$('#mirror-button').html('<i class="fa '+title_value+'"></i> '+text);
		    		    }
	    			}else{
	    				$('#mirror-button').text(text);
	    			}
	    		break;
	    		case 'button-icon-position':
	    		    var mirrar_button_icon = $('#mirrar_button_icon').val();
	    		    var text = $('#mirror-button').text();
	    			button_icon_position = title_value;
	    			if(mirrar_button_icon != ''){
		    			if(button_icon_position == 'right'){
		    				$('#mirror-button').html(text+' <i class="fa '+mirrar_button_icon+'"></i>');
		    			}else{
		    				$('#mirror-button').html('<i class="fa '+mirrar_button_icon+'"></i> '+text);
		    			}
	    			}else{
	    				$('#mirror-button').text(text);
	    			}
	    		break;
	    		case 'horizontal-offset':
	    			 horizontal_offset = title_value+'px';
	    			 vertical_offset = $('#mirrar_btn_vertical_offset').val()+'px';
	    			 blur = $('#mirrar_btn_blur').val()+'px';
	    			 spread = $('#mirrar_btn_spread').val()+'px';
	    			 shadow_color = $('#mirrar_shadow_color').val();
	    			 shadow_type = $('#mirrar_shadow_type').val();
	    			 $('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    	    break;
	    	    case  'vertical-offset':
	    	        horizontal_offset = $('#mirrar_btn_shadow_horizontal_offset').val()+'px';
	    			vertical_offset = title_value+'px';
	    			blur = $('#mirrar_btn_blur').val()+'px';
	    			spread = $('#mirrar_btn_spread').val()+'px';
	    			shadow_color = $('#mirrar_shadow_color').val();
	    			shadow_type = $('#mirrar_shadow_type').val();
	    			$('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    		break;
	    		case 'blur':
	    		    horizontal_offset = $('#mirrar_btn_shadow_horizontal_offset').val()+'px';
	    			vertical_offset = $('#mirrar_btn_vertical_offset').val()+'px';
	    	 		blur = title_value+'px';
	    	 		spread = $('#mirrar_btn_spread').val()+'px';
	    			shadow_color = $('#mirrar_shadow_color').val();
	    			shadow_type = $('#mirrar_shadow_type').val();
	    			$('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    	 	break;
	    	 	case 'spread':
	    	 	    horizontal_offset = $('#mirrar_btn_shadow_horizontal_offset').val()+'px';
	    			vertical_offset = $('#mirrar_btn_vertical_offset').val()+'px';
	    			blur = $('#mirrar_btn_blur').val()+'px';
	    			spread = title_value+'px';
	    			shadow_color = $('#mirrar_shadow_color').val();
	    			shadow_type = $('#mirrar_shadow_type').val();
	    			$('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    		break;
	    		case 'shadow-color':
	    		    horizontal_offset = $('#mirrar_btn_shadow_horizontal_offset').val()+'px';
	    			vertical_offset = $('#mirrar_btn_vertical_offset').val()+'px';
	    			blur = $('#mirrar_btn_blur').val()+'px';
	    			spread = $('#mirrar_btn_spread').val()+'px';
	    			shadow_color = title_value;
	    			shadow_type = $('#mirrar_shadow_type').val();
	    			$('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    		break;
	    		case 'shadow-type':
	    		    horizontal_offset = $('#mirrar_btn_shadow_horizontal_offset').val()+'px';
	    			vertical_offset = $('#mirrar_btn_vertical_offset').val()+'px';
	    			blur = $('#mirrar_btn_blur').val()+'px';
	    			spread = $('#mirrar_btn_spread').val()+'px';
	    			shadow_color = $('#mirrar_shadow_color').val();
	    	  		shadow_type = title_value;
	    	  		$('#mirror-button').css('box-shadow', horizontal_offset+' '+vertical_offset+' '+blur+' '+spread+' '+shadow_color+' '+shadow_type);
	    		break;
	    		default:
	    		    $('#mirrar-button').css('outline', 'none');
	    	}
	    	$('.mirrar-button-change').trigger('change');
	    });
        /**
        * Get value from mirrar button change
        */
        $('.mirrar-button-change').on('change', function(){
        	var mirrar_style = $('#mirror-button').attr('style');
        	if(mirrar_style != ''){
				$('#mirrar_style').val(mirrar_style);
	    	}
        });
        /**
        * Mirrar button background color chnage on hover
        */
        $('#mirror-button').hover(function(){
          	var background_hover_color = $('#mirrar_hover_color').val();
		  	$(this).css('background', background_hover_color);
		}, function(){
			var background_color = $('#mirrar_button_background').val();
			$(this).css('background', background_color);
		});
		/**
		* Mirrar ajax synchronization 
		*/
		$('#mirrar-sync-button').on('click', function(){
			$.ajax({
					 data: {
						action: 'mirrar_synchronize_button_setting',	
						},
					 type: 'post',
					 url: mirrar_ajax_object.ajax_url,
					 beforeSend: function() {								
						$('.mirrar-spin').removeClass('d-none');							
					 },
					 success: function(response){
                        	var obj = JSON.parse(response);
                        	if(obj.gen_response == 'success'){
                        	   $('.success').remove();
                        	   $('.error').remove();
                        	   $('#mirrar-sync-button').after('<span class="'+obj.gen_response+'">'+obj.gen_message+'</span>');
                        	   setTimeout(function(){  
                        	   		$('.success').remove();
                        	   		$('.error').remove();
                        	   }, 3000);
                        	}else{
                        	   $('.success').remove();
                        	   $('.error').remove();
                        	   $('#mirrar-sync-button').after('<span class="'+obj.gen_response+'">'+obj.gen_message+'</span>');
                        	   setTimeout(function(){  
                        	   		$('.success').remove();
                        	   		$('.error').remove();
                        	   }, 3000);
                        	}
                        	$('.mirrar-spin').addClass('d-none');
					}
			});		
		});
		$('#showAdvanceSetting').on('click', function(){
			var setting_sec = $(this).attr('data-id');
			$('.icon_rotate').toggleClass("rotate_down");
			if(setting_sec == 0){
				$(this).attr('data-id',1);
				$('.advance-setting-section').show("slow");
			}else{
				$(this).attr('data-id',0);
				$('.advance-setting-section').hide("slow");
			}
		});
	});

	$('#mirrar_btn_checkbox').on('click', function () {
		if ($(this).is(':checked')) {
			$('.mirran_woo_checkbox_section').addClass('mirrar_woo_settings');
		} else {
			$('.mirran_woo_checkbox_section').removeClass('mirrar_woo_settings');
		}
	});

	$(document).ready(function () {
		if($('#mirrar_btn_checkbox').prop('checked')) {
			$('.mirran_woo_checkbox_section').addClass('mirrar_woo_settings');
		} else {
			$('.mirran_woo_checkbox_section').removeClass('mirrar_woo_settings');
		}
	});


})( jQuery );
