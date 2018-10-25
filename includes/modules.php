<?php
/**
 * List of modules.
 */
$modules = array(
	'modules/pp-heading/pp-heading.php',
	'modules/pp-dual-button/pp-dual-button.php',
	'modules/pp-spacer/pp-spacer.php',
	'modules/pp-iconlist/pp-iconlist.php',
	'modules/pp-infobox/pp-infobox.php',
	'modules/pp-infolist/pp-infolist.php',
	'modules/pp-fancy-heading/pp-fancy-heading.php',
	'modules/pp-business-hours/pp-business-hours.php',
	'modules/pp-line-separator/pp-line-separator.php',
);

/* Form Modules */
if ( class_exists( 'WPCF7_ContactForm' ) ) {
	$modules[] = 'modules/pp-contact-form-7/pp-contact-form-7.php';
}

foreach ( $modules as $module ) {
	require_once BB_POWERPACK_DIR . $module;
}