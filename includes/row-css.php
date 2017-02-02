<?php

function pp_row_render_css( $extensions ) {

    if ( array_key_exists( 'gradient', $extensions['row'] ) || in_array( 'gradient', $extensions['row'] ) ) {
        add_filter( 'fl_builder_render_css', 'pp_row_gradient_css', 10, 3 );
    }
    if ( array_key_exists( 'separators', $extensions['row'] ) || in_array( 'separators', $extensions['row'] ) ) {
        add_filter( 'fl_builder_render_css', 'pp_row_separators_css', 10, 3 );
    }
}

function pp_row_gradient_css( $css, $nodes, $global_settings ) {
    foreach ( $nodes['rows'] as $row ) {
        ob_start();

        if ( isset( $row->settings->bg_type ) && 'pp_gradient' == $row->settings->bg_type ) {
        ?>

            <?php if ( $row->settings->gradient_type == 'linear' ) { ?>
                <?php if ( $row->settings->linear_direction == 'bottom' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(top, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(bottom, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(bottom, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(bottom, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(to bottom, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
                <?php if ( $row->settings->linear_direction == 'right' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(left, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(right, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(right, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(right, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(to right, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
                <?php if ( $row->settings->linear_direction == 'top_right_diagonal' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(45deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(45deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(45deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(45deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(45deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
                <?php if ( $row->settings->linear_direction == 'top_left_diagonal' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(135deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(315deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(315deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(315deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(315deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
                <?php if ( $row->settings->linear_direction == 'bottom_right_diagonal' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(315deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(135deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(135deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(135deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(135deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
                <?php if ( $row->settings->linear_direction == 'bottom_left_diagonal' ) { ?>
                    .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                        background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                        background-image: -webkit-linear-gradient(255deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -moz-linear-gradient(210deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -o-linear-gradient(210deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: -ms-linear-gradient(210deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                        background-image: linear-gradient(210deg, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    }
                <?php } ?>
            <?php } ?>
            <?php if ( $row->settings->gradient_type == 'radial' ) { ?>
                .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap {
                    background-color: #<?php echo $row->settings->gradient_color['primary']; ?>;
                    background-image: -webkit-radial-gradient(circle, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    background-image: -moz-radial-gradient(circle, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    background-image: -o-radial-gradient(circle, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    background-image: -ms-radial-gradient(circle, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                    background-image: radial-gradient(circle, <?php echo '#'.$row->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$row->settings->gradient_color['secondary']; ?> 100%);
                }
            <?php } ?>

        <?php
        }

        $css .= ob_get_clean();
    }

    return $css;
}

function pp_row_separators_css( $css, $nodes, $global_settings ) {
    foreach ( $nodes['rows'] as $row ) {
        ob_start();
        ?>

        .fl-builder-row-settings #fl-field-separator_position {
            display: none !important;
        }
        <?php if ( 'none' != $row->settings->separator_type || 'none' != $row->settings->separator_type_bottom ) { ?>

            <?php $scaleY = '-webkit-transform: scaleY(-1); -moz-transform: scaleY(-1); -ms-transform: scaleY(-1); -o-transform: scaleY(-1); transform: scaleY(-1);'; ?>
            <?php $scaleX = '-webkit-transform: scaleX(-1); -moz-transform: scaleX(-1); -ms-transform: scaleX(-1); -o-transform: scaleX(-1); transform: scaleX(-1);'; ?>

            .fl-node-<?php echo $row->node; ?> .pp-row-separator {
                position: absolute;
                left: 0;
                width: 100%;
                z-index: 1;
            }
            .pp-previewing .fl-node-<?php echo $row->node; ?> .pp-row-separator {
                z-index: 2001;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator svg {
                position: absolute;
                left: 0;
                width: 100%;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg {
                top: 0;
                bottom: auto;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg {
                top: auto;
                bottom: 0;
            }
            <?php if ( 'triangle' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-big-triangle {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'triangle_shadow' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-big-triangle-shadow {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'triangle_left' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-big-triangle-left {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'triangle_right' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-big-triangle-right {
                -webkit-transform: scale(-1);
                -moz-transform: scale(-1);
                -ms-transform: scale(-1);
                -o-transform: scale(-1);
                transform: scale(-1);
            }
            <?php } ?>
            <?php if ( 'triangle_small' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-small-triangle {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'tilt_right' == $row->settings->separator_type || 'tilt_right' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-tilt-right,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-tilt-right {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'curve' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-curve {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'wave' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-wave {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'cloud' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-cloud {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'slit' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-slit {
                <?php echo $scaleY; ?>
            }
            <?php } ?>

            <?php if ( 'triangle_right' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-big-triangle-right {
                <?php echo $scaleX; ?>
            }
            <?php } ?>
            <?php if ( 'tilt_right' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg.pp-tilt-right {
                <?php echo $scaleX; ?>
            }
            <?php } ?>

            <?php if ( 'tilt_left' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-tilt-left {
                -webkit-transform: scale(-1);
                -moz-transform: scale(-1);
                -ms-transform: scale(-1);
                -o-transform: scale(-1);
                transform: scale(-1);
            }
            <?php } ?>
            <?php if ( 'zigzag' == $row->settings->separator_type || 'zigzag' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator .pp-zigzag:before,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator .pp-zigzag:after {
                content: '';
                pointer-events: none;
                position: absolute;
                right: 0;
                left: 0;
                z-index: 1;
                display: block;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top .pp-zigzag:before,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top .pp-zigzag:after {
                height: <?php echo $row->settings->separator_height; ?>px;
                background-size: <?php echo $row->settings->separator_height; ?>px 100%;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom .pp-zigzag:before,
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom .pp-zigzag:after {
                height: <?php echo $row->settings->separator_height_bottom; ?>px;
                background-size: <?php echo $row->settings->separator_height_bottom; ?>px 100%;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator .pp-zigzag:after {
                top: 100%;
                background-position: 50%;
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top .pp-zigzag:after {
                background-image: -webkit-gradient(linear, 0 0, 300% 100%, color-stop(0.25, #<?php echo $row->settings->separator_color; ?>), color-stop(0.25, #<?php echo $row->settings->separator_color; ?>));
                background-image: linear-gradient(135deg, #<?php echo $row->settings->separator_color; ?> 25%, transparent 25%), linear-gradient(225deg, #<?php echo $row->settings->separator_color; ?> 25%, transparent 25%);
            }
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom .pp-zigzag:after {
                background-image: -webkit-gradient(linear, 0 0, 300% 100%, color-stop(0.25, #<?php echo $row->settings->separator_color_bottom; ?>), color-stop(0.25, #<?php echo $row->settings->separator_color_bottom; ?>));
                background-image: linear-gradient(135deg, #<?php echo $row->settings->separator_color_bottom; ?> 25%, transparent 25%), linear-gradient(225deg, #<?php echo $row->settings->separator_color_bottom; ?> 25%, transparent 25%);
            }
            <?php } ?>

            @media only screen and (max-width: 768px) {
                .fl-node-<?php echo $row->node; ?> .pp-row-separator-top {
                    <?php if ( 'no' == $row->settings->separator_tablet ) { ?>
                        display: none;
                    <?php } ?>
                }
                .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom {
                    <?php if ( 'no' == $row->settings->separator_tablet_bottom ) { ?>
                        display: none;
                    <?php } ?>
                }
                <?php if ( 'yes' == $row->settings->separator_tablet && $row->settings->separator_height_tablet > 0 ) { ?>
                    .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg {
                        height: <?php echo $row->settings->separator_height_tablet; ?>px;
                    }
                <?php } ?>
                <?php if ( 'yes' == $row->settings->separator_tablet_bottom && $row->settings->separator_height_tablet_bottom > 0 ) { ?>
                    .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg {
                        height: <?php echo $row->settings->separator_height_tablet_bottom; ?>px;
                    }
                <?php } ?>
            }
            @media only screen and (max-width: 480px) {
                .fl-node-<?php echo $row->node; ?> .pp-row-separator-top {
                    <?php if ( 'no' == $row->settings->separator_mobile ) { ?>
                        display: none;
                    <?php } ?>
                }
                .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom {
                    <?php if ( 'no' == $row->settings->separator_mobile_bottom ) { ?>
                        display: none;
                    <?php } ?>
                }
                <?php if ( 'yes' == $row->settings->separator_mobile && $row->settings->separator_height_mobile > 0 ) { ?>
                    .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg {
                        height: <?php echo $row->settings->separator_height_mobile; ?>px;
                    }
                <?php } ?>
                <?php if ( 'yes' == $row->settings->separator_mobile_bottom && $row->settings->separator_height_mobile_bottom > 0 ) { ?>
                    .fl-node-<?php echo $row->node; ?> .pp-row-separator-bottom svg {
                        height: <?php echo $row->settings->separator_height_mobile_bottom; ?>px;
                    }
                <?php } ?>
            }
        <?php } ?>

        <?php
        $css .= ob_get_clean();
    }

    return $css;
}
