<?php
/**
 * Manage native ad tab
 */

// Add default values
add_filter( 'before_getting_design_plus_option', 'add_native_ad_dp_default_options' );

// Add label of native ad tab
add_action( 'tcd_tab_labels', 'add_native_ad_tab_label' );

// Add HTML of native ad tab
add_action( 'tcd_tab_panel', 'add_native_ad_tab_panel' );

// Register sanitize function
add_filter( 'theme_options_validate', 'add_native_ad_theme_options_validate' );

function add_native_ad_dp_default_options( $dp_default_options ) {

	$dp_default_options['native_ad_label_font_size'] = 11;
	$dp_default_options['native_ad_label_text_color'] = '#ffffff';
	$dp_default_options['native_ad_label_bg_color'] = '#000000';

  for ( $i = 1; $i<= 6; $i++ ) {
	  $dp_default_options['native_ad_title' . $i] = '';
	  $dp_default_options['native_ad_sponsor' . $i] = '';
	  $dp_default_options['native_ad_label' . $i] = '';
	  $dp_default_options['native_ad_desc' . $i] = '';
	  $dp_default_options['native_ad_image' . $i] = '';
	  $dp_default_options['native_ad_url' . $i] = '';
	  $dp_default_options['native_ad_target' . $i] = '0';
  }

	return $dp_default_options;
}

function add_native_ad_tab_label( $tab_labels ) {
	$tab_labels['native_ad'] = __( 'Native advertisement', 'tcd-w' );
	return $tab_labels;
}

function add_native_ad_tab_panel( $dp_options ) {
	global $dp_default_options;
?>
<div id="tab-content-native_ad">
  <div class="theme_option_field cf">
  	<h3 class="theme_option_headline"><?php _e( 'Native advertisement settings', 'tcd-w' ); ?></h3>
  	<h4 class="theme_option_headline2"><?php _e( 'Advertisement label settings', 'tcd-w' ); ?></h4>
  	<table class="theme_option_table">
  		<tr>
  			<td><label><?php _e( 'Font size', 'tcd-w' ); ?></label></td>
  			<td><input class="tiny-text" name="dp_options[native_ad_label_font_size]" type="number" value="<?php echo esc_attr( $dp_options['native_ad_label_font_size'] ); ?>" min="0" step="1"> px</td>
  		</tr>
  		<tr>
  			<td><label><?php _e( 'Font color', 'tcd-w' ); ?></label></td>
  			<td><input class="c-color-picker" name="dp_options[native_ad_label_text_color]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_label_text_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['native_ad_label_text_color'] ); ?>"></td>
  		</tr>
  		<tr>
  			<td><label><?php _e( 'Background color', 'tcd-w' ); ?></label></td>
  			<td><input class="c-color-picker" name="dp_options[native_ad_label_bg_color]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_label_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['native_ad_label_bg_color'] ); ?>"></td>
  		</tr>
  	</table>
  	<h4 class="theme_option_headline2"><?php _e( 'Advertisement contents settings', 'tcd-w' ); ?></h4>
  	<div class="theme_option_message">
  		<p><?php _e( 'One out of five advertisement will be displayed at random.', 'tcd-w' ); ?></p>
  	</div>
  	<?php for ( $i = 1; $i <= 6; $i++ ) : ?>
  	<div class="sub_box cf">
  		<h3 class="theme_option_subbox_headline"><?php printf( __( 'Native advertisement%d', 'tcd-w' ), $i ); ?></h3>
  		<div class="sub_box_content">
  			<h4 class="theme_option_headline2"><?php _e( 'Advertisement title', 'tcd-w' ); ?></h4>
  			<input class="regular-text" name="dp_options[native_ad_title<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_title' . $i] ); ?>">
  			<h4 class="theme_option_headline2"><?php _e( 'Sponsor', 'tcd-w' ); ?></h4>
  			<input class="regular-text" name="dp_options[native_ad_sponsor<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_sponsor' . $i] ); ?>">
  			<h4 class="theme_option_headline2"><?php _e( 'Advertisement label', 'tcd-w' ); ?></h4>
  			<input class="regular-text" name="dp_options[native_ad_label<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_label' . $i] ); ?>">
  			<h4 class="theme_option_headline2"><?php _e( 'Advertisement description', 'tcd-w' ); ?></h4>
  			<textarea class="large-text" name="dp_options[native_ad_desc<?php echo $i; ?>]"><?php echo esc_textarea( $dp_options['native_ad_desc' . $i] ); ?></textarea>
  			<h4 class="theme_option_headline2"><?php _e( 'Advertisement image', 'tcd-w' ); ?></h4>
  			<p><?php _e( 'Recommend image size. Width:840px and more, Height:570px and more', 'tcd-w' ); ?></p>
  			<p><?php _e( 'When displaying native advertisements on the header slider, we recommend a width of 1450px and a height of 725px or more', 'tcd-w' ); ?></p>
  			<div class="image_box cf">
  				<div class="cf cf_media_field hide-if-no-js native_ad_image<?php echo $i; ?>">
  					<input type="hidden" value="<?php echo esc_attr( $dp_options['native_ad_image' . $i] ); ?>" id="native_ad_image<?php echo $i; ?>" name="dp_options[native_ad_image<?php echo $i; ?>]" class="cf_media_id">
  					<div class="preview_field"><?php if ( $dp_options['native_ad_image' . $i] ) { echo wp_get_attachment_image( $dp_options['native_ad_image' . $i], 'medium' ); } ?></div>
  					<div class="buttton_area">
  						<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
  						<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['native_ad_image' . $i] ) { echo 'hidden'; } ?>">
  					</div>
  				</div>
  			</div>
  			<h4 class="theme_option_headline2"><?php _e( 'Advertisement link url', 'tcd-w' ); ?></h4>
  			<input class="regular-text" name="dp_options[native_ad_url<?php echo $i; ?>]" type="text" value="<?php echo esc_attr( $dp_options['native_ad_url' . $i] ); ?>">
        <p><label><input type="checkbox" value="1" name="dp_options[native_ad_target<?php echo $i; ?>]" <?php checked( 1, $dp_options['native_ad_target' . $i] ); ?>> <?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
  			<input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
  		</div>
  	</div>
  	<?php endfor; ?>
  	<input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
  </div>
</div><!-- END #tab-content10 -->
<?php
}

function add_native_ad_theme_options_validate( $input ) {

	$input['native_ad_label_font_size'] = intval( $input['native_ad_label_font_size'] );
	$input['native_ad_label_text_color'] = sanitize_hex_color( $input['native_ad_label_text_color'] );
	$input['native_ad_label_bg_color'] = sanitize_hex_color( $input['native_ad_label_bg_color'] );

	for ( $i = 1; $i <= 6; $i++ ) {
		$input['native_ad_title' . $i] = sanitize_text_field( $input['native_ad_title' . $i] );
		$input['native_ad_sponsor' . $i] = sanitize_text_field( $input['native_ad_sponsor' . $i] );
		$input['native_ad_label' . $i] = sanitize_text_field( $input['native_ad_label' . $i] );
		$input['native_ad_desc' . $i] = sanitize_textarea_field( $input['native_ad_desc' . $i] );
		$input['native_ad_image' . $i] = sanitize_text_field( $input['native_ad_image' . $i] );
		$input['native_ad_url' . $i] = esc_url_raw( $input['native_ad_url' . $i] );
    if ( ! isset( $input['native_ad_target' . $i] ) ) $input['native_ad_target' . $i] = null;
    $input['native_ad_target' . $i] = $input['native_ad_target' . $i] === '1' ? '1' : '0';
	}

	return $input;
}
