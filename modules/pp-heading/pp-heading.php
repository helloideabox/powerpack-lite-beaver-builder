<?php

/**
 * @class PPHeadingModule
 */
class PPHeadingModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Smart Headings', 'bb-powerpack'),
            'description'   => __('A module for Smart Headings.', 'bb-powerpack'),
            'group'         => pp_get_modules_group(),
            'category'		=> pp_get_modules_cat( 'content' ),
            'dir'           => BB_POWERPACK_DIR . 'modules/pp-heading/',
            'url'           => BB_POWERPACK_URL . 'modules/pp-heading/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'partial_refresh' => true,
            'icon'				=> 'text.svg',
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('PPHeadingModule', array(
    'heading_info_tab'       => array( // Tab
        'title'         => __('General', 'bb-powerpack'), // Tab title
        'sections'      => array( // Tab Sections
            'heading_section'       => array( // Section
                'title'        => __('Heading', 'bb-powerpack'), // Section Title
                'fields'       => array( // Section Fields
                    'dual_heading'  => array(
                        'type'          => 'pp-switch',
                        'label'         => __('Dual Heading?', 'bb-powerpack'),
                        'default'       => 'no',
                        'options'       => array(
                            'yes'           => __('Yes', 'bb-powerpack'),
                            'no'            => __('No', 'bb-powerpack')
                        ),
                        'toggle'        => array(
                            'yes'           => array(
                                'sections'      => array('title2_typography', 'heading2_style'),
                                'fields'        => array('heading_title2', 'heading_style', 'heading2_tablet_font_size', 'heading2_tablet_line_height_n', 'heading2_mobile_font_size', 'heading2_mobile_line_height_n')
                            )
                        ),
                        'help'  => __('This option allows you to create dual color heading or dual font heading.', 'bb-powerpack')
                    ),
                    'heading_title'   => array(
                        'type'          => 'text',
                        'label'         => __('Title', 'bb-powerpack'),
                        'class'         => '',
                        'default'       => __('Title', 'bb-powerpack'),
                        'connections'   => array( 'string', 'html', 'url' ),
                        'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                        )
                    ),
                    'heading_title2'   => array(
                        'type'          => 'text',
                        'label'         => __('Secondary Title', 'bb-powerpack'),
                        'class'         => '',
                        'default'       => __('Secondary Title', 'bb-powerpack'),
                        'connections'   => array( 'string', 'html', 'url' ),
                        'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                        )
                    ),
                    'heading_style'     => array(
                        'type'              => 'pp-switch',
                        'label'             => __('Style', 'bb-powerpack'),
                        'default'           => 'inline-block',
                        'options'           => array(
                            'inline-block'      => __('Inline', 'bb-powerpack'),
                            'block'             => __('Stacked', 'bb-powerpack')
                        ),
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-heading-content .pp-heading .heading-title span.title-text',
                            'property'          => 'display'
                        )
                    ),
                    'enable_link'   => array(
                        'type'          => 'pp-switch',
                        'label'         => __('Enable Link', 'bb-powerpack'),
                        'default'       => 'yes',
                        'options'       => array(
                            'yes'           => __('Yes', 'bb-powerpack'),
                            'no'            => __('No', 'bb-powerpack')
                        ),
                        'toggle'        => array(
                            'yes'           => array(
                                'fields'        => array('heading_link', 'heading_link_target')
                            )
                        )
                    ),
 				    'heading_link'          => array(
 						'type'          => 'link',
 						'label'         => __('Link', 'bb-powerpack'),
                        'connections'   => array( 'url' ),
 						'preview'         => array(
 							'type'            => 'none'
 						)
 					),
 					'heading_link_target'   => array(
 						'type'          => 'select',
 						'label'         => __('Link Target', 'bb-powerpack'),
 						'default'       => '_self',
 						'options'       => array(
 							'_self'         => __('Same Window', 'bb-powerpack'),
 							'_blank'        => __('New Window', 'bb-powerpack')
 						),
 						'preview'         => array(
 							'type'            => 'none'
 						)
 					),
					'heading_tag'    => array(
                        'type'          => 'select',
                        'label'         => __('Tag', 'bb-powerpack'),
                        'default'       => 'h2',
                        'options'       => array(
                            'h1'            => 'H1',
                            'h2'            => 'H2',
                            'h3'            => 'H3',
                            'h4'            => 'H4',
                            'h5'            => 'H5',
                            'h6'            => 'H6',
                        )
                    ),
                    'heading_alignment'     => array(
                       'type'                   => 'pp-switch',
                       'label'                  => __('Alignment', 'bb-powerpack'),
                       'default'                => 'center',
                       'options'                => array(
                            'left'                  => __('Left', 'bb-powerpack'),
                            'center'                => __('Center', 'bb-powerpack'),
                            'right'                 => __('Right', 'bb-powerpack'),
                        )
                   ),
                )
            ),
            'heading_sub_title'         => array(
                'title'                     => __('Description', 'bb-powerpack'),
                'fields'                    => array(
                    'heading_sub_title'     => array(
                        'type'                  => 'editor',
                        'label'                 => '',
                        'default'               => __('Description', 'bb-powerpack'),
                        'rows'                  => '6',
                        'media_buttons'         => false,
                        'connections'            => array( 'string', 'html', 'url' ),
                        'preview'               => array(
                            'type'                  => 'text',
                            'selector'              => '.pp-heading-content .pp-sub-heading'
                        )
                    ),
                )
            ),
        )
    ),
    'heading_separator'         => array(
        'title'                     => __('Separator', 'bb-powerpack'),
        'sections'                  => array(
            'heading_separator'     => array(
                'title'                     => '',
                'fields'                    => array(
                    'heading_separator'     => array(
                        'type'      => 'select',
                        'label'     => __('Separator', 'bb-powerpack'),
                        'default'     => 'left',
                        'options'       => array(
                            'no_spacer'          => __('No Separator', 'bb-powerpack'),
                            'inline'          => __('Inline', 'bb-powerpack'),
                            'line_only'          => __('Line', 'bb-powerpack'),
                            'icon_only'          => __('Icon/Image', 'bb-powerpack'),
                            'line_with_icon'     => __('Line With Icon/Image', 'bb-powerpack'),
                        ),
                        'toggle' => array(
                             'inline'        => array(
                                 'fields'  => array('heading_line_style', 'font_title_line_space'),
                                 'sections' => array('heading_line_style_section'),
                             ),
                             'line_only'      => array(
                                 'fields'  => array('heading_line_style', 'heading_separator_postion'),
                                 'sections' => array('heading_line_style_section', 'heading_separator_style_section'),
                             ),
                             'icon_only'      => array(
                                 'fields'  => array('heading_separator_postion', 'font_icon_color'),
                                 'sections'  => array('heading_separator_style_section', 'heading_icon_image_style_section', 'heading_icon_image_settings'),
                             ),
                             'line_with_icon'      => array(
                                 'fields'  => array('heading_line_style', 'font_icon_line_space', 'heading_separator_postion', 'font_icon_color'),
                                 'sections' => array('heading_line_style_section', 'heading_separator_style_section', 'heading_icon_image_style_section', 'heading_icon_image_settings')
                             ),
                             'no_spacer' => array(
                                 'fields' => array(),
                                 'sections' => array(),
                             )
                         )
                     ),
                     'heading_separator_postion' => array(
                         'type'      => 'select',
                         'label'     => __('Position', 'bb-powerpack'),
                         'default'     => 'middle',
                         'options'       => array(
                            'top'            => __('Above Heading', 'bb-powerpack'),
                            'middle'         => __('Below Heading', 'bb-powerpack'),
                            'bottom'         => __('Below Description', 'bb-powerpack'),
                          )
                     ),
                     'heading_line_style'     => array(
                         'type'      => 'pp-switch',
                         'label'     => __('Line Style', 'bb-powerpack'),
                         'default'     => 'solid',
                         'options'       => array(
                              'solid'          => __('Solid', 'bb-powerpack'),
                              'dashed'         => __('Dashed', 'bb-powerpack'),
                              'dotted'         => __('Dotted', 'bb-powerpack'),
                              'double'         => __('Double', 'bb-powerpack'),
                          )
                     ),
                     'font_title_line_space'   => array(
                         'type'          => 'text',
                         'label'         => __('Space between Line & Title', 'bb-powerpack'),
                         'description'   => 'px',
                         'class'         => 'bb-heading-input input-small',
                         'default'       => '20',
                         'preview'       => array(
                             'type'      => 'css',
                             'rules'           => array(
                                array(
                                    'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span',
                                    'property'        => 'padding-left',
                                    'unit'            => 'px',
                                ),
                                array(
                                    'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span',
                                    'property'        => 'padding-right',
                                    'unit'            => 'px',
                                ),
                            ),
                         )
                     ),
                )
            ),
            'heading_icon_image_settings'       => array( // Section
                'title'        => __('Icon', 'bb-powerpack'), // Section Title
                'fields'       => array( // Section Fields
                    'heading_icon_select'       => array(
                        'type'          => 'select',
						'label'         => __('Icon Source', 'bb-powerpack'),
                        'default'       => 'font_icon_select',
						'options'       => array(
							'font_icon_select'         => __('Icon Library', 'bb-powerpack'),
							'custom_icon_select'       => __('Custom Image', 'bb-powerpack')
						),
                        'toggle' => array(
                            'font_icon_select'    => array(
                                'fields'   => array('heading_font_icon_select', 'font_icon_color'),
                            ),
                            'custom_icon_select'   => array(
                                'fields'  => array('heading_custom_icon_select'),
                            ),
                        )
					),
                    'heading_font_icon_select' => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'bb-powerpack')
					),
                    'heading_custom_icon_select'     => array(
                        'type'              => 'photo',
                        'label'         => __('Custom Image', 'bb-powerpack'),
                        'default'       => '',
                    ),
                    'font_icon_line_space'   => array(
                        'type'          => 'text',
                        'label'         => __('Space between Line & Icon/Image', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '20',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:before',
                                   'property'        => 'margin-right',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:after',
                                   'property'        => 'margin-left',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                )
            ),
            'heading_line_style_section'    => array( // Section
                'title'             => __('Separator Size & Color', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
					'line_width'   => array(
                        'type'          => 'text',
                        'label'         => __('Width', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '100',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-separator-line',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:after',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:before',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:before',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:after',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'line_height'       => array(
                        'type'          => 'text',
                        'label'         => __('Height', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '1',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:before',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:after',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-separator-line',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:before',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:after',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'line_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:before',
                                   'property'        => 'border-color',
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon:after',
                                   'property'        => 'border-color',
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-separator-line',
                                   'property'        => 'border-bottom-color',
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:before',
                                   'property'        => 'border-color',
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading.pp-separator-inline .heading-title span:after',
                                   'property'        => 'border-color',
                               ),
                           ),
                        )
                    ),
                )
            ),
            'heading_icon_image_style_section'    => array( // Section
                'title'             => __('Icon/Image Style', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
                    'font_icon_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Icon Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '16',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon i, .pp-heading-content .pp-heading-separator .pp-heading-separator-icon i:before',
                                   'property'        => 'font-size',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator img.heading-icon-image',
                                   'property'        => 'width',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading-separator',
                            'property'        => 'color'
                        )
                    ),
                    'font_icon_bg_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'background-color',
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'background-color',
                               ),
                           ),
                        )
                    ),
                    'field_separator_5'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'font_icon_border_width'   => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'border-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'border-width',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_border_style'     => array(
                        'type'      => 'select',
                        'label'     => __('Border Style', 'bb-powerpack'),
                        'default'     => 'none',
                        'options'       => array(
                             'none'          => __('None', 'bb-powerpack'),
                             'solid'          => __('Solid', 'bb-powerpack'),
                             'dashed'          => __('Dashed', 'bb-powerpack'),
                             'dotted'          => __('Dotted', 'bb-powerpack'),
                             'double'          => __('Double', 'bb-powerpack'),
                         )
                    ),
                    'font_icon_border_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'border-color',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'border-color',
                               ),
                           ),
                        )
                    ),
                    'font_icon_border_radius'   => array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '100',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'border-radius',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'border-radius',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only img',
                                   'property'        => 'border-radius',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.line_with_icon img',
                                   'property'        => 'border-radius',
                                   'unit'            => 'px'
                               )
                           ),
                        )
                    ),
                    'field_separator_6'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'font_icon_padding_top'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Top', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'padding-top',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'padding-top',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_padding_bottom'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Bottom', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'padding-bottom',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'padding-bottom',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_padding_left'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Left', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'padding-left',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'padding-left',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_padding_right'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Right', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator .pp-heading-separator-icon',
                                   'property'        => 'padding-right',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-heading-content .pp-heading-separator.icon_only span',
                                   'property'        => 'padding-right',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                )
            ),
            'heading_separator_style_section'    => array( // Section
                'title'             => __('Margin', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
                    'separator_heading_top_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Top Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '10',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading-separator',
                            'property'  => 'margin-top',
                            'unit'      => 'px'
                        )
                    ),
                    'separator_heading_bottom_margin' => array(
                        'type'          => 'text',
                        'label'         => __('Bottom Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '10',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading-separator',
                            'property'  => 'margin-bottom',
                            'unit'      => 'px'
                        )
                    ),
                )
            ),
        )
    ),
    'heading_style_tab'       => array( // Tab
        'title'         => __('Style', 'bb-powerpack'), // Tab title
        'sections'      => array( // Tab Sections
            'main_heading_style'       => array( // Section
                'title'         => __('Title', 'bb-powerpack'), // Section Title
                'fields'        => array( // Section Fields
                    'heading_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'show_alpha'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                            'property'        => 'color'
                        )
                    ),
                    'heading_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'show_alpha'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                            'property'        => 'background-color'
                        )
                    ),
                    'field_separator_1'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'heading_border_style'  => array(
                        'type'                  => 'select',
                        'label'                 => __('Border Style', 'bb-powerpack'),
                        'default'               => 'none',
                        'options'               => array(
                            'none'                => __('None', 'bb-powerpack'),
                            'dashed'                => __('Dashed', 'bb-powerpack'),
                            'dotted'                => __('Dotted', 'bb-powerpack'),
                            'double'                => __('Double', 'bb-powerpack'),
                            'solid'                 => __('Solid', 'bb-powerpack'),
                        ),
                        'preview'               => array(
                            'type'                  => 'css',
                            'rules'                 => array(
                                array(
                                    'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'              => 'border-top-style',
                                    'unit'                  => 'px'
                                ),
                                array(
                                    'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'              => 'border-bottom-style',
                                    'unit'                  => 'px'
                                ),
                                array(
                                    'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'              => 'border-left-style',
                                    'unit'                  => 'px'
                                ),
                                array(
                                    'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'              => 'border-right-style',
                                    'unit'                  => 'px'
                                )
                            )
                        )
                    ),
                    'heading_border'   => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Border Width', 'bb-powerpack'),
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
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'border-top-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Top', 'bb-powerpack')
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'border-bottom-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Bottom', 'bb-powerpack')
                            ),
                            'left'            => array(
                                'placeholder'       => __('Left', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-left',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'border-left-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Left', 'bb-powerpack')
                            ),
                            'right'            => array(
                                'placeholder'       => __('Right', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-right',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'border-right-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Right', 'bb-powerpack')
                            ),
                        )
                    ),
                    'heading_border_color' => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                            'property'        => 'border-color'
                        )
                    ),
                    'field_separator_2'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'heading_padding'   => array(
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
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'padding-top',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Top', 'bb-powerpack')
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'padding-bottom',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Bottom', 'bb-powerpack')
                            ),
                            'left'            => array(
                                'placeholder'       => __('Left', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-left',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'padding-left',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Left', 'bb-powerpack')
                            ),
                            'right'            => array(
                                'placeholder'       => __('Right', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-right',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
                                    'property'          => 'padding-right',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Right', 'bb-powerpack')
                            ),
                        )
                    ),
                    'heading_top_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Top Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '10',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title',
                            'property'  => 'margin-top',
                            'unit'      => 'px'
                        )
                    ),
                    'heading_bottom_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Bottom Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '10',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title',
                            'property'  => 'margin-bottom',
                            'unit'      => 'px'
                        )
					),
					'heading_show_shadow'	=> array(
						'type'                 => 'pp-switch',
                        'label'                => __( 'Enable Text Shadow', 'bb-powerpack' ),
                        'default'              => 'no',
                        'options'              => array(
                            'yes'          	=> __( 'Yes', 'bb-powerpack' ),
                            'no'            => __( 'No', 'bb-powerpack' ),
                        ),
                        'toggle'    =>  array(
                            'yes'   => array(
                                'fields'    => array( 'heading_shadow', 'heading_shadow_color' ),
							),
                        ),
					),
					'heading_shadow' 		=> array(
						'type'              => 'pp-multitext',
						'label'             => __( 'Text Shadow', 'bb-powerpack' ),
						'default'           => array(
							'vertical'			=> 2,
							'horizontal'		=> 2,
							'blur'				=> 0,
						),
						'options'			=> array(
							'horizontal'		=> array(
								'placeholder'		=> __('Horizontal', 'bb-powerpack'),
								'tooltip'			=> __('Horizontal', 'bb-powerpack'),
								'icon'				=> 'fa-arrows-h'
							),
							'vertical'			=> array(
								'placeholder'		=> __('Vertical', 'bb-powerpack'),
								'tooltip'			=> __('Vertical', 'bb-powerpack'),
								'icon'				=> 'fa-arrows-v'
							),
							'blur'				=> array(
								'placeholder'		=> __('Blur', 'bb-powerpack'),
								'tooltip'			=> __('Blur', 'bb-powerpack'),
								'icon'				=> 'fa-circle-o'
							),
						)
					),
					'heading_shadow_color' => array(
                        'type'              => 'color',
                        'label'             => __( 'Shadow Color', 'bb-powerpack' ),
                        'default'           => 'rgba(0,0,0,0.3)',
						'show_alpha'		=> true
					),
					'heading_gradient'	=> array(
						'type'                 => 'pp-switch',
                        'label'                => __( 'Enable Gradient Text', 'bb-powerpack' ),
                        'default'              => 'no',
                        'options'              => array(
                            'yes'          	=> __( 'Yes', 'bb-powerpack' ),
                            'no'            => __( 'No', 'bb-powerpack' ),
                        ),
                        'toggle'    =>  array(
                            'yes'   => array(
                                'fields'    => array( 'heading_gradient_primary_color', 'heading_gradient_secondary_color', 'heading_gradient_degree' ),
							),
                        ),
					),
					'heading_gradient_primary_color'	=> array(
						'type'          		=> 'color',
						'label'         		=> __( 'Primary Color', 'bb-powerpack' ),
						'default'       		=> '',
						'show_reset'    		=> true,
						'show_alpha'			=> true,
					),
					'heading_gradient_secondary_color'	=> array(
						'type'			=> 'color',
						'label'     	=> __( 'Secondary Color', 'bb-powerpack' ),
						'default'		=> '',
						'show_reset' 	=> true,
						'show_alpha'	=> true,
					),
					'heading_gradient_degree'	=> array(
						'type'			=> 'text',
						'label'			=> __('Degree', 'bb-powerpack'),
						'default'		=> '-90',
						'placeholder'	=> '-90',
						'size'			=> '5'
					)
                ),
            ),
            'heading2_style'       => array( // Section
                'title'         => __('Secondary Title', 'bb-powerpack'), // Section Title
                'fields'        => array( // Section Fields
                    'heading2_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'show_alpha'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading span.pp-secondary-title',
                            'property'        => 'color'
                        )
                    ),
                    'heading2_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __('Background Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'show_alpha'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading span.pp-secondary-title',
                            'property'        => 'background-color'
                        )
                    ),
                    'field_separator_3'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'heading2_border_style'  => array(
                        'type'                  => 'select',
                        'label'                 => __('Border Style', 'bb-powerpack'),
                        'default'               => 'none',
                        'options'               => array(
                            'none'                => __('None', 'bb-powerpack'),
                            'dashed'                => __('Dashed', 'bb-powerpack'),
                            'dotted'                => __('Dotted', 'bb-powerpack'),
                            'double'                => __('Double', 'bb-powerpack'),
                            'solid'                 => __('Solid', 'bb-powerpack'),
                        ),
                    ),
                    'heading2_border'   => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Border Width', 'bb-powerpack'),
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
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'border-top-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Top', 'bb-powerpack')
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'border-bottom-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Bottom', 'bb-powerpack')
                            ),
                            'left'            => array(
                                'placeholder'       => __('Left', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-left',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'border-left-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Left', 'bb-powerpack')
                            ),
                            'right'            => array(
                                'placeholder'       => __('Right', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-right',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'border-right-width',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Right', 'bb-powerpack')
                            ),
                        )
                    ),
                    'heading2_border_color' => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                            'property'        => 'border-color'
                        )
                    ),
                    'field_separator_4'  => array(
                        'type'                => 'pp-separator',
                        'color'               => 'eeeeee'
                    ),
                    'heading2_padding'   => array(
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
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'padding-top',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Top', 'bb-powerpack')
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'padding-bottom',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Bottom', 'bb-powerpack')
                            ),
                            'left'            => array(
                                'placeholder'       => __('Left', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-left',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'padding-left',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Left', 'bb-powerpack')
                            ),
                            'right'            => array(
                                'placeholder'       => __('Right', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-right',
                                'preview'           => array(
                                    'selector'          => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                                    'property'          => 'padding-right',
                                    'unit'              => 'px'
                                ),
                                'tooltip'           => __('Right', 'bb-powerpack')
                            ),
                        )
                    ),
                    'heading2_left_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Margin Left', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
                            'property'  => 'margin-left',
                            'unit'      => 'px'
                        )
					),
					'heading2_show_shadow'	=> array(
						'type'                 => 'pp-switch',
                        'label'                => __( 'Enable Text Shadow', 'bb-powerpack' ),
                        'default'              => 'no',
                        'options'              => array(
                            'yes'          	=> __( 'Yes', 'bb-powerpack' ),
                            'no'            => __( 'No', 'bb-powerpack' ),
                        ),
                        'toggle'    =>  array(
                            'yes'   => array(
                                'fields'    => array( 'heading2_shadow', 'heading2_shadow_color' ),
							),
                        ),
					),
					'heading2_shadow' 		=> array(
						'type'              => 'pp-multitext',
						'label'             => __( 'Text Shadow', 'bb-powerpack' ),
						'default'           => array(
							'vertical'			=> 2,
							'horizontal'		=> 2,
							'blur'				=> 0,
						),
						'options'			=> array(
							'horizontal'		=> array(
								'placeholder'		=> __('Horizontal', 'bb-powerpack'),
								'tooltip'			=> __('Horizontal', 'bb-powerpack'),
								'icon'				=> 'fa-arrows-h'
							),
							'vertical'			=> array(
								'placeholder'		=> __('Vertical', 'bb-powerpack'),
								'tooltip'			=> __('Vertical', 'bb-powerpack'),
								'icon'				=> 'fa-arrows-v'
							),
							'blur'				=> array(
								'placeholder'		=> __('Blur', 'bb-powerpack'),
								'tooltip'			=> __('Blur', 'bb-powerpack'),
								'icon'				=> 'fa-circle-o'
							),
						)
					),
					'heading2_shadow_color' => array(
                        'type'              => 'color',
                        'label'             => __( 'Shadow Color', 'bb-powerpack' ),
						'default'           => 'rgba(0,0,0,0.3)',
						'show_alpha'		=> true
					),
					'heading2_gradient'	=> array(
						'type'                 => 'pp-switch',
                        'label'                => __( 'Enable Gradient Text', 'bb-powerpack' ),
                        'default'              => 'no',
                        'options'              => array(
                            'yes'          	=> __( 'Yes', 'bb-powerpack' ),
                            'no'            => __( 'No', 'bb-powerpack' ),
                        ),
                        'toggle'    =>  array(
                            'yes'   => array(
                                'fields'    => array( 'heading2_gradient_primary_color', 'heading2_gradient_secondary_color', 'heading2_gradient_degree' ),
							),
                        ),
					),
					'heading2_gradient_primary_color'	=> array(
						'type'          		=> 'color',
						'label'         		=> __( 'Primary Color', 'bb-powerpack' ),
						'default'       		=> '',
						'show_reset'    		=> true,
						'show_alpha'			=> true,
					),
					'heading2_gradient_secondary_color'	=> array(
						'type'			=> 'color',
						'label'     	=> __( 'Secondary Color', 'bb-powerpack' ),
						'default'		=> '',
						'show_reset' 	=> true,
						'show_alpha'	=> true,
					),
					'heading2_gradient_degree'	=> array(
						'type'			=> 'text',
						'label'			=> __('Degree', 'bb-powerpack'),
						'default'		=> '-90',
						'placeholder'	=> '-90',
						'size'			=> '5'
					)
                )
            ),
            'sub_heading_style'       => array( // Section
                'title'         => __('Description', 'bb-powerpack'), // Section Title
                'fields'        => array( // Section Fields
                    'sub_heading_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.pp-heading-content .pp-sub-heading',
                            'property'        => 'color'
                        )
                    ),
                    'sub_heading_top_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Top Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-sub-heading',
                            'property'  => 'margin-top',
                            'unit'      => 'px'
                        )
                    ),
                    'sub_heading_bottom_margin'   => array(
                        'type'          => 'text',
                        'label'         => __('Bottom Margin', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-sub-heading',
                            'property'  => 'margin-bottom',
                            'unit'      => 'px'
                        )
                    ),
                )
            ),
        )
    ),
    'heading_typography'    => array(
        'title'                 => __('Typography', 'bb-powerpack'),
        'sections'              => array(
            'title_typography'      => array(
                'title'                 => __('Title', 'bb-powerpack'),
                'fields'                => array(
                    'heading_font' => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title'
                        )
                    ),
                    'heading_font_size_select'     => array(
						'type'          => 'pp-switch',
						'label'         => __('Font Size', 'bb-powerpack'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'bb-powerpack'),
							'custom'        =>  __('Custom', 'bb-powerpack')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('heading_font_size')
							)
						)
					),
					'heading_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Custom Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '20',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
					),
                    'heading_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '1.4',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading .heading-title',
                            'property'  => 'line-height',
                        )
                    ),
                    'heading_letter_space'  => array(
						'type'                  => 'text',
						'label'                 => __('Letter Spacing', 'bb-powerpack'),
						'description'           => 'px',
						'class'                 => 'bb-heading-input input-small',
						'default'               => '',
						'preview'               => array(
							'type'                  => 'css',
							'selector'              => '.pp-heading-content .pp-heading .heading-title',
							'property'              => 'letter-spacing',
							'unit'                  => 'px'
                       	)
					),
					'heading_text_transform'     => array(
						'type'          => 'select',
						'label'         => __('Text Transform', 'bb-powerpack'),
						'default'       => 'default',
						'options'       => array(
							'default'       	=>  __('Default', 'bb-powerpack'),
							'lowercase'        	=>  __('lowercase', 'bb-powerpack'),
							'uppercase'        	=>  __('UPPERCASE', 'bb-powerpack')
						),
						'preview'               => array(
							'type'                  => 'css',
							'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-primary-title',
							'property'              => 'text-transform',
                       	)
					),
                )
            ),
            'title2_typography'      => array(
                'title'                 => __('Secondary Title', 'bb-powerpack'),
                'fields'                => array(
                    'heading2_font' => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title'
                        )
                    ),
                    'heading2_font_size_select'     => array(
						'type'          => 'pp-switch',
						'label'         => __('Font Size', 'bb-powerpack'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'bb-powerpack'),
							'custom'        =>  __('Custom', 'bb-powerpack')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('heading2_font_size')
							)
						)
					),
					'heading2_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Custom Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '20',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading span.pp-secondary-title',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
					),
                    'heading2_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '1.4',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-heading span.pp-secondary-title',
                            'property'  => 'line-height',
                        )
                    ),
                    'heading2_letter_space'  => array(
						'type'                  => 'text',
						'label'                 => __('Letter Spacing', 'bb-powerpack'),
						'description'           => 'px',
						'class'                 => 'bb-heading-input input-small',
						'default'               => '',
						'preview'               => array(
							'type'                  => 'css',
							'selector'              => '.pp-heading-content .pp-heading span.pp-secondary-title',
							'property'              => 'letter-spacing',
							'unit'                  => 'px'
						)
					),
					'heading2_text_transform'     => array(
						'type'          => 'select',
						'label'         => __('Text Transform', 'bb-powerpack'),
						'default'       => 'default',
						'options'       => array(
							'default'       	=>  __('Default', 'bb-powerpack'),
							'none'       		=>  __('None', 'bb-powerpack'),
							'lowercase'        	=>  __('lowercase', 'bb-powerpack'),
							'uppercase'        	=>  __('UPPERCASE', 'bb-powerpack')
						),
						'preview'               => array(
							'type'                  => 'css',
							'selector'              => '.pp-heading-content .pp-heading .heading-title span.pp-secondary-title',
							'property'              => 'text-transform',
                       	)
					),   
                )
            ),
            'sub_heading_style'       => array( // Section
                'title'         => __('Description', 'bb-powerpack'), // Section Title
                'fields'        => array( // Section Fields
                    'sub_heading_font' => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-heading-content .pp-sub-heading, .pp-heading-content .pp-sub-heading p'
                        )
                    ),
                    'sub_heading_font_size_select'  => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Font Size', 'bb-powerpack'),
                        'default'   => 'default',
                        'options'   => array(
                            'default'   => __('Default', 'bb-powerpack'),
                            'custom'    => __('Custom', 'bb-powerpack'),
                        ),
                        'toggle'    => array(
                            'custom'    => array(
                                'fields'    => array('sub_heading_font_size')
                            )
                        )
                    ),
                    'sub_heading_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Custom Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '16',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-sub-heading, .pp-heading-content .pp-sub-heading p',
                            'property'  => 'font-size',
                            'unit'      => 'px'
                        )
                    ),
                    'sub_heading_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '1.6',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-heading-content .pp-sub-heading, .pp-heading-content .pp-sub-heading p',
                            'property'  => 'line-height',
                        )
                    ),
                )
            )
        )
    ),
    'heading_responsive'       => array( // Tab
        'title'         => __('Responsive', 'bb-powerpack'), // Tab title
        'sections'      => array( // Tab Sections
            'heading_responsive_tablet'    => array( // Section
                'title'             => __('Tablet', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
                    'heading_tablet_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Title Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'heading_tablet_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Title Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'heading2_tablet_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Secondary Title Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'heading2_tablet_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Secondary Title Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'sub_heading_tablet_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Description Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'sub_heading_tablet_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Description Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'heading_tablet_alignment'  => array(
                       'type'                       => 'pp-switch',
                       'label'                      => __('Alignment', 'bb-powerpack'),
                       'default'                    => 'center',
                       'options'                    => array(
                            'left'                      => __('Left', 'bb-powerpack'),
                            'center'                    => __('Center', 'bb-powerpack'),
                            'right'                      => __('Right', 'bb-powerpack'),
                        )
                   ),
                )
            ),
            'heading_responsive_mobile'    => array( // Section
                'title'             => __('Mobile', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
                    'heading_mobile_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Title Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'heading_mobile_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Title Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'heading2_mobile_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Secondary Title Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'heading2_mobile_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Secondary Title Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'sub_heading_mobile_font_size' => array(
                        'type'          => 'text',
                        'label'         => __('Description Font Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
					),
                    'sub_heading_mobile_line_height_n'   => array(
                        'type'          => 'text',
                        'label'         => __('Description Line Height', 'bb-powerpack'),
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '',
                    ),
                    'heading_mobile_alignment'  => array(
                       'type'                       => 'pp-switch',
                       'label'                      => __('Alignment', 'bb-powerpack'),
                       'default'                    => 'center',
                       'options'                    => array(
                            'left'                      => __('Left', 'bb-powerpack'),
                            'center'                    => __('Center', 'bb-powerpack'),
                            'right'                     => __('Right', 'bb-powerpack'),
                        )
                   ),
                )
            )
        )
    )
));
