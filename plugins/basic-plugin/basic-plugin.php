<?php
/**
 * Plugin Name: Basic Plugin from Monorepo
 */

add_action('admin_notices', function() {
    echo '<div class="notice notice-success is-dismissible"><p>Basic Plugin from Monorepo is active</p></div>';
});