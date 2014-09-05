<?php
/*
 *	Tell DMS we are in a subfolder and fire up the flux capacitors!
**/
define( 'DMS_CORE', true );
require_once( 'dms/functions.php' );

//replace 'PageLines-' prefix for DMS Editor media uploads (from editor/editor.actions.php)
add_filter( 'pl_up_image_prefix', 'my_pl_upload_prefix');

function my_pl_upload_prefix(){
	return 'groundwork-'; //example result: 'My Keyword - filename.jpg'
}
