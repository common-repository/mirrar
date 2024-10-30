<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://mirrar.com/
 * @since      1.0.0
 *
 * @package    Mirrar
 * @subpackage Mirrar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mirrar
 * @subpackage Mirrar/public
 * @author     mirrAR.com <tech@styledotme.com>
 */
class Mirrar_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$button_position = !empty(get_option('mirrar_button_position')) ? get_option('mirrar_button_position') : 'up';
		
		$mirrar_btn_product_class =!empty(get_option('mirrar_btn_product_class')) ? get_option('mirrar_btn_product_class') : '';
		if(!empty($mirrar_btn_product_class)){

		}else{

		
        switch ($button_position) {
        	case 'up':
                /**
				* Mirrar button show on shop page
				*/
				add_action('woocommerce_after_shop_loop_item', array( $this, 'mirrar_button'));
				/**
				* Mirrar button show on product single page 
				*/
        		add_action('woocommerce_single_product_summary', array( $this, 'mirrar_button'), 25);
            break;
            case 'down':
                /**
				* Mirrar button show on shop page
				*/
				add_action('woocommerce_after_shop_loop_item', array( $this, 'mirrar_button'), 35);
				/**
				* Mirrar button show on product single page 
				*/
            	add_action('woocommerce_single_product_summary', array( $this, 'mirrar_button'), 35);
            break;
            case 'left':
                /**
				* Mirrar button show on shop page
				*/
				add_action('woocommerce_after_shop_loop_item', array( $this, 'mirrar_button'));
				/**
				* Mirrar button show on product single page 
				*/
            	add_action('woocommerce_before_add_to_cart_button', array( $this, 'mirrar_button'));
            break;
            case 'right':
                /**
				* Mirrar button show on shop page
				*/
				add_action('woocommerce_after_shop_loop_item', array( $this, 'mirrar_button'), 25);
				/**
				* Mirrar button show on product single page 
				*/
            	add_action('woocommerce_after_add_to_cart_button', array( $this, 'mirrar_button'));            	
            break;
        	default:
        		/**
				* Mirrar button show on shop page
				*/
				add_action('woocommerce_after_shop_loop_item', array( $this, 'mirrar_button'), 25);
				/**
				* Mirrar button show on product single page 
				*/
            	add_action('woocommerce_after_add_to_cart_button', array( $this, 'mirrar_button')); 
        	break;
        }
			
		}
		// Hook for handling the AJAX request
		add_action('wp_ajax_nopriv_custom_mirrar_button', array( $this,'custom_mirrar_button'));
		add_action('wp_ajax_custom_mirrar_button', array( $this,'custom_mirrar_button'));
		add_action('wp_footer', array( $this,'mirrar_button_load'));
		add_shortcode( 'mirrar_btn_show', array( $this, 'mirrar_btn_render' ));

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mirrar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mirrar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mirrar-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'font-awesome-min', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
		$bgcolor = !empty(get_option('mirrar_hover_color')) ? get_option('mirrar_hover_color') : '';
		$custom_css = 'button.mirror-button:hover {
						background: '.esc_html($bgcolor).' !important;
						}';
		wp_add_inline_style($this->plugin_name, $custom_css);
			
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mirrar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mirrar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'mirrar-ui', '//cdn.styledotme.com/general/scripts/mirrar-ui.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mirrar-public.js', array( 'jquery', 'mirrar-ui' ), $this->version, true );
	
	}

    /**
	 * Add mirrar button on product single page.
	 *
	 * @since    1.0.0
	 */
    public function mirrar_button() {
    	global $product;
    	$brand_id = '';
    	$mirrar_show = esc_html__('no', 'mirrar');
    	$id = $product->get_id();
		$product_sku = $product->get_sku();
	
		$mirrar_setting_brand_id = !empty(get_option('mirrar_brand_id')) ? get_option('mirrar_brand_id') : '';
		$mirrar_button_icon = !empty(get_option('mirrar_button_icon')) ? get_option('mirrar_button_icon') : '';
		$mirrar_icon_position = !empty(get_option('mirrar_icon_position')) ? get_option('mirrar_icon_position') : '';
		$mirrar_style = !empty(get_option('mirrar_style')) ? get_option('mirrar_style') : '';
		$mirrar_button_text = !empty(get_option('mirrar_button_text')) ? get_option('mirrar_button_text') : 'Try Mirrar';
		$mirrar_button_alignment = !empty(get_option('mirrar_button_alignment')) ? get_option('mirrar_button_alignment') : '';
		$mirrar_brand_id = get_post_meta( $product->get_id(), 'mirrar_brand_id', true ) ;	
		
		if(!empty($mirrar_button_alignment)){
           $button_aligment = 'style=text-align:' . $mirrar_button_alignment . '';
		}else{
		   $button_aligment = '';
		}
		if(is_shop() || is_product_category()){
			$mirrar_shop = !empty(get_option('mirrar_shop')) ? 'true' : 'false';
			if($mirrar_shop == 'true'){
				$mirrar_show = !empty( get_post_meta( $id, 'mirrar_show', true ) ) ? get_post_meta( $id, 'mirrar_show', true ) : 'no';
			}else{
				$mirrar_show == 'no';
			} 
		}elseif(is_product() && is_single()){
			$mirrar_single_product = !empty(get_option('mirrar_single_product')) ? 'true' : 'false';
			if($mirrar_single_product == 'true'){
				$mirrar_show = !empty( get_post_meta( $id, 'mirrar_show', true ) ) ? get_post_meta( $id, 'mirrar_show', true ) : 'no';
			}else{
				$mirrar_show == 'no';
			} 
		}else{
			$mirrar_show == 'no';
		}
		if(!empty($mirrar_brand_id)){
			$brand_id = $mirrar_brand_id;
		}else{
            $brand_id = $mirrar_setting_brand_id;
		}

		$mirrar_btn_product_css = !empty(get_option('mirrar_btn_product_css')) ? get_option('mirrar_btn_product_css') : '';
		$mirrar_btn_product_class =!empty(get_option('mirrar_btn_product_class')) ? get_option('mirrar_btn_product_class') : '';

		$mirrar_style = $mirrar_style . ' ' . $mirrar_btn_product_css;

		if($mirrar_show == 'yes') {
    		$icon_and_text_left = '';
            $icon_and_text_right = '';
            if(!empty($button_aligment)){
            	echo '<div class="mirrar-button-wrapper" ' . esc_attr($button_aligment) . '>';
            }
			
            if(!empty($mirrar_button_icon)){
                if( $mirrar_icon_position == 'left'){
               		$icon_and_text_left = '<i class="fa ' . esc_attr($mirrar_button_icon) . '"></i> ' . esc_html($mirrar_button_text);
               		if(!empty($mirrar_style)){
                		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . wp_kses( $icon_and_text_left, array('i' => array('class' => array())) ) . '</button>';
                	}else{
                		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
                	}
                }else{
                    $icon_and_text_right = esc_html($mirrar_button_text) . ' <i class="fa ' . esc_attr($mirrar_button_icon) . '"></i>';
                    if(!empty($mirrar_style)){
                		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . wp_kses( $icon_and_text_right, array('i' => array('class' => array())) ) . '</button>';
                	}else{
                		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
                	}
                }
            }else{
            	if(!empty($mirrar_style)){
            		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
            	}else{
            		echo '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
            	}
            }
            if(!empty($button_aligment)){
            	echo '</div>';
        	}
        }
		
    }


	public function custom_mirrar_button() {
		$post_id = isset($_POST['post_id']) ? absint($_POST['post_id']) : 0;
		$product_sku = isset($_POST['product_sku']) ? sanitize_text_field($_POST['product_sku']) : '';

		$html = $this->mirrar_render_custom_button($post_id, $product_sku);

		$html =  apply_filters('mirrar_multiple_button', $html , $post_id);
		
		echo json_encode(array('html' => $html));
		die();
    }

	public function mirrar_button_load() {
		
		$mirrar_shop = get_option('mirrar_shop', 'false');
		$mirrar_single_product = get_option('mirrar_single_product', 'false');
		$mirrar_all_post_type = get_option('mirrar_all_post_type', 'product');
		$mirrar_all_taxonomy = get_option('mirrar_all_taxonomy', 'product_cat');
		$post_id = 0;
		$mirrar_show = 'no';
		$mirrar_btn_product_class = get_option('mirrar_btn_product_class', '');
		$mirrar_btn_category_class = get_option('mirrar_btn_category_class', '');

		if(is_singular($mirrar_all_post_type) && $mirrar_single_product == 'true') {
			$post_id = get_the_ID();
			$sku_field = apply_filters( 'mirrar_default_product_sku_key', MIRRAR_PRODUCT_SKU_KEY, $post_id );
			$product_sku = sanitize_text_field(get_post_meta($post_id, $sku_field, true));
			
			$mirrar_show = 'yes';
			if($post_id && $product_sku) { ?>
				<script >
					jQuery(document).ready(function($) {
						jQuery.ajax({
							url:  '<?php echo admin_url('admin-ajax.php'); ?>',
							type: 'post',
							data: {
								action: 'custom_mirrar_button',
								post_id : <?php echo $post_id; ?>,
								product_sku : '<?php echo $product_sku; ?>',
							},
							success: function(response) {
								var res = JSON.parse(response);
								<?php if(!empty($mirrar_btn_product_class)){ ?>
									jQuery('.<?php echo $mirrar_btn_product_class;?>').append(res.html);
								<?php } ?>
							},
							error: function(error) {
								console.log(error);
							}
						});
					});
				</script>
			<?php } 
		}

	}

	public function mirrar_render_custom_button($post_id = '', $product_sku = '', $multiple_sku = false) {
		$html = '';
		
		if ($post_id && $product_sku) {
			
			$brand_id = '';
			$mirrar_show = 'yes';
			$mirrar_all_post_type = get_option('mirrar_all_post_type', '');
			$mirrar_setting_brand_id = get_option('mirrar_brand_id', '');
			$mirrar_button_icon = get_option('mirrar_button_icon', '');
			$mirrar_icon_position = get_option('mirrar_icon_position', '');
			$mirrar_style = get_option('mirrar_style', '');
			$mirrar_button_text = get_option('mirrar_button_text', 'Try Mirrar');
			$mirrar_button_alignment = get_option('mirrar_button_alignment', '');
			$mirrar_brand_id = sanitize_text_field(get_post_meta( $post_id, 'mirrar_brand_id', true ));	
			
			if(!empty($mirrar_button_alignment)){
				$button_aligment = 'style=text-align:' . $mirrar_button_alignment . '';
			}else{
				$button_aligment = '';
			}
	
			if(!empty($mirrar_brand_id)){
				$brand_id = $mirrar_brand_id;
			}else{
				$brand_id = $mirrar_setting_brand_id;
			}

			$multiple_sku_class = ($multiple_sku === true) ? 'mirrar_multiple_sku__btn' : '';

			$mirrar_btn_product_css = get_option('mirrar_btn_product_css', '');

			$mirrar_style = $mirrar_style . ' ' . $mirrar_btn_product_css;
			
			if($mirrar_show == 'yes') {
			
				$icon_and_text_left = '';
				$icon_and_text_right = '';
				if(!empty($button_aligment)){
					$html.= '<div class="mirrar-button-wrapper '.$multiple_sku_class.' " ' . esc_attr($button_aligment) . ' >';
				}
			
				if(!empty($mirrar_button_icon)){
					
					if( $mirrar_icon_position == 'left'){
						
						$icon_and_text_left = '<i class="fa ' . esc_attr($mirrar_button_icon) . '"></i> ' . esc_html($mirrar_button_text);
					
						if(!empty($mirrar_style)){
							
							$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . wp_kses( $icon_and_text_left, array('i' => array('class' => array())) ) . '</button>';
						}else{
							
							$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
						}
					}else{
						
						$icon_and_text_right = esc_html($mirrar_button_text) . ' <i class="fa ' . esc_attr($mirrar_button_icon) . '"></i>';
						if(!empty($mirrar_style)){
							$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . wp_kses( $icon_and_text_right, array('i' => array('class' => array())) ) . '</button>';
						}else{
							
							$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
						}
					}
				}else{
					
					if(!empty($mirrar_style)){
						$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " style="' . esc_attr($mirrar_style) . '"" data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
					}else{
						$html.= '<button type="button" name="mirror-button" id="mirror-button" class="mirror-button mirror-button-single " data-title-slug="mirrar-style" data-product="' . esc_attr($product_sku). '" data-brand_id="' . esc_attr($brand_id) . '">' . esc_html($mirrar_button_text) . '</button>';
					}
				}
				if(!empty($button_aligment)){
					$html.= '</div>';
				}	
        	}

		}

		return $html;
	}

	/**
	 * Display mirrar button using shortcode on any page
	 * 
	 * @since 	2.0
	 * @param 	string    $atts       Shortcode attributes array which contains post id.
	 */

	public function mirrar_btn_render($atts) {
		
			$atts = shortcode_atts(
				array(
					'post_id' => 0,
					'sku'=> '',
				), $atts, 'mirrar_btn_show'
			);	
		
			$html = '';

			$post_id = absint($atts['post_id']);

			if ($post_id && $post_id > 0) {	
			
				if (!empty($atts['sku'])) {
					$product_sku = $atts['sku'];
					$multiple_sku = true;
				}else{
					$sku_field = apply_filters( 'mirrar_default_product_sku_key', MIRRAR_PRODUCT_SKU_KEY, $post_id );
					$product_sku = get_post_meta($post_id, $sku_field, true);
					$multiple_sku = false;
				}
			
				$html = $this->mirrar_render_custom_button($post_id, $product_sku, $multiple_sku);

			}

			return $html;

	}

}
