<?php
/**
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
function woeic_code_page($order_id){
	echo '<button id="downloadButton">'.esc_html__('Download Invoice', 'woo-easy-invoice').'</button>';
	echo '<div id="popupContainer" class="popup-container">';
		echo '<div class="popup-content">';
            echo '<div class="print-btn">';
                echo '<button id="printButton">'.esc_html__('Print', 'woo-easy-invoice').'</button>';
            echo '</div>';
			echo '<div class="woeic_print_this">';
				// Get the order
                $order = wc_get_order($order_id);

                // Customer information
                $customer_data = array(
                    'customer_name'    => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
                    'customer_address' => $order->get_formatted_billing_address(),
                    'customer_email'    => $order->get_billing_email(),
                    'customer_phone'    => $order->get_billing_phone(),
                );

                // Admin information (you may customize this based on how you store admin information)
                $site_title = get_bloginfo('name');
                $admin_email = get_option('woocommerce_admin_email', get_option('admin_email'));
                $user_id = get_current_user_id();
                $default_billing_address = get_user_meta($user_id, 'billing_address_1', true);
                $admin_data = array(
                    'admin_name'    => $site_title,
                    'admin_address' => $default_billing_address,
                    'admin_email'   => $admin_email,
                    'admin_phone'   => '+123456789',
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
                echo '<img src="'.get_site_icon_url().'" alt="Logo" style="max-width: 100px; height: auto;">';
                // echo get_custom_logo();
                $site_icon_url = get_site_icon_url();
                echo 'Site Icon: ' . $site_icon_url;


                echo '<div style="font-size: 24px; font-weight: bold; margin-top: 10px;">'.$site_title.'</div>';
                echo '</div>';

                echo '<div style="margin-top: 20px; display: flex;">';
                echo '<div style="margin-top: 20px;"><strong>Billing address:</strong><br>';
                echo $customer_data['customer_name'] . '<br>';
                echo $customer_data['customer_address'] . '<br>';
                echo 'Email: ' . $customer_data['customer_email'] . '<br>';
                echo 'Phone: ' . $customer_data['customer_phone'] . '</div>';

                echo '<div style="margin-top: 20px;"><strong>From:</strong><br>';
                echo $admin_data['admin_name'] . '<br>';
                echo $admin_data['admin_address'] . '<br>';
                echo 'Email: ' . $admin_data['admin_email'] . '<br>';
                echo 'Phone: ' . $admin_data['admin_phone'] . '</div>';

                echo '<div style="margin-top: 20px;">';
                echo '<div><strong>Order No:</strong> ' . $invoice_data['invoice_number'] . '</div>';
                echo '<div><strong>Date:</strong> ' . $invoice_data['issue_date'] . '</div>';
                echo '</div>';
                echo '</div>';

                // Invoice Table
                echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
                echo '<thead><tr>';
                echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Product No</th>';
                echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Name</th>';
                echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Quantity</th>';
                echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Unit Price</th>';
                echo '<th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Total Price</th>';
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
                echo '<strong>Total Amount:</strong> ' . $total_amount;
                echo '</div>';

                $order = wc_get_order($order_id);
                echo $order->get_payment_method_title();
                // Signature
                echo '<div style="margin-top: 100px; display: flex; justify-content: space-between;">';
                echo '<div style="font-weight: bold;">Customer\'s Signature</div>';
                echo '<div style="font-weight: bold;">Authorized Signature</div>';
                echo '</div>';

                echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
    // Enqueue the script
    wp_enqueue_style('woeic_ssprint_sss', plugin_dir_url(__FILE__) . 'assets/public/style.css', null, null, 'all');
    wp_enqueue_script('woeic_ssprint_eeescript', plugin_dir_url(__FILE__) . 'assets/public/style.js', array('jquery'), null, true);
    wp_enqueue_script('woeic_print_script', plugin_dir_url(__FILE__) . 'assets/public/woeic-print-script.js', array('jquery'), null, true);


}
function woeic_thankyouwww_page(){
    woeic_code_page();
}
add_action('woocommerce_thankyou', 'woeic_thankyouwww_page');
// i want to see product no 1,2,3,4..... numbers here echo '<td style="border: 1px solid #ddd; padding: 10px;">' . $item['invoice_no'] . '</td>';

function woeic_view_order_page_content($order_id)
{
    // Get the order
    $order = wc_get_order($order_id);

    // Output additional content here
    echo '<div style="margin-top: 20px;">';
    echo '<h2>' . esc_html__('Additional Information', 'woo-easy-invoice') . '</h2>';

    // Output whatever additional information you want to display
    echo '<p>' . esc_html__('Order Status:', 'woo-easy-invoice') . ' ' . esc_html($order->get_status()) . '</p>';
    // Add more information as needed

    echo '</div>';
}

add_action('woocommerce_view_order', 'woeic_view_order_page_content'); */