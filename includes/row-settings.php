<?php

function pp_row_register_settings( $extensions ) {

    if ( array_key_exists( 'separators', $extensions['row'] ) || in_array( 'separators', $extensions['row'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_row_separators', 10, 2 );
    }
    if ( array_key_exists( 'downarrow', $extensions['row'] ) || in_array( 'downarrow', $extensions['row'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_row_downarrow', 10, 2 );
    }
}

/** Separator */
function pp_row_separators( $form, $id ) {

    if ( 'row' != $id ) {
        return $form;
    }

    $advanced = $form['tabs']['advanced'];
    unset($form['tabs']['advanced']);

    $form['tabs']['separator'] = array(
        'title'                     => __('Separator', 'bb-powerpack'),
        'sections'                  => array(
            'enable_separator'          => array(
                'title'                     => '',
                'fields'                    => array(
                    'enable_separator'          => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Enable Separator?', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'sections'                  => array('separator_top', 'separator_bottom')
                            )
                        )
                    )
                )
            ),
            'separator_top'             => array(
                'title'                     => __('Top Separator', 'bb-powerpack'),
                'fields'                    => array(
                    'separator_type'            => array(
                        'type'                      => 'select',
                        'label'                     => __('Type', 'bb-powerpack'),
                        'default'                   => 'none',
                        'options'                   => array(
                            'none'                      => __('None', 'bb-powerpack'),
                            'triangle'                  => __('Big Triangle', 'bb-powerpack'),
                            'triangle_left'             => __('Big Triangle Left', 'bb-powerpack'),
                            'triangle_right'            => __('Big Triangle Right', 'bb-powerpack'),
                            'triangle_small'            => __('Small Triangle', 'bb-powerpack'),
                            'tilt_left'                 => __('Tilt Left', 'bb-powerpack'),
                            'tilt_right'                => __('Tilt Right', 'bb-powerpack'),
                            'curve'                     => __('Curve', 'bb-powerpack'),
                            'wave'                      => __('Wave', 'bb-powerpack'),
                            'cloud'                     => __('Cloud', 'bb-powerpack'),
                            'slit'                      => __('Slit', 'bb-powerpack'),
                            'zigzag'                    => __('ZigZag', 'bb-powerpack'),
                        ),
                        'toggle'                    => array(
                            'triangle_shadow'           => array(
                                'fields'                    => array('separator_shadow')
                            )
                        )
                    ),
                    'separator_color'           => array(
                        'type'                      => 'color',
                        'label'                     => __('Color', 'bb-powerpack'),
                        'default'                   => 'ffffff',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-top svg',
                            'property'                  => 'fill'
                        )
                    ),
                    'separator_shadow'          => array(
                        'type'                      => 'color',
                        'label'                     => __('Shadow Color', 'bb-powerpack'),
                        'default'                   => 'f4f4f4',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-top svg .pp-shadow-color',
                            'property'                  => 'fill'
                        )
                    ),
                    'separator_height'          => array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => 100,
                        'size'                      => 5,
                        'maxlength'                 => 3,
                        'description'               => 'px',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-top svg',
                            'property'                  => 'height',
                            'unit'                      => 'px'
                        )
                    ),
                    'separator_position'        => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Position', 'bb-powerpack'),
                        'default'                   => 'top',
                        'options'                   => array(
                            'top'                       => __('Top', 'bb-powerpack'),
                            'bottom'                    => __('Bottom', 'bb-powerpack')
                        )
                    ),
                    'separator_tablet'          => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Show on Tablet', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'fields'                    => array('separator_height_tablet')
                            )
                        )
                    ),
                    'separator_height_tablet'   => array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => '',
                        'description'               => 'px',
                        'size'                      => 5,
                        'maxlength'                 => 3
                    ),
                    'separator_mobile'          => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Show on Mobile', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'fields'                    => array('separator_height_mobile')
                            )
                        )
                    ),
                    'separator_height_mobile'   => array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => '',
                        'description'               => 'px',
                        'size'                      => 5,
                        'maxlength'                 => 3
                    )
                )
            ),
            'separator_bottom'        => array(
                'title'                     => __('Bottom Separator', 'bb-powerpack'),
                'fields'                    => array(
                    'separator_type_bottom'     => array(
                        'type'                      => 'select',
                        'label'                     => __('Type', 'bb-powerpack'),
                        'default'                   => 'none',
                        'options'                   => array(
                            'none'                      => __('None', 'bb-powerpack'),
                            'triangle'                  => __('Big Triangle', 'bb-powerpack'),
                            'triangle_left'             => __('Big Triangle Left', 'bb-powerpack'),
                            'triangle_right'            => __('Big Triangle Right', 'bb-powerpack'),
                            'triangle_small'            => __('Small Triangle', 'bb-powerpack'),
                            'tilt_left'                 => __('Tilt Left', 'bb-powerpack'),
                            'tilt_right'                => __('Tilt Right', 'bb-powerpack'),
                            'curve'                     => __('Curve', 'bb-powerpack'),
                            'wave'                      => __('Wave', 'bb-powerpack'),
                            'cloud'                     => __('Cloud', 'bb-powerpack'),
                            'slit'                      => __('Slit', 'bb-powerpack'),
                            'zigzag'                    => __('ZigZag', 'bb-powerpack'),
                        ),
                        'toggle'                    => array(
                            'triangle_shadow'           => array(
                                'fields'                    => array('separator_shadow_bottom')
                            )
                        )
                    ),
                    'separator_color_bottom'           => array(
                        'type'                      => 'color',
                        'label'                     => __('Color', 'bb-powerpack'),
                        'default'                   => 'ffffff',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-bottom svg',
                            'property'                  => 'fill'
                        )
                    ),
                    'separator_shadow_bottom'          => array(
                        'type'                      => 'color',
                        'label'                     => __('Shadow Color', 'bb-powerpack'),
                        'default'                   => 'f4f4f4',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-bottom svg .pp-shadow-color',
                            'property'                  => 'fill'
                        )
                    ),
                    'separator_height_bottom'          => array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => 100,
                        'size'                      => 5,
                        'maxlength'                 => 3,
                        'description'               => 'px',
                        'preview'                   => array(
                            'type'                      => 'css',
                            'selector'                  => '.pp-row-separator-bottom svg',
                            'property'                  => 'height',
                            'unit'                      => 'px'
                        )
                    ),
                    'separator_tablet_bottom'   => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Show on Tablet', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'fields'                    => array('separator_height_tablet_bottom')
                            )
                        ),
                        'preview'                   => array(
                            'type'                      => 'none'
                        )
                    ),
                    'separator_height_tablet_bottom'=> array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => '',
                        'description'               => 'px',
                        'size'                      => 5,
                        'maxlength'                 => 3
                    ),
                    'separator_mobile_bottom'          => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Show on Mobile', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'fields'                    => array('separator_height_mobile_bottom')
                            )
                        ),
                        'preview'                   => array(
                            'type'                      => 'none'
                        )
                    ),
                    'separator_height_mobile_bottom'   => array(
                        'type'                      => 'text',
                        'label'                     => __('Size', 'bb-powerpack'),
                        'default'                   => '',
                        'description'               => 'px',
                        'size'                      => 5,
                        'maxlength'                 => 3
                    )
                )
            ),
        )
    );

    $form['tabs']['advanced'] = $advanced;

    return $form;
}

