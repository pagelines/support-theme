<?php
/*
 *	Tell DMS we are in a subfolder and fire up the flux capacitors!
**/
define( 'DMS_CORE', true );
require_once( 'dms/functions.php' );

add_action("pre_get_posts", "custom_front_page");
function custom_front_page($wp_query) {
    // Compare queried page ID to front page ID.
    if(!is_admin() && $wp_query->get("page_id") == get_option("page_on_front")) {

        // Set custom parameters
        $wp_query->set("post_type", "tabkit");
        $wp_query->set("posts_per_page", -1);

        // WP_Query shouldn't actually fetch the page in our case.
        $wp_query->set("page_id", "");

    }
}
