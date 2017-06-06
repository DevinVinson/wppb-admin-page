<?php
/**
 * The plugin bootstrap file
 *
 * @link              http://devinvinson.com
 * @since             1.0.0
 * @package           Wppb_Admin_Page
 *
 * Plugin Name:       WPPB Admin Page
 * Version:           1.0.0
 * Author:            Devin Vinson
 * Author URI:        http://devinvinson.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wppb-admin-page
 * Domain Path:       /languages
 */

// Include Composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Load Main Admin Page
$pluginAdmin = new WppbAdminPage\MainAdminPage('1.0.0', 'wppb-admin-page');
$pluginAdmin->runMenuHook();

// Add a sub menu page to Main Admin Page
$pluginSubPage = new WppbAdminPage\SubAdminPage( '1.0.0', 'wppb-admin-page');
$pluginSubPage->runSubMenuHook( $pluginAdmin->getSlug() );