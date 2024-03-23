<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Taxos label check
$woeic_checkout_page_check = get_option( 'woeic-checkout-page-check', plugin_dir_url( __FILE__ ) . '../../assets/public/Bwb.png' );
$woeic_custmr_sig = get_option( 'woeic-custmr-sig', 'Customer\'s Signature' );
$woeic_auth_sig = get_option( 'woeic-auth-sig', 'Authorized Signature' );
// Label controls
// *** top title
$woeic_estimass_toptitle_color_value = get_option( 'woeic-estimass-toptitle-color');
$woeic_estimass_toptitle_fontsize_value = get_option( 'woeic-estimass-toptitle-fontsize');
$woeic_estimass_toptitle_fontweight_value = get_option( 'woeic-estimass-toptitle-fontweight');
$woeic_estimass_toptitle_fontfamilly_value = get_option( 'woeic-estimass-toptitle-fontfamilly');
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
// *** estimdate
$woeic_estimass_presets_value = get_option( 'woeic-estimass-presets', 'Download Invoice' );
$woeic_top_title_check_check = get_option( 'woeic-top-title-check', 'Print');
// *** reason
$woeic_reason_color_value = get_option( 'woeic-reason-color' );
$woeic_reason_fontsize_value = get_option( 'woeic-reason-fontsize');
$woeic_reason_fontweight_value = get_option( 'woeic-reason-fontweight');
$woeic_reason_fontfamilly_value = get_option( 'woeic-reason-fontfamilly' );
// *** estimdate
$woeic_estimdate_color_value = get_option( 'woeic-estimdate-color');
$woeic_estimdate_bgcolor_value = get_option( 'woeic-estimdate-bgcolor');
$woeic_estimdate_fontsize_value = get_option( 'woeic-estimdate-fontsize');
$woeic_estimdate_fontweight_value = get_option( 'woeic-estimdate-fontweight');
$woeic_estimdate_fontfamilly_value = get_option( 'woeic-estimdate-fontfamilly');
// Get all font here start
$all_fonts = [
	'' => esc_html__('Default', 'woo-easy-invoice'),
	'Arial, sans-serif' => esc_html__('Arial', 'woo-easy-invoice'),
	'Helvetica, sans-serif' => esc_html__('Helvetica', 'woo-easy-invoice'),
	'Georgia, serif' => esc_html__('Georgia', 'woo-easy-invoice'),
	'fantasy' => esc_html__('Fantasy', 'woo-easy-invoice'),
	'Tahoma, sans-serif' => esc_html__('Tahoma', 'woo-easy-invoice'),
	'Courier New, monospace' => esc_html__('Courier New', 'woo-easy-invoice'),
	'Palatino, serif' => esc_html__('Palatino', 'woo-easy-invoice'),
	'Garamond, serif' => esc_html__('Garamond', 'woo-easy-invoice'),
	'Century Gothic, sans-serif' => esc_html__('Century Gothic', 'woo-easy-invoice'),
	'Futura, sans-serif' => esc_html__('Futura', 'woo-easy-invoice'),
	'Roboto, sans-serif' => esc_html__('Roboto', 'woo-easy-invoice'),
	'Open Sans, sans-serif' => esc_html__('Open Sans', 'woo-easy-invoice'),
	'Lato, sans-serif' => esc_html__('Lato', 'woo-easy-invoice'),
	'Montserrat, sans-serif' => esc_html__('Montserrat', 'woo-easy-invoice'),
	'Raleway, sans-serif' => esc_html__('Raleway', 'woo-easy-invoice'),
	'Poppins, sans-serif' => esc_html__('Poppins', 'woo-easy-invoice'),
	'Nunito, sans-serif' => esc_html__('Nunito', 'woo-easy-invoice'),
	'Playfair Display, serif' => esc_html__('Playfair Display', 'woo-easy-invoice'),
	'Quicksand, sans-serif' => esc_html__('Quicksand', 'woo-easy-invoice'),
];

