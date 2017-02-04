<?php

/*
* Plugin Name: WordPress SignUp and Referrals
* Plugin URI: https://github.com/vlatkorun/wp-signup-and-referrals
* Description: Create referrals from user sign-up on your WordPress website
* Version: 1.0.0
* Author: Vladimir Runchev
* Author URI: https://github.com/vlatkorun
* Text domain: wpsr
* Domain path: /languages
* Licence : GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define('WPSR_PLUGIN_URL', plugins_url('', __FILE__));
define('WPSR_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once 'vendor/autoload.php';

$bootstraper = new \WPSR\Bootstrap;
$bootstraper->start();