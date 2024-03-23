<?php
namespace ProdWCLSR;
if (!defined('ABSPATH')) exit;
use ProdWCLSR\PageSettings\Page_Settings;
define("WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url(__FILE__) . "../assets/public");
define("WCLSR_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url(__FILE__) . "../assets/admin");

class ClassProdWCLSR{
    private static $_instance = null;

    public static function instance(){
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

	public function woeic_all_assets_for_the_admin(){
        wp_enqueue_script( 'woeic-script', plugin_dir_url( __FILE__ ) . '../assets/admin/script.js', array('jquery'), '1.0', true );
        wp_enqueue_style( 'woeic-order', plugin_dir_url( __FILE__ ) . '../assets/admin/order.css', null, '1.0', 'all' );
		if (isset($_GET['page']) && $_GET['page'] === 'get-woo-easy-invoice') {
            wp_enqueue_style( 'woeic-evolcss-colorpicker', plugin_dir_url( __FILE__ ) . '../assets/admin/google-color-picker/evol-colorpicker.min.css', null, '1.0', 'all' );
            wp_enqueue_style( 'woeic-style', plugin_dir_url( __FILE__ ) . '../assets/admin/style.css', null, '1.0', 'all' );

            wp_enqueue_script( 'woeic-ajax.googleapis-colorpicker', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'woeic-ajax.googleapis-colorpicker-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), '1.0', true );

            wp_enqueue_script( 'woeic-evol-colorpicker', plugin_dir_url( __FILE__ ) . '../assets/admin/google-color-picker/evol-colorpicker.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'woeic-evol-colorpicker-script', plugin_dir_url( __FILE__ ) . '../assets/admin/google-color-picker/script.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'woeic-upload-img', plugin_dir_url( __FILE__ ) . '../assets/admin/upload-img.js', array('jquery'), '1.0', true );
        }
        wp_enqueue_media();
	}

	public function woeic_admin_menu_test(){
		if(current_user_can('manage_options')){
			add_menu_page(
				esc_html__('Woo Easy Invoice', 'woo-easy-invoice'),
				esc_html__('Woo Easy Invoice', 'woo-easy-invoice'),
				'manage_options',
				'get-woo-easy-invoice',
				array($this, 'woeic_plugin_submenu_about_plugin_page'),
				'dashicons-printer',
				58
			);
		}
    add_action('admin_init', array($this, 'woeic_admin_controls'));
	}

    public function woeic_admin_controls() {
        include __DIR__ . '/dashboard/controls.php';
    }

	public function woeic_plugin_submenu_about_plugin_page() {
        include __DIR__ . '/dashboard/dashboard-style.php';
    }
    
    public function woeic_plugin_function_for_datas_callback() {}

    public function woeic_taxoes_styles(){
        // *** estimdate
        $woeic_estimdate_color_value = get_option( 'woeic-estimdate-color');
        $woeic_estimdate_bgcolor_value = get_option( 'woeic-estimdate-bgcolor');
        $woeic_estimdate_fontsize_value = get_option( 'woeic-estimdate-fontsize');
        $woeic_estimdate_fontweight_value = get_option( 'woeic-estimdate-fontweight');
        $woeic_estimdate_fontfamilly_value = get_option( 'woeic-estimdate-fontfamilly');
        // *** estimass
        $woeic_estimass_color_value = get_option( 'woeic-estimass-color');
        $woeic_estimass_bgcolor_value = get_option( 'woeic-estimass-bgcolor');
        $woeic_estimass_fontsize_value = get_option( 'woeic-estimass-fontsize');
        $woeic_estimass_fontweight_value = get_option( 'woeic-estimass-fontweight');
        $woeic_estimass_fontfamilly_value = get_option( 'woeic-estimass-fontfamilly');
        // headline bg
        $woeic_estimass_bgcolor5_value = get_option( 'woeic-estimass-bgcolor5' );
        $woeic_estimass_box_shadow5_value = get_option( 'woeic-reason-box-shadow5' );
        $woeic_estimass_radius5_value = get_option( 'woeic-reason-border-radius5' );
        $html = "<style>
        #printButton{
            color:{$woeic_estimdate_color_value} !important;
            background-color:{$woeic_estimdate_bgcolor_value} !important;
            font-size:{$woeic_estimdate_fontsize_value} !important;
            font-weight:{$woeic_estimdate_fontweight_value} !important;
            font-family:{$woeic_estimdate_fontfamilly_value} !important;
        }
        #downloadButton{
            color:{$woeic_estimass_color_value} !important;
            background-color:{$woeic_estimass_bgcolor_value} !important;
            font-size:{$woeic_estimass_fontsize_value} !important;
            font-weight:{$woeic_estimass_fontweight_value} !important;
            font-family:{$woeic_estimass_fontfamilly_value} !important;
        }
        .popup-container{
            background:{$woeic_estimass_bgcolor5_value} !important;
            box-shadow:{$woeic_estimass_box_shadow5_value} !important;
            border-radius:{$woeic_estimass_radius5_value} !important;
        }
        ";
        $html .= '</style>';
        echo $html;
    }
  
    public function woeic_settings_plugin_action_link($links, $file) {
        if (plugin_basename(__FILE__) == $file) {
            $woeic_settings_link = '<a href="' . admin_url('admin.php?page=get-woo-easy-invoice') . '" target="_blank">' . esc_html__('Settings', 'woo-easy-invoice') . '</a>';
            array_push($links, $woeic_settings_link);
        }
        return $links;
    }
  
    public function woeic_all_assets_for_the_public(){
        wp_enqueue_script('woeic_ssprint_eeescript', plugin_dir_url(__FILE__) . '../assets/public/style.js', array('jquery'), null, true);
        wp_enqueue_script('woeic_print_script', plugin_dir_url(__FILE__) . '../assets/public/woeic-print-script.js', array('jquery'), null, true);

        wp_enqueue_script('woeic-multi-font', plugin_dir_url(__FILE__) . '../assets/public/font.js', array('jquery'), '1.0', true);
        $all_css_js_file = array(
            'woeic-fontawesome' => array('woeic_path_define' => WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/fontawesome.css'),
            'woeic-style' => array('woeic_path_define' => WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/style.css'),
        );

        foreach ($all_css_js_file as $handle => $fileinfo) {
            wp_enqueue_style($handle, $fileinfo['woeic_path_define'], null, '1.0', 'all');
        }
    }

    public function woeic_thankyou_page1($order_id){
        echo '<button id="downloadButton" onclick="openPopup()"><i class="fa-solid fa-download"></i>'.esc_html(get_option( 'woeic-estimass-presets', 'Download Invoice' )).'</button>';
        echo '<div id="popup" class="popup-container">';
        echo '<span class="close" onclick="closePopup()">&times;</span>';
        echo '<div class="popup-content">';
        echo '<div class="print-btn">';
        echo '<button id="printButton"><i class="fa-solid fa-print"></i>'.esc_html(get_option( 'woeic-top-title-check', 'Print')).'</button>';
        echo '</div>';
        echo '<div class="woeic_print_this">';
        // Your invoice content generation code here
        $order = wc_get_order($order_id);
        // Customer information
        $customer_data = array(
            'customer_name'    => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
            'customer_address' => $order->get_formatted_billing_address(),
            'customer_email'    => $order->get_billing_email(),
            'customer_phone'    => $order->get_billing_phone(),
        );
        // Admin information
        $site_title = get_bloginfo('name');
        $admin_email = get_option('woocommerce_admin_email', get_option('admin_email'));
        $user_id = get_current_user_id();
        $default_billing_address = get_user_meta($user_id, 'billing_address_1', true);
        $admin_data = array(
            'admin_name'    => $site_title,
            'admin_address' => $default_billing_address,
            'admin_email'   => $admin_email,
        );
        // Invoice information
        $invoice_data = array(
            'invoice_number' => $order->get_order_number(),
            'issue_date'     => $order->get_date_created()->date('Y-m-d'),
        );
        // Invoice items
        $items = $order->get_items();
        $invoice_items = array();
        $counter = 1;
        foreach ($items as $item_id => $item) {
            $product      = $item->get_product();
            $product_name = $product ? $product->get_name() : $item->get_name();
            $invoice_items[] = array(
                'invoice_no'    => $counter,
                'name'          => $product_name,
                'quantity'      => $item->get_quantity(),
                'unit_price'    => wc_price($item->get_subtotal() / $item->get_quantity()),
                'total_price'   => wc_price($item->get_total()),
            );
            $counter++;
        }
        // Total amount
        $total_amount = wc_price($order->get_total());
        // Output the HTML structure
        echo '<div style="font-family: \'Arial\', sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px;">';
        echo '<div style="text-align: center; padding-bottom: 20px; border-bottom: 2px solid #ccc;">';
        echo !empty(get_option( 'woeic-checkout-page-check'))?'<img src="'.get_option( 'woeic-checkout-page-check', plugin_dir_url( __FILE__ ) . '../../assets/public/Bwb.png' ).'" alt="Logo" style="max-width: 200px; height: auto;">':esc_html('Logo');
        echo '<div style="font-size: 24px; font-weight: bold; margin-top: 10px;">'.$site_title.'</div>';
        echo '</div>';
        echo '<div style="margin-top: 20px; display: flex;">';
        echo '<div style="margin-top: 20px;"><strong>'.esc_html__('Billing address:', 'woo-easy-invoice').'</strong><br>';
        echo $customer_data['customer_name'] . '<br>';
        echo $customer_data['customer_address'] . '<br>';
        echo esc_html__('Email: ', 'woo-easy-invoice') . $customer_data['customer_email'] . '<br>';
        echo esc_html__('Phone: ', 'woo-easy-invoice') . $customer_data['customer_phone'] . '</div>';
        echo '<div style="margin-top: 20px;"><strong>'.esc_html__('From:', 'woo-easy-invoice').'</strong><br>';
        echo $admin_data['admin_name'] . '<br>';
        echo $admin_data['admin_address'] . '<br>';
        echo esc_html__('Email: ', 'woo-easy-invoice') . $admin_data['admin_email'] . '<br>';
        echo '</div>';
        echo '<div style="margin-top: 20px;">';
        echo '<div><strong>'.esc_html__('Order No:', 'woo-easy-invoice').'</strong> ' . $invoice_data['invoice_number'] . '</div>';
        echo '<div><strong>'.esc_html__('Date:', 'woo-easy-invoice').'</strong> ' . $invoice_data['issue_date'] . '</div>';
        echo '</div>';
        echo '</div>';
        // Invoice Table
        echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
        echo '<thead><tr>';
        echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">'.esc_html__('Product No', 'woo-easy-invoice').'</th>';
        echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">'.esc_html__('Name', 'woo-easy-invoice').'</th>';
echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">'.esc_html__('Quantity', 'woo-easy-invoice').'</th>';
echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">'.esc_html__('Unit Price', 'woo-easy-invoice').'</th>';
echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">'.esc_html__('Total Price', 'woo-easy-invoice').'</th>';
echo '</tr></thead><tbody>';
foreach ($invoice_items as $item) {
    echo '<tr>';
    echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['invoice_no'] . '</td>';
    echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['name'] . '</td>';
    echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['quantity'] . '</td>';
    echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['unit_price'] . '</td>';
    echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['total_price'] . '</td>';
    echo '</tr>';
}
echo '</tbody></table>';
// Total Amount
echo '<div style="margin-top: 20px; text-align: right; font-weight: bold; font-size: 18px;">';
echo '<strong>'.esc_html__('Total Amount:', 'woo-easy-invoice').'</strong> ' . $total_amount;
echo '</div>';
$order = wc_get_order($order_id);
echo $order->get_payment_method_title();
// Signature
echo '<div style="margin-top: 100px; display: flex; justify-content: space-between;">';
echo '<div style="font-weight: bold;">'.esc_html(get_option( 'woeic-custmr-sig', 'Customer\'s Signature' )).'</div>';
echo '<div style="font-weight: bold;">'.esc_html(get_option( 'woeic-auth-sig', 'Authorized Signature' )).'</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}

    

    public function woeic_thankyou_page($order_id){
        $this->woeic_thankyou_page1($order_id);
    }

    public function woeic_view_order_page_content($order_id){
        $this->woeic_thankyou_page1($order_id);
    }

    public function __construct(){
        // Last Date 
        add_action('woocommerce_thankyou', [$this, 'woeic_thankyou_page']);
        add_action('woocommerce_view_order', [$this, 'woeic_view_order_page_content']);
        // Plugins
        add_action('admin_enqueue_scripts', [$this, 'woeic_all_assets_for_the_admin']);
        add_action('admin_menu', [$this,'woeic_admin_menu_test']);
        add_action('wp_enqueue_scripts', [$this, 'woeic_all_assets_for_the_public']);
        add_filter( 'plugin_action_links', [$this,'woeic_settings_plugin_action_link'], 10, 2 );
        add_action('wp_head', [$this, 'woeic_taxoes_styles'],99);
    }
}

ClassProdWCLSR::instance();
