<?php

/**
 * Metabox for the Services custom post type
 *
 * @package    	Athemes_Toolbox
 * @link        http://athemes.com
 * Author:      aThemes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function athemes_toolbox_services_metabox() {
    new Athemes_Toolbox_Services();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'athemes_toolbox_services_metabox' );
    add_action( 'load-post-new.php', 'athemes_toolbox_services_metabox' );
}

class Athemes_Toolbox_Services {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'st_services_metabox'
			,__( 'Service info', 'athemes_toolbox' )
			,array( $this, 'render_meta_box_content' )
			,'services'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['athemes_toolbox_services_nonce'] ) )
			return $post_id;

		$nonce = $_POST['athemes_toolbox_services_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'athemes_toolbox_services' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'services' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$icon = isset( $_POST['athemes_toolbox_service_icon'] ) ? sanitize_text_field($_POST['athemes_toolbox_service_icon']) : false;
		$link = isset( $_POST['athemes_toolbox_service_link'] ) ? esc_url_raw($_POST['athemes_toolbox_service_link']) : false;

		update_post_meta( $post_id, 'wpcf-service-icon', $icon );
		update_post_meta( $post_id, 'wpcf-service-link', $link );		
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'athemes_toolbox_services', 'athemes_toolbox_services_nonce' );
		$icon = get_post_meta( $post->ID, 'wpcf-service-icon', true ); //Types generated fields compatibility
		$link = get_post_meta( $post->ID, 'wpcf-service-link', true );		
	?>
		<p><strong><label for="athemes_toolbox_service_icon"><?php _e( 'Service icon', 'athemes_toolbox' ); ?></label></strong></p>
		
		<?php if ( $this->check_theme() ) : ?>
		<p><em><?php echo __('Example: <strong>fa-android</strong>. Full list of icons is <a href="https://fontawesome.com/cheatsheet" target="_blank">here</a>'); ?></em></p>
		<?php else : ?>
		<p><em><?php echo __('Example: <strong>icon-mobile</strong>. Full list of icons is <a href="//athemes.com/documentation/et-icons/" target="_blank">here</a>'); ?></em></p>
		<?php endif; ?>

		<p><input type="text" class="widefat" id="athemes_toolbox_service_icon" name="athemes_toolbox_service_icon" value="<?php echo esc_html($icon); ?>"></p>
		<p><strong><label for="athemes_toolbox_service_link"><?php _e( 'Service link', 'athemes_toolbox' ); ?></label></strong></p>
		<p><em><?php echo __('You can link your service to a page of your choice by entering the URL in this field'); ?></em></p>
		<p><input type="text" class="widefat" id="athemes_toolbox_service_link" name="athemes_toolbox_service_link" value="<?php echo esc_url($link); ?>"></p>		
	<?php
	}

	public function check_theme() {
		$theme  = wp_get_theme();
		$parent = wp_get_theme()->parent();
		if ( ($theme != 'Talon' ) && ($theme != 'Talon Pro' ) && ($parent != 'Talon') && ($parent != 'Talon Pro') ) {
			return true;
		} else {
			return false;
		}
	}


}
