<?php
function pp_column_effects( $form, $id ) {
    if ( 'col' == $id ) {
        $advanced = $form['tabs']['advanced'];
        unset($form['tabs']['advanced']);

        /** Gradient */
        $border_section = $form['tabs']['style']['sections']['border'];
        unset( $form['tabs']['style']['sections']['border'] );

        $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['pp_gradient'] = __('Gradient', 'bb-powerpack');
        $form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['pp_gradient'] = array(
            'sections'  => array('pp_col_gradient')
        );
        $form['tabs']['style']['sections']['pp_col_gradient'] = array(
            'title'     => __('Gradient', 'bb-powerpack'),
            'fields'    => array(
                'gradient_type' => array(
                    'type'      => 'pp-switch',
                    'label'     => __('Gradient Type', 'bb-powerpack'),
                    'default'   => 'linear',
                    'options'   => array(
                        'linear'    => __('Linear', 'bb-powerpack'),
                        'radial'    => __('Radial', 'bb-powerpack'),
                    ),
                    'toggle'    => array(
                        'linear'    => array(
                            'fields'    => array('linear_direction')
                        ),
                    ),
                    'preview'   => array(
                        'type'      => 'none'
                    )
                ),
                'gradient_color'    => array(
                    'type'              => 'pp-color',
                    'label'             => __('Colors', 'bb-powerpack'),
                    'show_reset'        => true,
                    'default'           => array(
                        'primary'           => 'd81660',
                        'secondary'         => '7d22bd',
                    ),
                    'options'           => array(
                        'primary'           => __('Primary', 'bb-powerpack'),
                        'secondary'         => __('Secondary', 'bb-powerpack'),
                    ),
                ),
                'linear_direction'  => array(
                    'type'              => 'select',
                    'label'             => __('Gradient Direction', 'bb-powerpack'),
                    'default'           => 'bottom',
                    'options'           => array(
                        'bottom'                => __('Top to Bottom', 'bb-powerpack'),
                        'right'                 => __('Left to Right', 'bb-powerpack'),
                        'top_right_diagonal'    => __('Bottom Left to Top Right', 'bb-powerpack'),
                        'top_left_diagonal'     => __('Bottom Right to Top Left', 'bb-powerpack'),
                        'bottom_right_diagonal' => __('Top Left to Bottom Right', 'bb-powerpack'),
                        'bottom_left_diagonal'  => __('Top Right to Bottom Left', 'bb-powerpack'),
                    ),
                    'preview'           => array(
                        'type'              => 'none'
                    )
                ),
            )
        );

        $form['tabs']['style']['sections']['border'] = $border_section;

        /** Round Corners */
        $form['tabs']['style']['sections']['border']['fields']['pp_round_corners'] = array(
            'type'              => 'pp-multitext',
            'label'             => __('Round Corners', 'bb-powerpack'),
            'description'       => 'px',
            'default'           => array(
                'top_left'          => 0,
                'top_right'         => 0,
                'bottom_left'       => 0,
                'bottom_right'      => 0
            ),
            'options'           => array(
                'top_left'          => array(
                    'placeholder'       => __('Top Left', 'bb-powerpack'),
                    'tooltip'           => __('Top Left', 'bb-powerpack')
                ),
                'top_right'         => array(
                    'placeholder'       => __('Top Right', 'bb-powerpack'),
                    'tooltip'           => __('Top Right', 'bb-powerpack')
                ),
                'bottom_left'       => array(
                    'placeholder'       => __('Bottom Left', 'bb-powerpack'),
                    'tooltip'           => __('Bottom Left', 'bb-powerpack')
                ),
                'bottom_right'      => array(
                    'placeholder'       => __('Bottom Right', 'bb-powerpack'),
                    'tooltip'           => __('Bottom Right', 'bb-powerpack')
                ),
            )
        );

        /** Box Shadow */
        $form['tabs']['box_shadow'] = array(
            'title'     => __('Box Shadow', 'bb-powerpack'),
            'sections'  => array(
                'box_shadow'    => array(
                    'title'         => __('Settings', 'bb-powerpack'),
                    'fields'        => array(
                        'pp_box_shadow_color'   => array(
                            'type'                  => 'color',
                            'label'                 => __('Color', 'bb-powerpack'),
                            'default'               => '000000',
                            'preview'               => array(
                                'type'                  => 'none'
                            )
                        ),
                        'pp_box_shadow' => array(
                            'type'          => 'pp-multitext',
                            'label'         => __('Shadow', 'bb-powerpack'),
                            'default'       => array(
                                'vertical'      => 0,
                                'horizontal'    => 0,
                                'blur'          => 0,
                                'spread'        => 0
                            ),
                            'options'   => array(
                                'vertical'  => array(
                                    'icon'          => 'fa-arrows-v',
                                    'placeholder'   => __('Vertical', 'bb-powerpack'),
                                    'tooltip'       => __('Vertical', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'horizontal' => array(
                                    'icon'          => 'fa-arrows-h',
                                    'placeholder'   => __('Horizontal', 'bb-powerpack'),
                                    'tooltip'       => __('Horizontal', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'blur'      => array(
                                    'icon'          => 'fa-circle-o',
                                    'placeholder'   => __('Blur', 'bb-powerpack'),
                                    'tooltip'       => __('Blur', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'spread'    => array(
                                    'icon'          => 'fa-paint-brush',
                                    'placeholder'   => __('Spread', 'bb-powerpack'),
                                    'tooltip'       => __('Spread', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                )
                            ),
                            'preview'       => array(
                                'type'          => 'none'
                            )
                        ),
                        'pp_box_shadow_opacity' => array(
                            'type'                  => 'text',
                            'label'                 => __('Opacity', 'bb-powerpack'),
                            'default'               => 50,
                            'description'           => '%',
                            'size'                  => 5,
                            'maxlength'             => 3,
                            'preview'               => array(
                                'type'                  => 'none'
                            )
                        ),
                        'pp_box_shadow_hover_switch'    => array(
                            'type'                          => 'pp-switch',
                            'label'                         => __('Change on Hover?', 'bb-powerpack'),
                            'default'                       => 'no',
                            'options'                       => array(
                                'yes'                           => __('Yes', 'bb-powerpack'),
                                'no'                            => __('No', 'bb-powerpack'),
                            ),
                            'toggle'                        => array(
                                'yes'                           => array(
                                    'sections'                       => array('box_shadow_hover')
                                )
                            ),
                            'preview'                       => array(
                                'type'                          => 'none'
                            )
                        )
                    )
                ),
                'box_shadow_hover'  => array(
                    'title'             => __('Hover Settings', 'bb-powerpack'),
                    'fields'            => array(
                        'pp_box_shadow_color_hover' => array(
                            'type'                  => 'color',
                            'label'                 => __('Color', 'bb-powerpack'),
                            'default'               => '000000',
                            'preview'               => array(
                                'type'                  => 'none'
                            )
                        ),
                        'pp_box_shadow_hover'   => array(
                            'type'                  => 'pp-multitext',
                            'label'                 => __('Shadow', 'bb-powerpack'),
                            'default'               => array(
                                'vertical'              => 0,
                                'horizontal'            => 0,
                                'blur'                  => 0,
                                'spread'                => 0
                            ),
                            'options'   => array(
                                'vertical'  => array(
                                    'icon'          => 'fa-arrows-v',
                                    'placeholder'   => __('Vertical', 'bb-powerpack'),
                                    'tooltip'       => __('Vertical', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'horizontal' => array(
                                    'icon'          => 'fa-arrows-h',
                                    'placeholder'   => __('Horizontal', 'bb-powerpack'),
                                    'tooltip'       => __('Horizontal', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'blur'      => array(
                                    'icon'          => 'fa-circle-o',
                                    'placeholder'   => __('Blur', 'bb-powerpack'),
                                    'tooltip'       => __('Blur', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                ),
                                'spread'    => array(
                                    'icon'          => 'fa-paint-brush',
                                    'placeholder'   => __('Spread', 'bb-powerpack'),
                                    'tooltip'       => __('Spread', 'bb-powerpack'),
                                    'preview'       => array(
                                        'type'          => 'none'
                                    )
                                )
                            ),
                            'preview'       => array(
                                'type'          => 'none'
                            )
                        ),
                        'pp_box_shadow_opacity_hover'   => array(
                            'type'                          => 'text',
                            'label'                         => __('Opacity', 'bb-powerpack'),
                            'default'                       => 50,
                            'description'                   => '%',
                            'size'                          => 5,
                            'maxlength'                     => 3,
                            'preview'                       => array(
                                'type'                          => 'none'
                            )
                        ),
                        'pp_box_shadow_transition'      => array(
                            'type'                          => 'text',
                            'label'                         => __('Transition Speed', 'bb-powerpack'),
                            'default'                       => 500,
                            'description'                   => 'ms',
                            'size'                          => 5,
                            'maxlength'                     => 5,
                            'help'                          => __('Enter value in milliseconds.', 'bb-powerpack'),
                            'preview'                       => array(
                                'type'                          => 'none'
                            )
                        ),
                    )
                )
            )
        );

        $form['tabs']['advanced'] = $advanced;
    }
    return $form;
}
add_filter( 'fl_builder_register_settings_form', 'pp_column_effects', 10, 2 );

/**
 * CSS
 */
function pp_column_effects_css( $css, $nodes, $global_settings ) {
    foreach ( $nodes['columns'] as $column ) {
        ob_start();
        if ( isset( $column->settings->bg_type ) && 'pp_gradient' == $column->settings->bg_type ) {
            ?>
            <?php if ( $column->settings->gradient_type == 'linear' ) { ?>
            	<?php if ( $column->settings->linear_direction == 'bottom' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(top, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(bottom, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(bottom, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(bottom, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(to bottom, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            	<?php if ( $column->settings->linear_direction == 'right' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(left, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(right, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(right, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(right, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(to right, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            	<?php if ( $column->settings->linear_direction == 'top_right_diagonal' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(45deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(45deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(45deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(45deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(45deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            	<?php if ( $column->settings->linear_direction == 'top_left_diagonal' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(135deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(315deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(315deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(315deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(315deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            	<?php if ( $column->settings->linear_direction == 'bottom_right_diagonal' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(315deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(135deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(135deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(135deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(135deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            	<?php if ( $column->settings->linear_direction == 'bottom_left_diagonal' ) { ?>
            		.fl-node-<?php echo $column->node; ?> {
            			background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            			background-image: -webkit-linear-gradient(255deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -moz-linear-gradient(210deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -o-linear-gradient(210deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: -ms-linear-gradient(210deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            			background-image: linear-gradient(210deg, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		}
            	<?php } ?>
            <?php } ?>
            <?php if ( $column->settings->gradient_type == 'radial' ) { ?>
            	.fl-node-<?php echo $column->node; ?> {
            		background-color: #<?php echo $column->settings->gradient_color['primary']; ?>;
            		background-image: -webkit-radial-gradient(circle, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		background-image: -moz-radial-gradient(circle, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		background-image: -o-radial-gradient(circle, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		background-image: -ms-radial-gradient(circle, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            		background-image: radial-gradient(circle, <?php echo '#'.$column->settings->gradient_color['primary']; ?> 0%, <?php echo '#'.$column->settings->gradient_color['secondary']; ?> 100%);
            	}
            <?php } ?>
        <?php } ?>

        .fl-node-<?php echo $column->node; ?> .fl-col-content {
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
            -webkit-box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
            -moz-box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
            box-shadow: <?php echo $column->settings->pp_box_shadow['vertical']; ?>px <?php echo $column->settings->pp_box_shadow['horizontal']; ?>px <?php echo $column->settings->pp_box_shadow['blur']; ?>px <?php echo $column->settings->pp_box_shadow['spread']; ?>px <?php echo pp_hex2rgba('#'.$column->settings->pp_box_shadow_color, $column->settings->pp_box_shadow_opacity / 100); ?>;
            -webkit-transition: -webkit-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -webkit-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
            -moz-transition: -moz-box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, -moz-transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
            transition: box-shadow <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out, transform <?php echo $column->settings->pp_box_shadow_transition; ?>ms ease-in-out;
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

        <?php
            $css .= ob_get_clean();
    }
    return $css;
}
add_filter( 'fl_builder_render_css', 'pp_column_effects_css', 10, 3 );
