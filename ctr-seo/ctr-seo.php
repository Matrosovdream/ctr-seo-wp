<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Chip-tuning SEO extension
 * Plugin URI:        https://www.chiptuningreseller.com (original plugin URI)
 * Description:       SEO extension for Chip-tuning plugin.
 * Version:           1.0.0
 * Author:            Stanislav Matrosov
 * Author URI:        https://github.com/Matrosovdream
 * Author Email:      matrosovdream@gmail.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

define('CTR_SEO_ABS', __DIR__);
define('CTR_SEO_URL', plugin_dir_url( __FILE__ ));

// Initial class
require_once CTR_SEO_ABS . '/classes/init.class.php';