?>
<div class="admin-panel">
  <form method="post" action="options.php">
    <div class="header">
			<?php
			settings_fields( 'woeic-plugin-settings' );
      ?>
      <a href="https://bestwpdeveloper.com/" target="_blank"><h1 class="dashboard-title"><?php echo esc_html__('BEST WP DEVELOPER', 'woo-easy-invoice'); ?></h1></a>
      <?php
			do_settings_sections( 'woeic-plugin-main-menu' );
      ?>
      <div class="save-button woeic-save-button">
        <?php submit_button(); ?>
      </div>
    </div>
    <div class="section">
      <div class="clmn-wrap first-clm">
        <div class="select-container">
          <label for=""><?php echo esc_html__('Download Button:-', 'woo-easy-invoice');?></label>
          <?php echo '<input type="text" name="woeic-estimass-presets" id="woeic-estimass-presets" value="'.$woeic_estimass_presets_value.'" title="Text"  placeholder="Download Invoice">';?>
        </div>
        <div class="list-container">
          <label class="qape_title"><?php echo esc_html__('Print Button:-', 'woo-easy-invoice'); ?></label>
          <?php echo '<input type="text" name="woeic-top-title-check" id="woeic-top-title-check" value="'.$woeic_top_title_check_check.'" title="Text"  placeholder="Print Invoice">';?>
        </div>
        <div class="list-container">
          <label class="qape_title"><?php echo esc_html__('Invoice Logo:-', 'woo-easy-invoice'); ?></label>
          <?php $image_url = $woeic_checkout_page_check; ?>
          <input type="hidden" name="woeic-checkout-page-check" id="woeic-checkout-page-check" value="<?php echo esc_attr($image_url); ?>" />
          <a href="#" class="button" id="upload_image_button"><?php echo empty($image_url) ? esc_html__('Upload Logo', 'woo-easy-invoice') : esc_html__('Change Image', 'woo-easy-invoice'); ?></a>
          <div class="woeic-selected-logo">
            <img src="<?php echo $image_url; ?>" style="max-width: 100%; height: auto;" />
          </div>
        </div>

        <div class="list-container">
          <label class="qape_title"><?php echo esc_html__('Customer\'s Signature:-', 'woo-easy-invoice'); ?></label>
          <?php echo '<input type="text" name="woeic-custmr-sig" id="woeic-top-title-check" value="'.$woeic_custmr_sig.'" title="Text"  placeholder="Customer\'s Signature">';?>
        </div>
        <div class="list-container">
          <label class="qape_title"><?php echo esc_html__('Authorized Signature:-', 'woo-easy-invoice'); ?></label>
          <?php echo '<input type="text" name="woeic-auth-sig" id="woeic-top-title-check" value="'.$woeic_auth_sig.'" title="Text"  placeholder="Authorized Signature">';?>
        </div>
      </div>
      <div class="clmn-wrap secound-clm">
        <div class="control_row">
          <label for="" class="woeic_style_title"><?php echo esc_html__('Download Invoice', 'woo-easy-invoice');?></label>
          <div class="color-control woeic-style-style demoPanel" id="cpb" style="width: 170px">
            <label for=""><?php echo esc_html__('Color', 'woo-easy-invoice');?></label>
            <!-- <div id="cpb" class="demoPanel" style="width: 170px"> -->
            <?php echo '<input name="woeic-estimass-color" id="cp1" value="'.$woeic_estimass_color_value.'" title="Text">';?>
            <!-- </div> -->
            <!-- <div id="cpb" class="demoPanel" style="width: 170px">
              <input id="cp1" />
            </div> -->
            <?php
            echo '<script>';
              echo 'var woeic_estimass_color_value = "' . $woeic_estimass_color_value . '";';
            echo '</script>';
            ?>
          </div>
          <?php if(!empty($woeic_estimass_color_value)):echo "<style>.woeic-estimass-color{background:$woeic_estimass_color_value !important;}</style>";endif;?>
          <div class="color-control woeic-style-style demoPanel" id="cpb" style="width: 170px">
            <label for=""><?php echo esc_html__('Background Color', 'woo-easy-invoice');?></label>
            <?php echo '<input name="woeic-estimass-bgcolor" id="cp2" value="'.$woeic_estimass_bgcolor_value.'" title="Text">';?>
            <?php
            echo '<script>';
              echo 'var woeic_estimass_color_value2 = "' . $woeic_estimass_bgcolor_value . '";';
            echo '</script>';
            ?>
          </div>
          <div class="text-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font size', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-estimass-fontsize" id="woeic-estimass-fontsize" value="'.$woeic_estimass_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="number-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font weight', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-estimass-fontweight" id="woeic-estimass-fontweight" value="'.$woeic_estimass_fontweight_value.'" title="Number"  placeholder="400">';?>
          </div>
          <div class="select-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font family', 'woo-easy-invoice');?></label>
            <?php
            echo '<select id="woeic-estimass-fontfamilly" name="woeic-estimass-fontfamilly">';
              foreach($all_fonts as $font_slug => $font_title){
                echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($woeic_estimass_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'woo-easy-invoice').'</option>';
              }
            echo '</select>';
            ?>
          </div>
        </div>
        <div class="control_row">
        <label for="" class="woeic_style_title"><?php echo esc_html__('Popup Wrap', 'woo-easy-invoice');?></label>
          <div class="color-control woeic-style-style demoPanel" id="cpb" style="width: 170px">
            <label for=""><?php echo esc_html__('Background', 'woo-easy-invoice');?></label>
            <?php echo '<input name="woeic-estimass-bgcolor5" id="cp3" value="'.$woeic_estimass_bgcolor5_value.'" title="Text">';?>
            <?php
            echo '<script>';
              echo 'var woeic_estimass_color_value3 = "' . $woeic_estimass_bgcolor5_value . '";';
            echo '</script>';
            ?>
          </div>
          <div class="text-control woeic-style-style">
            <label for=""><?php echo esc_html__('Wrap Shadow', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-reason-box-shadow5" id="woeic-reason-box-shadow5" value="'.$woeic_estimass_box_shadow5_value.'" title="10px"  placeholder="0 0 10px rgb(104 104 104 / 50%)">';?>
          </div>
          <div class="text-control woeic-style-style">
            <label for=""><?php echo esc_html__('Border Radius', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-reason-border-radius5" id="woeic-reason-border-radius5" value="'.$woeic_estimass_radius5_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
        </div>
        <div class="control_row">
          <label for="" class="woeic_style_title"><?php echo esc_html__('Print Invoice', 'woo-easy-invoice');?></label>
          <div class="color-control woeic-style-style demoPanel" id="cpb" style="width: 170px">
            <label for=""><?php echo esc_html__('Color', 'woo-easy-invoice');?></label>
            <?php echo '<input name="woeic-estimdate-color" id="cp4" value="'.$woeic_estimdate_color_value.'" title="Text">';?>
            <?php
            echo '<script>';
              echo 'var woeic_estimass_color_value4 = "' . $woeic_estimdate_color_value . '";';
            echo '</script>';
            ?>
          </div>
          <div class="color-control woeic-style-style demoPanel" id="cpb" style="width: 170px">
            <label for=""><?php echo esc_html__('Color', 'woo-easy-invoice');?></label>
            <?php echo '<input name="woeic-estimdate-bgcolor" id="cp5" value="'.$woeic_estimdate_bgcolor_value.'" title="Text">';?>
            <?php
            echo '<script>';
              echo 'var woeic_estimass_color_value5 = "' . $woeic_estimdate_bgcolor_value . '";';
            echo '</script>';
            ?>
          </div>
          <div class="text-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font size', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-estimdate-fontsize" id="woeic-estimdate-fontsize" value="'.$woeic_estimdate_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
          </div>
          <div class="number-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font weight', 'woo-easy-invoice');?></label>
            <?php echo '<input type="text" name="woeic-estimdate-fontweight" id="woeic-estimdate-fontweight" value="'.$woeic_estimdate_fontweight_value.'" title="Number"  placeholder="400">';?>
          </div>
          <div class="select-control woeic-style-style">
            <label for=""><?php echo esc_html__('Font family', 'woo-easy-invoice');?></label>
            <?php
            echo '<select id="woeic-estimdate-fontfamilly" name="woeic-estimdate-fontfamilly">';
              foreach($all_fonts as $font_slug => $font_title){
                echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($woeic_estimdate_fontfamilly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'woo-easy-invoice').'</option>';
              }
            echo '</select>';
            ?>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- in Invoice Logo input replace the input with wp image upload button -->