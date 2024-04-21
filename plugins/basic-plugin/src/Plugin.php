<?php
/**
 * Main plugin class file
 *
 * @package WPMonorepo
 * @since 0.0.1
 */

namespace BasicPlugin;

/**
 * Main plugin class.
 * Handle all plugin initialization, activation and deactivation.
 */
class Plugin extends \Core\Singleton {
	/**
	 * Get instance of a class by key
	 *
	 * @param string $key Class key.
	 *
	 * @return object Singleton instance
	 */
	public static function get( $key ) {
		$instances = array();

		return $instances[ $key ];
	}

	/**
	 * Fires on plugin activation
	 *
	 * @return void
	 */
	public function on_plugin_activation() {
		$post_id = wp_insert_post(
			array(
				'post_title'  => 'Default Basic Plugin Post',
				'post_status' => 'publish',
				'post_type'   => 'post',
			)
		);

		update_option( 'monorepo_default_post', $post_id );
	}

	/**
	 * Fires on plugin deactivation
	 *
	 * @return void
	 */
	public function on_plugin_deactivation() {
		wp_delete_post( get_option( 'monorepo_default_post' ), true );
		delete_option( 'monorepo_default_post' );
	}
}
