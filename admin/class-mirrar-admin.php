<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://mirrar.com/
 * @since      1.0.0
 *
 * @package    Mirrar
 * @subpackage Mirrar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mirrar
 * @subpackage Mirrar/admin
 * @author     mirrAR.com <tech@styledotme.com>
 */
class Mirrar_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'mirrar_create_menu_and_submenu_page' ) );
		add_filter( 'woocommerce_product_data_tabs', array( $this,'woocomerce_product_show_tabs' ), 99, 1 );
        add_action( 'woocommerce_product_data_panels', array( $this,'mirrar_product_meta_field' ) );
        add_action( 'woocommerce_process_product_meta', array( $this,'mirrar_checkbox_fields_save' ) );
        add_action( 'admin_init', array( $this,'mirrar_include_files' ) );
        add_action( 'admin_init', array( $this,'mirrar_settings_register' ) );
        add_action( 'wp_ajax_mirrar_synchronize_button_setting', array( $this,'mirrar_synchronize_button_setting' ));
		add_action( 'wp_ajax_nopriv_mirrar_synchronize_button_setting', array( $this,'mirrar_synchronize_button_setting' ) );
		add_filter( 'woocommerce_product_get_sku', array( $this, MIRRAR_PRODUCT_SKU_KEY ), 10, 2 );
		add_action( 'add_meta_boxes', array( $this, 'mirrar_add_custom_meta_box'));
		add_action( 'save_post', array( $this, 'mirrar_save_custom_meta_box_data'));		
	
	}

	/**
	 * Register the stylesheets for the admin area.
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
        if(isset($_GET['page'])){
        	$mirrar_page = sanitize_text_field($_GET['page']);
        }else{
        	$mirrar_page = '';
        }
        if(!empty($mirrar_page) && $mirrar_page == 'mirrar-settings') {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mirrar-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'font-awesome-min', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
	    }
	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mirrar-admin.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'mirrar_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	}
	/**
	 * Register the core file for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function mirrar_create_menu_and_submenu_page()
    {
         add_menu_page('mirrAR', 'mirrAR', 'manage_options', 'mirrar-settings', array($this, 'mirrar_pages'), plugin_dir_url( __FILE__ ) . 'image/mirrar.png' );
    }
	/**
	 * Mirrar files include.
	 *
	 * @since    1.0.0
	 */
	public function mirrar_include_files() {

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
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/mirrar-icon.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/mirrar-option-fields.php';                     
	}
	/**
	 * Register menu pages.
	 *
	 * @since    1.0.0
	 */
	public function mirrar_pages() {

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
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/mirrar-settings.php';
	}
	/**
	 * Mirrar field show in product meta.
	 *
	 * @since    1.0.0
	 */
	function woocomerce_product_show_tabs($product_data_tabs) {
	    $product_data_tabs['product-show-tab'] = array(
	        									 'label'  => esc_html__('Mirrar Button', 'mirrar'),
	       		 								 'target' => 'mirrar_button_enable_disable',
    											 );
    	return $product_data_tabs;
	}
	/**
	 * Mirrar meta field.
	 *
	 * @since    1.0.0
	 */
    public function mirrar_product_meta_field() {
	    global $woocommerce, $post;
	    echo '<div id="mirrar_button_enable_disable" class="panel woocommerce_options_panel">';
		woocommerce_wp_checkbox(
			array(
				'id'          => 'mirrar_show',
				'label'       => esc_html__('Enable/Disable', 'mirrar'),
				'default'     => '0',
				'description' => esc_html__('Check this box to enable mirrar button.', 'mirrar'),
				'desc_tip'    => false,
			)
		);
		woocommerce_wp_text_input(
			array(
				'id'          => MIRRAR_PRODUCT_SKU_KEY,
				'label'       => esc_html__('Custom SKU', 'mirrar'),
			)
		);
		woocommerce_wp_text_input(
			array(
				'id'          => 'mirrar_brand_id',
				'label'       => esc_html__('Brand Id', 'mirrar'),
			)
		);
	    echo '</div>';
    }
    /**
	 * Save mirrar meta field data.
	 *
	 * @since    1.0.0
	 */
	public function mirrar_checkbox_fields_save($post_id) {
	    if(isset($_POST['mirrar_show'])){
	    	$mirrar_show_checkbox = 'yes';
	    }else{
	    	$mirrar_show_checkbox = 'no';
	    }	    
	    update_post_meta($post_id, 'mirrar_show', sanitize_text_field($mirrar_show_checkbox));
	    
	    if(isset($_POST[MIRRAR_PRODUCT_SKU_KEY])){
	    	$mirrar_custom_sku = sanitize_text_field($_POST[MIRRAR_PRODUCT_SKU_KEY]);
	    }else{
	    	$mirrar_custom_sku = '';
	    }
	    update_post_meta($post_id, MIRRAR_PRODUCT_SKU_KEY, $mirrar_custom_sku);

	    if(isset($_POST['mirrar_brand_id'])){
	    	$mirrar_brand_id = sanitize_text_field($_POST['mirrar_brand_id']);
	    }else{
	    	$mirrar_brand_id = '';
	    }
	    update_post_meta($post_id, 'mirrar_brand_id', $mirrar_brand_id);
	}
	/**
	 * Register mirrar settings.
	 *
	 * @since    1.0.0
	 */
	public function mirrar_settings_register() {	
		/**
		* Get mirrar option fields 
		*/
		$args = '';
		if(function_exists('mirrar_option_fields')){
        	$args = mirrar_option_fields();
		}
		if(!empty($args)) :
		    foreach($args as $key => $val) :
		        register_setting('mirrar-settings', sanitize_text_field($val));
		    endforeach;
		endif;
	}
	/**
	 * Mirrar synchronize button setting
	 *
	 * @since    1.0.0
	 */
	public function mirrar_synchronize_button_setting(){
		global $wpdb;
		$gen_response = 'error';
		$success_active_count = $success_disable_count = 0;
		$total = $active = $deactive = $total_active = $total_deactive = $total_synchronized = '';
		$mirrar_brand_id = !empty(get_option('mirrar_brand_id')) ? get_option('mirrar_brand_id') : '';
		$fields = array('brand_id' => $mirrar_brand_id);
		$api_data = array(
			'method'      => 'POST',
			'timeout'     => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array('Content-Type: multipart/form-data'),
			'body'        => $fields,			    
		);
		$response = wp_remote_post(MIRRAR_BRAND_API_URL, $api_data);
    	$data = array();
    	$get_data = json_decode($response['body'], true);
    	$data['code'] = $get_data['meta']['code'];
    	$data['message'] = $get_data['meta']['message'];    	
    	if(!empty($get_data['data'])){
            foreach($get_data['data'] as $key => $val){
           		switch($key){
           			case 'active_product_codes':
           			    if(!empty($val)){
           			    	$i=1;
           			    	$j=1;
                        	foreach($val as $inner_key => $inner_val){
                        		foreach($inner_val['items'] as $innerkey => $innerVal){
                        			$product_id = '';
                        			$product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE (meta_key='_sku' OR meta_key='mirrar_custom_sku') AND meta_value='%s' LIMIT 1", $innerVal ) );
                        			if(!empty($product_id)){
                        				$active = update_post_meta($product_id, 'mirrar_show', 'yes');
                        				$gen_response = esc_html__('success', 'mirrar');
                        				$success_active_count = $i;
                        				$i++;
                        			}
                        			$total_active = $j;
                        		$j++;
                        		}
                        	}
           			    }else{
           			    	$gen_response = esc_html__('error', 'mirrar');
           			    }
           			break;
           			case 'disable_product_codes':
           				if(!empty($val)){
           					$k=1;
           					$l=1;
                        	foreach($val as $inner_key => $inner_val){
                        		foreach($inner_val['items'] as $innerkey => $innerVal){
                        			$product_id = '';
                        			$product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE (meta_key='_sku' OR meta_key='mirrar_custom_sku') AND meta_value='%s' LIMIT 1", $innerVal ) );
                        			if(!empty($product_id)){
                        				$deactive = update_post_meta($product_id, 'mirrar_show', 'no');
                        				$gen_response = esc_html__('success', 'mirrar');
                        				$success_disable_count = $k;
                        				$k++;
                        			}
                        			$total_deactive = $l;
                        		$l++;
                        		}
                        	}
           			    }else{
           			    	$gen_response = esc_html__('error', 'mirrar');
           			    }
           			break;
           		}
            }
    	}else{
    		$gen_response = esc_html__('error', 'mirrar');
    	}
    	if($gen_response == 'success'){
    		$data['gen_response'] = $gen_response;
    		$total = $total_active+$total_deactive;
    		$total_synchronized = $success_active_count+$success_disable_count;
    		$data['gen_message'] = sprintf( esc_html__( 'Total (%d) products scynchronized out of (%d).', 'mirrar' ), $total_synchronized,  $total);
    		$data['active_product_codes'] = $success_active_count;
    		$data['disable_product_codes'] = $success_disable_count;
    	}else{
    		$data['gen_response'] = $gen_response;
    		$data['gen_message'] = esc_html__('Your data synchronization failed.', 'mirrar');
    		$data['active_product_codes'] = $success_active_count;
    		$data['disable_product_codes'] = $success_disable_count;
    	}
    	echo json_encode($data);
        wp_die();
	}
	/**
	 * Mirrar custom sku
	 *
	 * @since    1.0.0
	 */
	public function mirrar_custom_sku( $sku, $product ) {
	    if ( ! is_admin() ) {
	    	$mirrar_custom_sku = get_post_meta( $product->get_id(), MIRRAR_PRODUCT_SKU_KEY, true ) ;
	    	if(!empty($mirrar_custom_sku)){
	    	   $sku = $mirrar_custom_sku;
	    	}else{
	    	   $parts = explode( '.', $sku );
	           $parts  = array_slice( $parts, 0, 2 );
	           $sku = implode( '.', $parts );
	    	}
	    }
	    return $sku;
	}

	/**
	 * Mirrar add custom meta box for non WooCommerce products
	 */

	public function mirrar_add_custom_meta_box() {
		$mirrar_all_post_type = !empty(get_option('mirrar_all_post_type')) ? get_option('mirrar_all_post_type') : '';
	
		add_meta_box(
			'mirrar_custom_meta_box',
			esc_html__('Mirrar Custom Fields', 'mirrar'),
			array($this, 'mirrar_render_custom_meta_box'),
			 $mirrar_all_post_type, 
			'normal',
			'default'
		);
	}

	/**
	 * Mirrar save custom meta box values for non WooCommerce products
	 */
	public function mirrar_save_custom_meta_box_data($post_id) {
		// Check if it's not an autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	
		if (isset($_POST['mirrar_custom_sku'])) {
			$sku_field = apply_filters( 'mirrar_default_product_sku_key', MIRRAR_PRODUCT_SKU_KEY, $post->ID );
			update_post_meta($post_id, $sku_field, sanitize_text_field($_POST['mirrar_custom_sku']));
		}
	
		if (isset($_POST['mirrar_brand_id'])) {
			update_post_meta($post_id, 'mirrar_brand_id', sanitize_text_field($_POST['mirrar_brand_id']));
		}
	}

	/**
	 * Mirrar custom meta box HTML render for non WooCommerce products
	 */
	public function mirrar_render_custom_meta_box($post) {
		// Retrieve saved meta values
		$sku_field = apply_filters( 'mirrar_default_product_sku_key', MIRRAR_PRODUCT_SKU_KEY, $post->ID );
		$custom_sku = get_post_meta($post->ID, $sku_field, true);
		$brand_id = get_post_meta($post->ID, 'mirrar_brand_id', true);
	
		// Output the HTML for the meta box
		?>
		<table>
			<tr>
				<td><label for="mirrar_custom_sku"><?php esc_html_e('Custom SKU:', 'mirrar'); ?></label></td>
				<td><input type="text" id="mirrar_custom_sku" name="mirrar_custom_sku" value="<?php echo esc_attr($custom_sku); ?>"></td>
			</tr>
			<tr>
				<td><label for="mirrar_brand_id"><?php esc_html_e('Brand id:', 'mirrar'); ?></label></td>
				<td><input type="text" id="mirrar_brand_id" name="mirrar_brand_id" value="<?php echo esc_attr($brand_id); ?>"></td>
		</table>
		<?php
	}

}

