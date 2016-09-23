<?php

function pp_column_render_css( $extensions ) {

    if ( array_key_exists( 'corners', $extensions['col'] ) || in_array( 'corners', $extensions['col'] ) ) {
        add_filter( 'fl_builder_render_css', 'pp_column_round_corners_css', 10, 3 );
    }
    if ( array_key_exists( 'shadow', $extensions['col'] ) || in_array( 'shadow', $extensions['col'] ) ) {
        add_filter( 'fl_builder_render_css', 'pp_column_shadow_css', 10, 3 );
    }
}

/** Corners */
function pp_column_round_corners_css( $css, $nodes, $global_settings ) {

    foreach ( $nodes['columns'] as $column ) {

        ob_start();
    ?>
        .fl-node-<?php echo $column->node; ?> .fl-col-content {
            <?php if ( isset( $column->settings->pp_round_corners ) ) { ?>
                <?php if ( $column->settings->pp_round_corners['top_left'] > 0 ) { ?>
                border-top-left-radius: <?php echo $column->settings->pp_round_corners['top_left']; ?>px;
                <?php } ?>
                <?php if ( $column->settings->pp_round_corners['top_right'] > 0 ) { ?>
                border-top-right-radius: <?php echo $column->settings->pp_round_corners['top_right']; ?>px;
                <?php } ?>
                <?php if ( $column->settings->pp_round_corners['bottom_left'] > 0 ) { ?>
                border-bottom-left-radius: <?php echo $column->settings->pp_round_corners['bottom_left']; ?>px;
                <?php } ?>
                <?php if ( $column->settings->pp_round_corners['bottom_right'] > 0 ) { ?>
                border-bottom-right-radius: <?php echo $column->settings->pp_round_corners['bottom_right']; ?>px;
                <?php } ?>
            <?php } ?>
        }

    <?php $css .= ob_get_clean();
    }

    return $css;
}

/** Shadow */
function pp_column_shadow_css( $css, $nodes, $global_settings ) {

    foreach ( $nodes['columns'] as $column ) {

        ob_start();
    ?>

        <?php if ( isset( $column->settings->pp_box_shadow ) ) { ?>

            .fl-node-<?php echo $column->node; ?> .fl-col-content {
                -webkit-box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
                -moz-box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
                box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
                -webkit-transition: -webkit-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -webkit-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                -moz-transition: -moz-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -moz-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                transition: box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                will-change: box-shadow;
            }

            <?php if ( 'yes' == $column->settings->pp_box_shadow_hover_switch ) { ?>
                .fl-node-<?php echo $column->node; ?> .fl-col-content:hover {
                    -webkit-box-shadow: <?php echo $column->settings->pp_box_shadow_hover['vertical']; ?>px <?php echo $column->settings->pp_box_shadow_hover['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow_hover['blur']; ?>px <?php echo $column->settings->pp_box_shadow_hover['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color_hover, $column->settings->pp_box_shadow_opacity_hover / 100); ?>;
                    -moz-box-shadow: <?php echo $column->settings->pp_box_shadow_hover['vertical']; ?>px <?php echo $column->settings->pp_box_shadow_hover['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow_hover['blur']; ?>px <?php echo $column->settings->pp_box_shadow_hover['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color_hover, $column->settings->pp_box_shadow_opacity_hover / 100); ?>;
                    box-shadow: <?php echo $column->settings->pp_box_shadow_hover['vertical']; ?>px <?php echo $column->settings->pp_box_shadow_hover['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow_hover['blur']; ?>px <?php echo $column->settings->pp_box_shadow_hover['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color_hover, $column->settings->pp_box_shadow_opacity_hover / 100); ?>;
                    -webkit-transition: -webkit-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -webkit-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                    -moz-transition: -moz-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -moz-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                    transition: box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
                }
            <?php } ?>

        <?php }

        $css .= ob_get_clean();
    }

    return $css;
}
