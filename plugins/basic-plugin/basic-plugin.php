<?php
/**
 * Plugin Name: Basic Plugin from Monorepo
 */

namespace BasicPlugin;

add_action('admin_notices', function() {
    echo '<div class="notice notice-success is-dismissible"><p>Basic Plugin from Monorepo is active</p></div>';
});

define( 'MONOREPO_PLUGIN_FILE', __FILE__ );

/**
 * Autoload classes
 */
require_once  __DIR__ . '/vendor/autoload.php';

/**
 * Initialize plugin
 */
$basic = Plugin::get_instance();

register_activation_hook(
	MONOREPO_PLUGIN_FILE,
	array(
		$basic,
		'on_plugin_activation',
	)
);

register_deactivation_hook(
	MONOREPO_PLUGIN_FILE,
	array(
		$basic,
		'on_plugin_deactivation',
	)
);