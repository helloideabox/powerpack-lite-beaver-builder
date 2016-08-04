<?php

function pp_row_effects( $form, $id ) {
    if ( 'row' == $id ) {

        /** Gradient */
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

        /** Background overlay */
        $form['tabs']['style']['sections']['bg_overlay']['fields']['pp_bg_overlay_type'] = array(
            'type'      => 'select',
            'label'     => __('Overlay Type', 'bb-powerpack'),
            'default'   => 'full_width',
            'options'   => array(
                'full_width'    => __('Full Width', 'bb-powerpack'),
                'vertical_left' => __('Vertical Angled Left', 'bb-powerpack'),
                'vertical_right' => __('Vertical Angled Right', 'bb-powerpack')
            )
        );

        $form['tabs']['style']['sections']['border'] = $border_section;

        $advanced = $form['tabs']['advanced'];
        unset($form['tabs']['advanced']);

        /** Separator */
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
                            ),
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
                                'tilt_right'                => __('Tilt Right', 'bb-powerpack')
                            ),
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

        /** Expandable */

        $form['tabs']['expandable'] = array(
            'title'     => __('Expandable', 'bb-powerpack'),
            'sections'  => array(
                'enable_expandable' => array(
                    'title'             => '',
                    'fields'            => array(
                        'enable_expandable' => array(
                            'type'              => 'pp-switch',
                            'label'             => __('Expandable Row?', 'bb-powerpack'),
                            'default'           => 'no',
                            'options'           => array(
                                'yes'               => __('Yes', 'bb-powerpack'),
                                'no'                => __('No', 'bb-powerpack')
                            ),
                            'toggle'            => array(
                                'yes'               => array(
                                    'sections'          => array('er_settings', 'er_title_style', 'er_arrow', 'er_background'),
                                    'fields'            => array('er_title', 'er_transition_speed')
                                )
                            )
                        ),
                    )
                ),
                'er_settings' => array(
                    'title'             => __('Settings', 'bb-powerpack'),
                    'fields'            => array(
                        'er_title'     => array(
                            'type'          => 'text',
                            'label'         => __('Title on Collapse', 'bb-powerpack'),
                            'default'       => __('Click here to expand this row', 'bb-powerpack'),
                            'preview'         => array(
                                'type'             => 'text',
                                'selector'         => '.pp-er-title'
                            )
                        ),
                        'er_title_e'     => array(
                            'type'          => 'text',
                            'label'         => __('Title on Expand', 'bb-powerpack'),
                            'default'       => __('Click here to collapse this row', 'bb-powerpack')
                        ),
                        'er_transition_speed'   => array(
                            'type'                  => 'text',
                            'label'                 => __('Transition Speed', 'bb-powerpack'),
                            'default'               => 500,
                            'description'           => 'ms',
                            'class'                 => 'input-small'
                        ),
                    )
                ),
                'er_title_style'    => array(
                    'title'             => __('Title Style', 'bb-powerpack'),
                    'fields'            => array(
                        'er_title_font' => array(
                            'type'          => 'font',
                            'label'         => __('Font', 'bb-powerpack'),
                            'default'       => array(
                                'family'    => 'Default',
                                'weight'    => 400
                            ),
                            'preview'       => array(
                                'type'          => 'font',
                                'selector'      => '.pp-er-title'
                            )
                        ),
                        'er_title_font_size'    => array(
                            'type'                  => 'text',
                            'label'                 => __('Font Size', 'bb-powerpack'),
                            'default'               => 18,
                            'description'           => 'px',
                            'class'                 => 'input-small',
                            'preview'               => array(
                                'type'                  => 'css',
                                'selector'              => '.pp-er-title',
                                'property'              => 'font-size',
                                'unit'                  => 'px'
                            )
                        ),
                        'er_title_case' => array(
                            'type'          => 'select',
                            'label'         => __('Case', 'bb-powerpack'),
                            'default'       => 'default',
                            'options'       => array(
                                'none'          => __('Default', 'bb-powerpack'),
                                'lowercase'     => __('lowercase', 'bb-powerpack'),
                                'uppercase'     => __('UPPERCASE', 'bb-powerpack')
                            )
                        ),
                        'er_title_color'    => array(
                            'type'              => 'pp-color',
                            'label'             => __('Color', 'bb-powerpack'),
                            'options'           => array(
                                'primary'           => __('Default', 'bb-powerpack'),
                                'secondary'         => __('Hover', 'bb-powerpack'),
                            ),
                            'show_reset'        => true,
                            'preview'           => array(
                                'type'              => 'css',
                                'selector'          => '.pp-er-title',
                                'property'          => 'color'
                            )
                        ),
                        'er_title_margin'   => array(
                            'type'              => 'pp-multitext',
                            'label'             => __('Margin', 'bb-powerpack'),
                            'description'       => __('px', 'bb-powerpack'),
                            'default'           => array(
                                'bottom'            => 0,
                                'right'             => 0,
                            ),
                            'options'           => array(
                                'bottom'            => array(
                                    'placeholder'       => __('Bottom', 'bb-powerpack'),
                                    'maxlength'         => 3,
                                    'icon'              => 'fa-long-arrow-down',
                                    'tooltip'           => __('Bottom', 'bb-powerpack'),
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-title',
                                        'property'          => 'margin-bottom',
                                        'unit'              => 'px'
                                    ),
                                ),
                                'right'             => array(
                                    'placeholder'       => __('Right', 'bb-powerpack'),
                                    'maxlength'         => 3,
                                    'icon'              => 'fa-long-arrow-right',
                                    'tooltip'           => __('Right', 'bb-powerpack'),
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-title',
                                        'property'          => 'margin-right',
                                        'unit'              => 'px'
                                    ),
                                ),
                            )
                        ),
                    )
                ),
                'er_arrow' => array( // Section
                    'title'    => __('Arrow Style', 'bb-powerpack'), // Section Title
                    'fields'   => array( // Section Fields
                        'er_arrow_pos'  => array(
                            'type'          => 'pp-switch',
                            'label'         => __('Position', 'bb-powerpack'),
                            'default'       => 'bottom',
                            'options'       => array(
                                'bottom'        => __('Below Text', 'bb-powerpack'),
                                'right'         => __('Beside Text', 'bb-powerpack')
                            )
                        ),
                        'er_arrow_size' => array(
                            'type'          => 'text',
                            'label'         => __('Size', 'bb-powerpack'),
                            'default'       => 12,
                            'description'   => 'px',
                            'class'         => 'input-small',
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'      => '.pp-er-arrow',
                                'property'      => 'font-size',
                                'unit'          => 'px'
                            )
                        ),
                        'er_arrow_weight'   => array(
                            'type'              => 'pp-switch',
                            'label'             => __('Weight', 'bb-powerpack'),
                            'default'           => 'bold',
                            'options'           => array(
                                'light'             => __('Light', 'bb-powerpack'),
                                'bold'              => __('Bold', 'bb-powerpack')
                            )
                        ),
                        'er_arrow_color'    => array(
                            'type'              => 'pp-color',
                            'label'             => __('Color', 'bb-powerpack'),
                            'options'           => array(
                                'primary'           => __('Default', 'bb-powerpack'),
                                'secondary'         => __('Hover', 'bb-powerpack'),
                            ),
                            'show_reset'        => true,
                            'preview'           => array(
                                'type'              => 'css',
                                'selector'          => '.pp-er-arrow',
                                'property'          => 'color'
                            )
                        ),
                        'er_arrow_bg'       => array(
                            'type'              => 'pp-color',
                            'label'             => __('Background Color', 'bb-powerpack'),
                            'options'           => array(
                                'primary'           => __('Default', 'bb-powerpack'),
                                'secondary'         => __('Hover', 'bb-powerpack'),
                            ),
                            'show_reset'        => true,
                            'preview'           => array(
                                'type'              => 'css',
                                'selector'          => '.pp-er-arrow',
                                'property'          => 'background-color'
                            )
                        ),
                        'er_arrow_border'   => array(
                            'type'              => 'text',
                            'label'             => __('Border Width', 'bb-powerpack'),
                            'default'           => 0,
                            'description'       => 'px',
                            'class'             => 'input-small',
                            'preview'           => array(
                                'type'              => 'css',
                                'selector'          => '.pp-er-arrow:before',
                                'property'          => 'border-width',
                                'unit'              => 'px'
                            )
                        ),
                        'er_arrow_border_color' => array(
                            'type'                  => 'pp-color',
                            'label'                 => __('Border Color', 'bb-powerpack'),
                            'options'               => array(
                                'primary'               => __('Default', 'bb-powerpack'),
                                'secondary'             => __('Hover', 'bb-powerpack'),
                            ),
                            'show_reset'            => true,
                            'preview'               => array(
                                'type'                  => 'css',
                                'selector'              => '.pp-er-arrow:before',
                                'property'              => 'border-color'
                            )
                        ),
                        'er_arrow_padding_all'  => array(
                            'type'              => 'pp-multitext',
                            'label'             => __('Padding', 'bb-powerpack'),
                            'description'       => 'px',
                            'default'           => array(
                                'top'               => 0,
                                'bottom'            => 0,
                                'left'              => 0,
                                'right'             => 0
                            ),
                            'options'           => array(
                                'top'               => array(
                                    'placeholder'       => __('Top', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-up',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-arrow:before',
                                        'property'          => 'padding-top',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Top', 'bb-powerpack')
                                ),
                                'bottom'            => array(
                                    'placeholder'       => __('Bottom', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-down',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-arrow:before',
                                        'property'          => 'padding-bottom',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Bottom', 'bb-powerpack')
                                ),
                                'left'            => array(
                                    'placeholder'       => __('Left', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-left',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-arrow:before',
                                        'property'          => 'padding-left',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Left', 'bb-powerpack')
                                ),
                                'right'            => array(
                                    'placeholder'       => __('Right', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-right',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-arrow:before',
                                        'property'          => 'padding-right',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Right', 'bb-powerpack')
                                ),
                            )
                        ),
                        'er_arrow_radius'   => array(
                            'type'              => 'text',
                            'label'             => __('Round Corners', 'bb-powerpack'),
                            'default'           => 0,
                            'description'       => 'px',
                            'class'             => 'input-small',
                            'preview'           => array(
                                'type'              => 'css',
                                'selector'          => '.pp-er-arrow:before',
                                'property'          => 'border-radius',
                                'unit'              => 'px'
                            )
                        ),
                    )
                ),
                'er_background' => array( // Section
                    'title'         => __('Background & Padding', 'bb-powerpack'), // Section Title
                    'fields'        => array( // Section Fields
                        'er_bg_color'   => array(
                            'type'          => 'color',
                            'label'         => __('Color', 'bb-powerpack'),
                            'default'       => '',
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'      => '.pp-er-wrap',
                                'property'      => 'background-color'
                            )
                        ),
                        'er_bg_opacity' => array(
                            'type'          => 'text',
                            'label'         => __('Opacity', 'bb-powerpack'),
                            'default'       => 1,
                            'description'   => __('between 0 to 1', 'bb-powerpack'),
                            'class'         => 'input-small'
                        ),
                        'er_title_padding'   => array(
                            'type'              => 'pp-multitext',
                            'label'             => __('Padding', 'bb-powerpack'),
                            'default'           => array(
                                'top'               => 18,
                                'bottom'            => 18
                            ),
                            'options'           => array(
                                'top'               => array(
                                    'placeholder'       => __('Top', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-up',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-wrap',
                                        'property'          => 'padding-top',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Top', 'bb-powerpack')
                                ),
                                'bottom'            => array(
                                    'placeholder'       => __('Bottom', 'bb-powerpack'),
                                    'icon'              => 'fa-long-arrow-down',
                                    'preview'           => array(
                                        'selector'          => '.pp-er .pp-er-wrap',
                                        'property'          => 'padding-bottom',
                                        'unit'              => 'px'
                                    ),
                                    'tooltip'           => __('Bottom', 'bb-powerpack')
                                )
                            )
                        )
                    )
                )
            )
        );

        /** Down Arrow */
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
    }
    return $form;
}
add_filter( 'fl_builder_register_settings_form', 'pp_row_effects', 10, 2 );

