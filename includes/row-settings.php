<?php

function pp_row_register_settings( $extensions ) {

    if ( array_key_exists( 'gradient', $extensions['row'] ) || in_array( 'gradient', $extensions['row'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_row_gradient', 10, 2 );
    }
    if ( array_key_exists( 'separators', $extensions['row'] ) || in_array( 'separators', $extensions['row'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_row_separators', 10, 2 );
    }
}

/** Gradient */
function pp_row_gradient( $form, $id ) {

    if ( 'row' != $id ) {
        return $form;
    }

    $border_section = $form['tabs']['style']['sections']['border'];
    unset( $form['tabs']['style']['sections']['border'] );

    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['pp_gradient'] = __('Gradient', 'bb-powerpack');
    $form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['pp_gradient'] = array(
        'sections'  => array('pp_row_gradient')
    );
    $form['tabs']['style']['sections']['pp_row_gradient'] = array(
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
            ),
            'gradient_color'    => array(
                'type'      => 'pp-color',
                'label'     => __('Colors', 'bb-powerpack'),
                'show_reset'    => true,
                'default'   => array(
                    'primary'   => 'd81660',
                    'secondary' => '7d22bd',
                ),
                'options'   => array(
                    'primary'   => __('Primary', 'bb-powerpack'),
                    'secondary'   => __('Secondary', 'bb-powerpack'),
                ),
            ),
            'linear_direction'  => array(
                'type'      => 'select',
                'label'     => __('Gradient Direction', 'bb-powerpack'),
                'default'   => 'bottom',
                'options'   => array(
                    'bottom' => __('Top to Bottom', 'bb-powerpack'),
                    'right' => __('Left to Right', 'bb-powerpack'),
                    'top_right_diagonal' => __('Bottom Left to Top Right', 'bb-powerpack'),
                    'top_left_diagonal' => __('Bottom Right to Top Left', 'bb-powerpack'),
                    'bottom_right_diagonal' => __('Top Left to Bottom Right', 'bb-powerpack'),
                    'bottom_left_diagonal' => __('Top Right to Bottom Left', 'bb-powerpack'),
                ),
            ),
        )
    );

    $form['tabs']['style']['sections']['border'] = $border_section;

    return $form;
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
