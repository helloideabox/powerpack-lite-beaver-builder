<?php

/**
 * @class PPLineSeparatorModule
 */
class PPLineSeparatorModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Divider', 'bb-powerpack'),
            'description'   => __('Addon to add dividers in the row.', 'bb-powerpack'),
            'group'         => 'PowerPack Modules',
            'category'		=> pp_get_modules_cat( 'creative' ),
            'dir'           => BB_POWERPACK_DIR . 'modules/pp-line-separator/',
            'url'           => BB_POWERPACK_URL . 'modules/pp-line-separator/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'partial_refresh'   => true
        ));

        /**
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
		$this->add_css('font-awesome');
    }

    /**
     * Use this method to work with settings data before
     * it is saved. You must return the settings object.
     *
     * @method update
     * @param $settings {object}
     */
    public function update($settings)
    {
        return $settings;
    }

    /**
     * This method will be called by the builder
     * right before the module is deleted.
     *
     * @method delete
     */
    public function delete()
    {

    }

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('PPLineSeparatorModule', array(
	'general'      => array( // Tab
		'title'         => __('Separator', 'bb-powerpack'), // Tab title
		'sections'      => array( // Tab Sections
            'separator'      => array(
                'title'     => '',
                'fields'    => array(
                    'line_separator'     => array(
                       'type'      => 'select',
                       'label'     => __('Separator', 'bb-powerpack'),
                       'default'     => 'line_only',
                       'options'       => array(
                           'line_only'          => __('Line', 'bb-powerpack'),
                           'icon_image'          => __('Icon/Image', 'bb-powerpack'),
                           'line_with_icon'     => __('Line With Icon/Image', 'bb-powerpack'),
                       ),
                       'toggle' => array(
                            'line_only'      => array(
                                'fields'  => array('line_style', 'separator_alignment'),
                                'sections' => array('line_style_section'),
                            ),
                            'icon_image'    => array(
                                'fields'    => array('icon_image_select', 'separator_alignment'),
                                'sections'  => array('border_section', 'image_icon_style_section', 'icon_image_settings'),
                            ),
                            'line_with_icon'      => array(
                                'fields'  => array('line_style', 'separator_alignment', 'icon_image', 'font_icon_line_space', 'icon_image_select', 'icon_line_space'),
                                'sections' => array('line_style_section', 'border_section', 'image_icon_style_section', 'icon_image_settings')
                            ),
                        )
                    ),
                    'line_style'     => array(
                        'type'      => 'select',
                        'label'     => __('Line Style', 'bb-powerpack'),
                        'default'     => 'none',
                        'options'       => array(
                             'none'           => __('None', 'bb-powerpack'),
                             'solid'          => __('Solid', 'bb-powerpack'),
                             'dashed'         => __('Dashed', 'bb-powerpack'),
                             'dotted'         => __('Dotted', 'bb-powerpack'),
                             'double'         => __('Double', 'bb-powerpack'),
                         )
                    ),
                    'separator_alignment'    => array(
                        'type'      => 'pp-switch',
                        'label'     => 'Separator Alignment',
                        'default'   => 'center',
                        'options'   => array(
                            'left'    => __('Left', 'bb-powerpack'),
                            'center'    => __('Center', 'bb-powerpack'),
                            'right'    => __('Right', 'bb-powerpack'),
                        )
                    ),
                ),
            ),
            'icon_image_settings'   => array(
                'title'     => '',
                'fields'    => array(
                    'icon_image_select'    => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Icon Source', 'bb-powerpack'),
                        'default'   => 'icon',
                        'options'   => array(
                            'icon'  => __('Icon', 'bb-powerpack'),
                            'image'  => __('Image', 'bb-powerpack'),
                        ),
                        'toggle'    => array(
                            'icon'  => array(
                                'fields'  => array('separator_icon', 'font_icon_font_size', 'font_icon_color', 'font_icon_bg_color', 'font_icon_padding_top_bottom', 'font_icon_padding_left_right', 'icon_border_radius'),
                            ),
                            'image'  => array(
                                'fields'  => array('separator_image', 'font_icon_font_size', 'font_icon_bg_color', 'font_icon_padding_top_bottom', 'font_icon_padding_left_right', 'icon_border_radius'),
                            ),
                        ),
                    ),
                    'separator_icon'          => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'bb-powerpack')
					),
                    'separator_image'   => array(
                        'type'          => 'photo',
                        'label'         => __('Select Image', 'bb-powerpack'),
                        'connections'   => array( 'photo' ),
                    ),
                    'icon_line_space'   => array(
                        'type'      => 'text',
                        'label'     => __('Line-Icon gap', 'bb-powerpack'),
                        'size'      => 5,
                        'maxlength'     => 4,
                        'description'   => 'px',
                        'preview'   => array(
                            'type'  => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-line-separator-inner.pp-line-icon:before',
                                    'property'      => 'margin-right',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-line-separator-inner.pp-line-icon:after',
                                    'property'      => 'margin-left',
                                    'unit'          => 'px'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
		)
	),
    'style'     => array(
        'title'     => __('Style', 'bb-powerpack'),
        'sections'      => array(
            'line_style_section'    => array( // Section
                'title'             => __('Line Style', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
					'line_width'   => array(
                        'type'          => 'text',
                        'label'         => __('Custom Width', 'bb-powerpack'),
                        'size'          => 5,
                        'maxlength'     => 4,
                        'description'   => '%',
                        'default'       => '100',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-only .pp-line-separator',
                                    'property'  => 'width',
                                    'unit'      => '%'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-icon .pp-line-separator.pp-icon-image',
                                    'property'  => 'width',
                                    'unit'      => '%'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-icon:before',
                                    'property'  => 'width',
                                    'unit'      => '%'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-icon:after',
                                    'property'  => 'width',
                                    'unit'      => '%'
                                ),
                            ),
                        )
                    ),
                    'line_height'       => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'bb-powerpack'),
                        'size'          => 5,
                        'maxlength'     => 2,
                        'description'   => 'px',
                        'default'       => '1',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-line-separator.pp-line-only',
                                   'property'        => 'height',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-line-only',
                                   'property'        => 'border-bottom-width',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'  => '.pp-line-separator.pp-line-icon',
                                   'property'  => 'border-bottom-width',
                                   'unit'      => 'px'
                               ),
                               array(
                                   'selector'  => '.pp-line-separator-inner.pp-line-icon:before',
                                   'property'  => 'border-bottom-width',
                                   'unit'      => 'px'
                               ),
                               array(
                                   'selector'  => '.pp-line-separator-inner.pp-line-icon:after',
                                   'property'  => 'border-bottom-width',
                                   'unit'      => 'px'
                               ),
                           ),
                        )
                    ),
                    'line_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Line Color', 'bb-powerpack'),
                        'default'       => '000000',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'     => array(
                                array(
                                    'selector'        => '.pp-line-separator.pp-line-only',
                                    'property'        => 'border-bottom-color'
                                ),
                                array(
                                    'selector'        => '.pp-line-separator.pp-line-icon',
                                    'property'        => 'border-bottom-color'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-icon:before',
                                    'property'  => 'border-bottom-color',
                                ),
                                array(
                                    'selector'  => '.pp-line-separator-inner.pp-line-icon:after',
                                    'property'  => 'border-bottom-color',
                                ),
                            ),
                        )
                    ),
                )
            ),
            'image_icon_style_section'    => array( // Section
                'title'             => __('Icon Style', 'bb-powerpack'), // Section Title
                'fields'            => array( // Section Fields
					'font_icon_font_size'   => array(
                        'type'          => 'text',
                        'label'         => __('Icon Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'size'          => 5,
                        'maxlength'     => 3,
                        'default'       => '16',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                    'property'  => 'font-size',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-icon-wrap span.pp-icon:before',
                                    'property'  => 'font-size',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap img',
                                    'property'  => 'width',
                                    'unit'      => 'px'
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
                            'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
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
                                    'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                    'property'        => 'background-color'
                                ),
                                array(
                                    'selector'        => '.pp-line-separator.pp-image-wrap',
                                    'property'        => 'background-color'
                                ),
                            ),
                        )
                    ),
                    'font_icon_padding_top_bottom'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Top/Bottom', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'size'          => 5,
                        'maxlength'     => 3,
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                   'property'        => 'padding-top',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                   'property'        => 'padding-bottom',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-image-wrap',
                                   'property'        => 'padding-top',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-image-wrap',
                                   'property'        => 'padding-bottom',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'font_icon_padding_left_right'   => array(
                        'type'          => 'text',
                        'label'         => __('Padding Left/Right', 'bb-powerpack'),
                        'description'   => 'px',
                        'class'         => 'bb-heading-input input-small',
                        'default'       => '0',
                        'size'          => 5,
                        'maxlength'     => 3,
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'           => array(
                               array(
                                   'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                   'property'        => 'padding-left',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                   'property'        => 'padding-right',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-image-wrap',
                                   'property'        => 'padding-left',
                                   'unit'            => 'px'
                               ),
                               array(
                                   'selector'        => '.pp-line-separator.pp-image-wrap',
                                   'property'        => 'padding-right',
                                   'unit'            => 'px'
                               ),
                           ),
                        )
                    ),
                    'icon_border_radius'   => array(
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'bb-powerpack'),
                        'description'   => 'px',
                        'default'       => '100',
                        'size'          => 5,
                        'maxlength'     => 3,
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                    'property'  => 'border-radius',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap',
                                    'property'  => 'border-radius',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap img',
                                    'property'  => 'border-radius',
                                    'unit'      => 'px'
                                ),
                            ),

                        )
                    ),
                )
            ),
            'border_section'    => array(
                'title'     => __('Border Styling', 'bb-powerpack'),
                'fields'    => array(
                    'show_border'       => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Show Border', 'bb-powerpack'),
                        'default'   => 'no',
                        'options'   => array(
                            'yes'    => __('Yes', 'bb-powerpack'),
                            'no'    => __('No', 'bb-powerpack'),
                        ),
                        'toggle'    => array(
                            'yes'   => array(
                                'fields'    => array('font_icon_border_width', 'font_icon_border_style', 'font_icon_border_radius', 'font_icon_border_color'),
                            ),
                        ),
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
                    'font_icon_border_width'   => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'bb-powerpack'),
                        'description'   => 'px',
                        'default'       => '0',
                        'size'          => 5,
                        'maxlength'     => 3,
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                    'property'  => 'border-width',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap',
                                    'property'  => 'border-width',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap img',
                                    'property'  => 'border-width',
                                    'unit'      => 'px'
                                ),
                            ),
                        )
                    ),
                    'font_icon_border_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'default'       => '',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-line-separator.pp-icon-wrap span.pp-icon',
                                    'property'  => 'border-color',
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap img',
                                    'property'  => 'border-color',
                                ),
                                array(
                                    'selector'  => '.pp-line-separator.pp-image-wrap',
                                    'property'  => 'border-color',
                                ),
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
));
