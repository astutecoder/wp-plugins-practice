<?php

/**
 * Plugin Name: Hello Plugin
 * Description: This is my first WP Plugin
 * Version: 1.0.0
 * Author: Sk. Azadur Rahman
 * Author URI: https://astutecoder.com
 * Plugin URI: https://astutecoder.com/products/hello-world
 */

add_action("admin_notices", "astutecoder_hw_show_message");
function astutecoder_hw_show_message()
{
  echo '<div class="notice notice-success is-dismissible"><p>Hello, I am a dismissable success message</p></div>';
}

add_action("wp_dashboard_setup", "astutecoder_hw_dashboard_widget");
function astutecoder_hw_dashboard_widget()
{
  wp_add_dashboard_widget("astutecoder_hw_dashboard_widget", "ACHW- Hello World Widget", "astutecoder_hw_custom_admin_widget");
}
function astutecoder_hw_custom_admin_widget()
{
  echo "Content for the widget";
}