/** Down Arrow */
function pp_row_downarrow( $form, $id ) {

    if ( 'row' != $id ) {
        return $form;
    }

    $advanced = $form['tabs']['advanced'];
    unset($form['tabs']['advanced']);

    $form['tabs']['down_arrow'] = array(
        'title'                     => __('Down Arrow', 'bb-powerpack'),
        'sections'                  => array(
            'enable_down_arrow'         => array(
                'title'                     => '',
                'fields'                    => array(
                    'enable_down_arrow'         => array(
                        'type'                      => 'pp-switch',
                        'label'                     => __('Enable Down Arrow?', 'bb-powerpack'),
                        'default'                   => 'no',
                        'options'                   => array(
                            'yes'                       => __('Yes', 'bb-powerpack'),
                            'no'                        => __('No', 'bb-powerpack')
                        ),
                        'toggle'                    => array(
                            'yes'                       => array(
                                'sections'                  => array('da_style'),
                                'fields'                    => array('da_transition_speed', 'da_top_offset')
                            )
                        )
                    ),
                    'da_transition_speed'   => array(
                        'type'                  => 'text',
                        'label'                 => __('Transition Speed', 'bb-powerpack'),
                        'default'               => 500,
                        'description'           => 'ms',
                        'class'                 => 'input-small'
                    ),
                    'da_top_offset'         => array(
                        'type'                  => 'text',
                        'label'                 => __('Top Offset', 'bb-powerpack'),
                        'default'               => 0,
                        'description'           => 'ms',
                        'class'                 => 'input-small',
                        'help'                  => __('If your theme uses a sticky header, then please enter the header height in px (numbers only) to avoid overlapping of row content.', 'bb-powerpack')
                    ),
                )
            ),
            'da_style'      => array(
                'title'         => __('Style', 'bb-powerpack'),
                'fields'        => array(
                    'da_arrow_weight'   => array(
                        'type'              => 'pp-switch',
                        'label'             => __('Weight', 'bb-powerpack'),
                        'default'           => 'light',
                        'options'           => array(
                            'light'             => __('Light', 'bb-powerpack'),
                            'bold'              => __('Bold', 'bb-powerpack')
                        )
                    ),
                    'da_arrow_color'    => array(
                        'type'              => 'pp-color',
                        'label'             => __('Color', 'bb-powerpack'),
                        'default'           => array(
                            'primary'           => '000000',
                            'secondary'         => '000000',
                        ),
                        'options'           => array(
                            'primary'           => __('Default', 'bb-powerpack'),
                            'secondary'         => __('Hover', 'bb-powerpack'),
                        ),
                        'preview'           => array(
                            'type'              => 'css',
                            'rules'             => array(
                                array(
                                    'selector'          => '.pp-down-arrow-wrap .pp-down-arrow svg path',
                                    'property'          => 'stroke'
                                ),
                                array(
                                    'selector'          => '.pp-down-arrow-wrap .pp-down-arrow svg path',
                                    'property'          => 'fill'
                                )
                            )
                        )
                    ),
                    'da_arrow_bg'       => array(
                        'type'              => 'pp-color',
                        'label'             => __('Background Color', 'bb-powerpack'),
                        'default'           => array(
                            'primary'           => 'f4f4f4',
                            'secondary'         => 'f4f4f4',
                        ),
                        'options'           => array(
                            'primary'           => __('Default', 'bb-powerpack'),
                            'secondary'         => __('Hover', 'bb-powerpack'),
                        ),
                        'show_reset'        => true,
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-down-arrow-wrap .pp-down-arrow',
                            'property'          => 'background-color'
                        )
                    ),
                    'da_arrow_border'   => array(
                        'type'              => 'text',
                        'label'             => __('Border Width', 'bb-powerpack'),
                        'default'           => 0,
                        'description'       => 'px',
                        'class'             => 'input-small',
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-down-arrow-wrap .pp-down-arrow',
                            'property'          => 'border-width',
                            'unit'              => 'px'
                        )
                    ),
                    'da_arrow_border_color' => array(
                        'type'                  => 'pp-color',
                        'label'                 => __('Border Color', 'bb-powerpack'),
                        'default'               => array(
                            'primary'               => '000000',
                            'secondary'             => '000000',
                        ),
                        'options'               => array(
                            'primary'               => __('Default', 'bb-powerpack'),
                            'secondary'             => __('Hover', 'bb-powerpack'),
                        ),
                        'show_reset'            => true,
                        'preview'               => array(
                            'type'                  => 'css',
                            'selector'              => '.pp-down-arrow-wrap .pp-down-arrow',
                            'property'              => 'border-color'
                        )
                    ),
                    'da_arrow_padding'  => array(
                        'type'              => 'text',
                        'label'             => __('Padding', 'bb-powerpack'),
                        'default'           => 0,
                        'description'       => 'px',
                        'class'             => 'input-small',
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-down-arrow-wrap .pp-down-arrow',
                            'property'          => 'padding',
                            'unit'              => 'px'
                        )
                    ),
                    'da_arrow_margin'  => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 0,
                            'bottom'            => 30
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-down-arrow-container',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                )
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-down-arrow-wrap',
                                    'property'          => 'bottom',
                                    'unit'              => 'px'
                                )
                            )
                        )
                    ),
                    'da_arrow_radius'   => array(
                        'type'              => 'text',
                        'label'             => __('Round Corners', 'bb-powerpack'),
                        'default'           => 0,
                        'description'       => 'px',
                        'class'             => 'input-small',
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-down-arrow-wrap .pp-down-arrow',
                            'property'          => 'border-radius',
                            'unit'              => 'px'
                        )
                    ),
                )
            )
        )
    );

    $form['tabs']['advanced'] = $advanced;

    return $form;
}
