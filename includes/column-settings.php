<?php

function pp_column_register_settings( $extensions ) {

    if ( array_key_exists( 'corners', $extensions['col'] ) || in_array( 'corners', $extensions['col'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_column_round_corners', 10, 2 );
    }
    if ( array_key_exists( 'shadow', $extensions['col'] ) || in_array( 'shadow', $extensions['col'] ) ) {
        add_filter( 'fl_builder_register_settings_form', 'pp_column_shadow', 10, 2 );
    }
}

function pp_column_round_corners( $form, $id ) {

    if ( 'col' != $id ) {
        return $form;
    }

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

    return $form;
}

function pp_column_shadow( $form, $id ) {

    if ( 'col' != $id ) {
        return $form;
    }

    $advanced = $form['tabs']['advanced'];
    unset($form['tabs']['advanced']);

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

    return $form;
}