function pp_row_separator_html( $type, $position, $color, $height, $shadow ) {
    ob_start();
    ?>
    <div class="pp-row-separator pp-row-separator-<?php echo $position; ?>">
        <?php switch($type): ?>
<?php case 'triangle': ?>
                <svg class="pp-big-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none">
                    <path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path>
                </svg>
            <?php break; ?>
            <?php case 'triangle_left': ?>
                <svg class="pp-big-triangle-left" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 2000 90" preserveAspectRatio="none">
                    <polygon xmlns="http://www.w3.org/2000/svg" points="535.084,64.886 0,0 0,90 2000,90 2000,0 "></polygon>
                </svg>
            <?php break; ?>
            <?php case 'triangle_right': ?>
                <svg class="pp-big-triangle-right" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 2000 90" preserveAspectRatio="none">
                    <polygon xmlns="http://www.w3.org/2000/svg" points="535.084,64.886 0,0 0,90 2000,90 2000,0 "></polygon>
                </svg>
            <?php break; ?>
            <?php case 'triangle_small': ?>
                <svg class="pp-small-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 0.156661 0.1">
                    <polygon points="0.156661,3.93701e-006 0.156661,0.000429134 0.117665,0.05 0.0783307,0.0999961 0.0389961,0.05 -0,0.000429134 -0,3.93701e-006 0.0783307,3.93701e-006 "></polygon>
                </svg>
            <?php break; ?>
            <?php case 'tilt_left': ?>
                <svg class="pp-tilt-left" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 4 0.266661" preserveAspectRatio="none">
					<polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "></polygon>
				</svg>
            <?php break; ?>
            <?php case 'tilt_right': ?>
                <svg class="pp-tilt-right" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#<?php echo $color; ?>" width="100%" height="<?php echo $height; ?>" viewBox="0 0 4 0.266661" preserveAspectRatio="none">
					<polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "></polygon>
				</svg>
            <?php break; ?>
            <?php default: ?>
        <?php endswitch; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Output for Rows
 */
function pp_output_before_row_bg( $row ) {

    if ( 'yes' == $row->settings->enable_separator && 'none' != $row->settings->separator_type ) {
        $type       = $row->settings->separator_type;
        $position   = 'top';
        $color      = $row->settings->separator_color;
        $height     = $row->settings->separator_height;
        $shadow     = 'triangle_shadow' == $type ? $row->settings->separator_shadow : '';
        echo pp_row_separator_html( $type, $position, $color, $height, $shadow );
    }

    if ( 'yes' == $row->settings->enable_separator && isset( $row->settings->separator_type_bottom ) && 'none' != $row->settings->separator_type_bottom ) {
        $type       = $row->settings->separator_type_bottom;
        $position   = 'bottom';
        $color      = $row->settings->separator_color_bottom;
        $height     = $row->settings->separator_height_bottom;
        $shadow     = 'triangle_shadow' == $type ? $row->settings->separator_shadow_bottom : '';
        echo pp_row_separator_html( $type, $position, $color, $height, $shadow );
    }
}
add_action( 'fl_builder_before_render_row_bg', 'pp_output_before_row_bg' );

/**
 * Output for Columns
 */
function pp_output_after_col_group( $groups, $cols ) {
    // Down arrow.
    $row = FLBuilderModel::get_node($groups->parent);
    if ( is_object($row) && 'yes' == $row->settings->enable_down_arrow ) {
        ?>
        <div class="pp-down-arrow-container">
            <div class="pp-down-arrow-wrap">
                <div class="pp-down-arrow" data-row-id="<?php echo $row->node; ?>" data-top-offset="<?php echo $row->settings->da_top_offset; ?>" data-transition-speed="<?php echo $row->settings->da_transition_speed; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg">
        				<path stroke="null" d="m1.00122,14.45485c0,-0.24438 0.10878,-0.48877 0.32411,-0.67587c0.4329,-0.37231 1.13663,-0.37231 1.56952,0l19.19382,16.50735l19.19381,-16.50735c0.4329,-0.37231 1.13663,-0.37231 1.56952,0s0.43289,0.97753 0,1.34983l-19.97969,17.18324c-0.43289,0.3723 -1.13662,0.3723 -1.56951,0l-19.97969,-17.18324c-0.21755,-0.1871 -0.32411,-0.43149 -0.32411,-0.67587l0.00222,0.00191z" fill="#000000" id="svg_1"/>
        			</svg>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action( 'fl_builder_after_render_column_group', 'pp_output_after_col_group', 1, 2 );

/**
 * CSS
 */
function pp_row_effects_css( $css, $nodes, $global_settings ) {
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
        <?php } ?>
        <?php if ( $row->settings->pp_bg_overlay_type == 'vertical_left' ) { ?>
            .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap:after {
                background-color: transparent !important;
                background: -webkit-linear-gradient( -170deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: -moz-linear-gradient( -170deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: -ms-linear-gradient( -170deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: linear-gradient( -100deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
            }
        <?php } ?>
        <?php if ( $row->settings->pp_bg_overlay_type == 'vertical_right' ) { ?>
            .fl-node-<?php echo $row->node; ?> > .fl-row-content-wrap:after {
                background-color: transparent !important;
                background: -webkit-linear-gradient( -10deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: -moz-linear-gradient( -10deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: -ms-linear-gradient( -10deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
                background: linear-gradient( 100deg, rgba(225, 255, 255, 0) 0%, rgba(225, 255, 255, 0) 54.96%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%, <?php echo pp_hex2rgba('#'.$row->settings->bg_overlay_color, $row->settings->bg_overlay_opacity / 100); ?> 55%);
            }
        <?php } ?>
        <?php if ( $row->settings->enable_expandable == 'yes' ) { ?>
            <?php if ( ! FLBuilderModel::is_builder_active() ) { ?>
            .fl-node-<?php echo $row->node; ?> .fl-row-content-wrap {
                display: none;
            }
            <?php } ?>
            .fl-node-<?php echo $row->node; ?> .pp-er {
                width: 100%;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-wrap {
                width: 100%;
                <?php echo $row->settings->er_bg_color ? 'background-color: ' . pp_hex2rgba('#'.$row->settings->er_bg_color, $row->settings->er_bg_opacity) : ''; ?>;
                padding-top: <?php echo $row->settings->er_title_padding['top']; ?>px;
                padding-bottom: <?php echo $row->settings->er_title_padding['bottom']; ?>px;
                cursor: pointer;
                -webkit-user-select: none;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-title-wrap {
                text-align: center;
                display: <?php echo $row->settings->er_arrow_pos != 'bottom' ? 'table' : 'block'; ?>;
                width: auto;
                margin: 0 auto;
            }
            <?php if ( $row->settings->er_arrow_pos != 'bottom' ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-title-wrap:before {
                content: "";
                display: inline-block;
                vertical-align: middle;
                height: 100%;
            }
            <?php } ?>
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-title {
                display: <?php echo $row->settings->er_arrow_pos == 'bottom' ? 'block' : 'inline-block'; ?>;
                color: <?php echo isset($row->settings->er_title_color['primary']) ? '#' . $row->settings->er_title_color['primary'] : 'inherit'; ?>;
                <?php if( $row->settings->er_title_font['family'] != 'Default' ) {
                    FLBuilderFonts::font_css( $row->settings->er_title_font );
                } ?>
                <?php echo is_numeric($row->settings->er_title_font_size) ? 'font-size: ' . $row->settings->er_title_font_size . 'px;' : ''; ?>
                margin-bottom: <?php echo $row->settings->er_arrow_pos == 'bottom' ? $row->settings->er_title_margin['bottom'] : 0; ?>px;
                margin-right: <?php echo $row->settings->er_arrow_pos != 'bottom' ? $row->settings->er_title_margin['right'] : 0; ?>px;
                text-transform: <?php echo $row->settings->er_title_case; ?>;
                vertical-align: middle;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-arrow {
                color: <?php echo isset($row->settings->er_arrow_color['primary']) ? '#' . $row->settings->er_arrow_color['primary'] : (isset($row->settings->er_title_color['primary']) ? '#' . $row->settings->er_title_color['primary'] : 'inherit'); ?>;
                display: <?php echo $row->settings->er_arrow_pos == 'bottom' ? 'block' : 'table-cell'; ?>;
                <?php echo is_numeric($row->settings->er_arrow_size) ? 'font-size: ' . $row->settings->er_arrow_size . 'px;' : ''; ?>
                vertical-align: middle;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-arrow:before {
                <?php echo isset($row->settings->er_arrow_bg['primary']) ? 'background-color: #' . $row->settings->er_arrow_bg['primary'] : ''; ?>;
                border: <?php echo $row->settings->er_arrow_border; ?>px solid <?php echo isset($row->settings->er_arrow_border_color['primary']) ? '#' . $row->settings->er_arrow_border_color['primary'] : 'transparent'; ?>;
                border-radius: <?php echo $row->settings->er_arrow_radius; ?>px;
                padding-top: <?php echo $row->settings->er_arrow_padding_all['top']; ?>px;
                padding-bottom: <?php echo $row->settings->er_arrow_padding_all['bottom']; ?>px;
                padding-left: <?php echo $row->settings->er_arrow_padding_all['left']; ?>px;
                padding-right: <?php echo $row->settings->er_arrow_padding_all['right']; ?>px;
                display: inline-block;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er-open .pp-er-arrow:before {
                <?php if ( $row->settings->er_arrow_weight == 'bold' ) { ?>
                content: "\f077";
                <?php } else { ?>
                content: "\f106";
                <?php } ?>
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-wrap:hover .pp-er-title {
                color: <?php echo isset($row->settings->er_title_color['secondary']) ? '#' . $row->settings->er_title_color['secondary'] : ''; ?>;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-wrap:hover .pp-er-arrow {
                color: <?php echo isset($row->settings->er_arrow_color['secondary']) ? '#' . $row->settings->er_arrow_color['secondary'] : (isset($row->settings->er_title_color['secondary']) ? '#' . $row->settings->er_title_color['secondary'] : 'inherit'); ?>;
            }
            .fl-node-<?php echo $row->node; ?> .pp-er .pp-er-wrap:hover .pp-er-arrow:before {
                <?php echo isset($row->settings->er_arrow_bg['secondary']) ? 'background-color: #' . $row->settings->er_arrow_bg['secondary'] : ''; ?>;
                border-color: <?php echo isset($row->settings->er_arrow_border_color['secondary']) ? '#' . $row->settings->er_arrow_border_color['secondary'] : 'transparent'; ?>;
            }
        <?php } ?>
        <?php if ( $row->settings->enable_down_arrow == 'yes' ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-container {
                margin-top: <?php echo $row->settings->da_arrow_margin['top']; ?>px;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap {
                text-align: center;
                position: absolute;
                width: 100%;
                left: 0;
                bottom: <?php echo $row->settings->da_arrow_margin['bottom']; ?>px;
                z-index: 1;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap .pp-down-arrow {
                display: inline-block;
                background-color: <?php echo '' != $row->settings->da_arrow_bg['primary'] ? '#'.$row->settings->da_arrow_bg['primary'] : 'transparent'; ?>;
                border: <?php echo $row->settings->da_arrow_border; ?>px solid <?php echo '#'.$row->settings->da_arrow_border_color['primary']; ?>;
                border-radius: <?php echo $row->settings->da_arrow_radius; ?>px;
                line-height: 0;
                cursor: pointer;
                padding: <?php echo $row->settings->da_arrow_padding; ?>px;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap .pp-down-arrow:hover {
                background-color: <?php echo '' != $row->settings->da_arrow_bg['secondary'] ? '#'.$row->settings->da_arrow_bg['secondary'] : 'transparent'; ?>;
                border-color: <?php echo '#'.$row->settings->da_arrow_border_color['secondary']; ?>;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap .pp-down-arrow svg {
                width: 45px;
	            height: 45px;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap .pp-down-arrow svg path {
                stroke: <?php echo '#'.$row->settings->da_arrow_color['primary']; ?>;
	            fill: <?php echo '#'.$row->settings->da_arrow_color['primary']; ?>;
	            stroke-width: <?php echo 'bold' == $row->settings->da_arrow_weight ? 2 : 0; ?>px;
            }
            .fl-node-<?php echo $row->node; ?> .pp-down-arrow-wrap .pp-down-arrow:hover svg path {
                stroke: <?php echo '#'.$row->settings->da_arrow_color['secondary']; ?>;
	            fill: <?php echo '#'.$row->settings->da_arrow_color['secondary']; ?>;
            }
        <?php } ?>
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
            <?php if ( 'triangle_left' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-big-triangle-left {
                <?php echo $scaleY; ?>
            }
            <?php } ?>
            <?php if ( 'triangle_right' == $row->settings->separator_type ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator-top svg.pp-big-triangle-right {
                <?php echo $scaleY; ?>
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

            <?php if ( 'triangle_right' == $row->settings->separator_type || 'triangle_right' == $row->settings->separator_type_bottom ) { ?>
            .fl-node-<?php echo $row->node; ?> .pp-row-separator svg.pp-big-triangle-right {
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
add_filter( 'fl_builder_render_css', 'pp_row_effects_css', 10, 3 );

function pp_row_effects_js( $js, $nodes, $global_settings ) {
    foreach ( $nodes['rows'] as $row ) {
        ob_start();
        if ( $row->settings->enable_expandable == 'yes' ) {
            ?>
            ;(function($) {
                var html = '<div class="pp-er pp-er-<?php echo $row->node; ?>"> <div class="pp-er-wrap"> <div class="pp-er-inner"> <div class="pp-er-title-wrap"> <?php if ( "" != $row->settings->er_title ) { ?> <span class="pp-er-title"><?php echo $row->settings->er_title; ?></span> <?php } ?> <span class="pp-er-arrow fa <?php echo $row->settings->er_arrow_weight == 'bold' ? 'fa-chevron-down' : 'fa-angle-down'; ?>"></span> </div> </div> </div> </div>';
                $('.fl-row.fl-node-<?php echo $row->node; ?>').prepend(html);
                <?php if ( ! FLBuilderModel::is_builder_active() ) { ?>
                $('.pp-er-<?php echo $row->node; ?> .pp-er-wrap').on('click', function() {
                    var $this = $(this);
                    $this.parent().addClass('pp-er-open');
                    $this.find('.pp-er-title').text('<?php echo $row->settings->er_title_e; ?>');
                    $(this).parents('.fl-row').find('.fl-row-content-wrap').slideToggle(<?php echo absint($row->settings->er_transition_speed); ?>, function() {
                        if(!$(this).is(':visible')) {
                            $this.parent().removeClass('pp-er-open');
                            $this.find('.pp-er-title').text('<?php echo $row->settings->er_title; ?>');
                        }
                    });
                });
                <?php } ?>
            })(jQuery);
            <?php
        }
        $js .= ob_get_clean();
    }
    ob_start();
    ?>
    /**
	 * Down Arrow
	 */
    ;(function($) {
    	$('.pp-down-arrow').on('click', function() {
    		var rowSelector = '.fl-node-' + $(this).data('row-id');
    		var nextRow		= $(rowSelector).next();
    		var topOffset	= ( '' === $(this).data('top-offset') ) ? 0 : $(this).data('top-offset');
            var adminBar    = $('body').hasClass('admin-bar') ? 32 : 0;
    		var trSpeed		= $(this).data('transition-speed');
    		$('html, body').animate({
    			scrollTop: nextRow.offset().top + topOffset + adminBar
    		}, trSpeed);
    	});
    })(jQuery);
    <?php
    $js .= ob_get_clean();
    return $js;
}
add_filter( 'fl_builder_render_js', 'pp_row_effects_js', 10, 3 );
