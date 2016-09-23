<?php

$license 	= self::get_option( 'bb_powerpack_license_key' );
$status 	= self::get_option( 'bb_powerpack_license_status' );
$current_tab = isset( $_REQUEST['tab'] ) ? $_REQUEST['tab'] : 'general';

if ( is_multisite() && !is_network_admin() ) {
    if ( $current_tab != 'page-templates' ) {
        $current_tab = 'row-templates';
    }
}

?>

<div class="wrap">

    <h2><?php _e('PowerPack Settings'); ?></h2>

    <?php BB_PowerPack_Admin_Settings::render_update_message(); ?>

    <form method="post" id="pp-settings-form" action="<?php echo self::get_form_action( '&tab=' . $current_tab ); ?>">

        <div class="icon32 icon32-pp-settings" id="icon-pp"><br /></div>

        <h2 class="nav-tab-wrapper pp-nav-tab-wrapper">
            <?php if ( is_network_admin() || !is_multisite() ) { ?>
                <a href="<?php echo self::get_form_action( '&tab=general' ); ?>" class="nav-tab<?php echo ( $current_tab == 'general' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'General', 'bb-powerpack' ); ?></a>
                <a href="<?php echo self::get_form_action( '&tab=extensions' ); ?>" class="nav-tab<?php echo ( $current_tab == 'extensions' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'Extensions', 'bb-powerpack' ); ?></a>
            <?php } ?>
        </h2>

        <?php

            // General settings.
            if ( ! isset($_GET['tab']) || 'general' == $current_tab ) {
                include BB_POWERPACK_DIR . 'includes/admin-settings-license.php';
            }

            // Extensions settings.
            if ( 'extensions' == $current_tab ) {
                include BB_POWERPACK_DIR . 'includes/admin-settings-extensions.php';
            }

        ?>

    </form>

    <hr />

    <h2><?php _e('Support', 'bb-powerpack'); ?></h2>
    <p><?php _e('For submitting any support queries, feedback, bug reports or feature requests, please visit <a href="https://wpbeaveraddons.com/contact/" target="_blank">this link</a>', 'bb-powerpack'); ?></p>

</div>
