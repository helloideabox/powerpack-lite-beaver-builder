<?php

/**
 * @class PPInfoListModule
 */
class PPInfoListModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Info List', 'bb-powerpack'),
            'description'   => __('Addon to display info list.', 'bb-powerpack'),
            'group'         => pp_get_modules_group(),
            'category'		=> pp_get_modules_cat( 'content' ),
            'dir'           => BB_POWERPACK_DIR . 'modules/pp-infolist/',
            'url'           => BB_POWERPACK_URL . 'modules/pp-infolist/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
            'partial_refresh'   => true,
            'icon'				=> 'layout.svg',
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
FLBuilder::register_module('PPInfoListModule', array(
	'general'      => array( // Tab
		'title'         => __('General', 'bb-powerpack'), // Tab title
		'sections'      => array(
            'layouts'   => array(
                'title' => '',
                'fields'    => array(
                    'layouts'   => array(
                        'type'  => 'pp-switch',
                        'default'   => '1',
                        'label'     => __('Icon Position', 'bb-powerpack'),
                        'options'   => array(
                            '1'     => __('Left', 'bb-powerpack'),
                            '2'     => __('Right', 'bb-powerpack'),
                            '3'     => __('Top', 'bb-powerpack'),
                        ),
                    ),
                ),
            ),
            'connector'         => array(
                'title'             => __('Connector Line', 'bb-powerpack'),
                'fields'            => array(
                    'connector_type'    => array(
                        'type'              => 'pp-switch',
                        'label'             => __('Style', 'bb-powerpack'),
                        'default'           => 'dashed',
                        'options'           => array(
                            'none'              => __('None', 'bb-powerpack'),
                            'solid'             => __('Solid', 'bb-powerpack'),
                            'dashed'            => __('Dashed', 'bb-powerpack'),
                            'dotted'            => __('Dotted', 'bb-powerpack'),
                        ),
                        'toggle'  => array(
                            'solid'  => array(
                                'fields'    => array('connector_width', 'connector_color')
                            ),
                            'dashed'  => array(
                                'fields'    => array('connector_width', 'connector_color')
                            ),
                            'dotted'  => array(
                                'fields'    => array('connector_width', 'connector_color')
                            )
                        )
                    ),
                    'connector_width'   => array(
                        'type'              => 'text',
                        'label'             => __('Width', 'bb-powerpack'),
                        'size'              => 5,
                        'default'           => 1,
                        'maxlength'         => 1,
                        'description'       => __( 'px', 'bb-powerpack' ),
                    ),
                    'connector_color'   => array(
                        'type'              => 'color',
                        'label'             => __('Color', 'bb-powerpack'),
                        'default'           => '000000',
                        'show_reset'        => true,
                    ),
                ),
            ),
		)
	),
    'list_items'    => array(
        'title'     => __('List Items', 'bb-powerpack'),
        'sections'  => array(
            'general'   => array(
                'title'     => '',
                'fields'    => array(
                    'list_items'    => array(
                        'type'          => 'form',
						'label'         => __('List Item', 'bb-powerpack'),
						'form'          => 'pp_list_item', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
						'multiple'      => true
                    ),
                ),
            ),
        ),
    ),
    'style'     => array(
        'title' => __('Style', 'bb-powerpack'),
        'sections'  => array(
            'style' => array(
                'title' => __('Sizes', 'bb-powerpack'),
                'fields'    => array(
                    'icon_font_size'    => array(
                        'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '2',
                        'default'       => '16',
                        'label'         => __('Icon Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon-inner span',
                                    'property'      => 'font-size',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner span:before',
                                    'property'      => 'font-size',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                    'icon_box_width'    => array(
                        'type'      => 'text',
                        'label'     => __('Icon Box Size', 'bb-powerpack'),
                        'size'      => '5',
                        'maxlength'     => '3',
                        'default'       => '40',
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon-inner',
                                    'property'      => 'height',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner',
                                    'property'      => 'width',
                                    'unit'          => 'px'
                                ),
                            ),
                        ),
                    ),
                )
            ),
            'icon_border'   => array(
                'title'         => __('Border', 'bb-powerpack'),
                'fields'        => array(
                    'show_border'   => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Show Border', 'bb-powerpack'),
                        'default'   => 'no',
                        'options'   => array(
                            'yes'    => __('Yes', 'bb-powerpack'),
                            'no'    => __('No', 'bb-powerpack'),
                        ),
                        'toggle'    => array(
                            'yes'   => array(
                                'fields'    => array ('icon_border_width', 'icon_border_color', 'icon_border_color_hover', 'icon_border_style', 'icon_box_size')
                            )
                        ),
                    ),
                    'icon_border_style'     => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Border Style', 'bb-powerpack'),
                        'default'   => 'solid',
                        'options'   => array(
                            'solid'      => __('Solid', 'bb-powerpack'),
                            'dotted'      => __('Dotted', 'bb-powerpack'),
                            'dashed'      => __('Dashed', 'bb-powerpack'),
                            'double'      => __('Double', 'bb-powerpack'),
                        ),
                    ),
                    'icon_border_width'    => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'bb-powerpack'),
                        'default'       => 1,
                        'size'          => 5,
                        'maxlength'     => 2,
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon',
                                    'property'      => 'border-width',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner img',
                                    'property'      => 'border-width',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                    'icon_border_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon',
                                    'property'      => 'border-color',
                                ),
                            ),
                        )
                    ),
                    'icon_border_color_hover'    => array(
                        'type'          => 'color',
                        'label'         => __('Border Color Hover', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon:hover',
                                    'property'      => 'border-color',
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner img:hover',
                                    'property'      => 'border-color',
                                ),
                            ),
                        )
                    ),
                    'icon_border_radius'    => array(
                        'type'          => 'text',
                        'label'         => __('Round Corners', 'bb-powerpack'),
                        'default'       => '0',
                        'size'          => '5',
                        'maxlength'     => '3',
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-icon',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner span.pp-icon',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon-inner img',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                ),
            ),
            'icon_spacing'   => array(
                'title'          => __('Spacing', 'bb-powerpack'),
                'fields'        => array(
                    'list_spacing'  => array(
                        'type'      => 'text',
                        'label'     => __('List Spacing', 'bb-powerpack'),
                        'size'      => 5,
                        'maxlength' => 3,
                        'default'   => 25,
                        'help'      => __('Spacing between two list items.', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'selector'  => '.pp-infolist-wrap .pp-list-item',
                            'property'  => 'margin-bottom',
                            'unit'      => 'px'
                        ),
                    ),
                    'icon_gap'  => array(
                        'type'      => 'text',
                        'label'     => __('Icon Spacing', 'bb-powerpack'),
                        'size'      => 5,
                        'maxlength' => 3,
                        'default'   => 20,
                        'help'   => __('Distance between icon and content.', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'      => 'css',
                            'rules'     => array(
                                array(
                                    'selector'  => '.pp-infolist-wrap .layout-1 .pp-icon-wrapper',
                                    'property'  => 'margin-right',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-infolist-wrap .layout-2 .pp-icon-wrapper',
                                    'property'  => 'margin-left',
                                    'unit'      => 'px'
                                ),
                                array(
                                    'selector'  => '.pp-infolist-wrap .layout-3 .pp-icon-wrapper',
                                    'property'  => 'margin-bottom',
                                    'unit'      => 'px'
                                ),
                            ),
                        ),
                    ),
                    'icon_box_size'     => array(
                        'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '3',
                        'default'     => '0',
                        'label'         => __('Inside Spacing', 'bb-powerpack'),
                        'description'   => 'px',
                        'help'      => __('Space between icon and the border', 'bb-powerpack'),
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'      => '.pp-infolist-icon-inner img',
                                    'property'     => 'padding',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infolist-icon',
                                    'property'     => 'padding',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                )
            ),
        ),
    ),
    'typography'      => array( // Tab
		'title'         => __('Typography', 'bb-powerpack'), // Tab title
		'sections'      => array( // Tab Sections
            'general'     => array(
                'title'     => __('Title', 'bb-powerpack'),
                'fields'    => array(
                    'title_color'    => array(
						'type'          => 'color',
						'label'         => __('Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infolist-title h3',
                                    'property'      => 'color',
                                ),
                                array(
                                    'selector'      => '.pp-infolist-title a h3',
                                    'property'      => 'color',
                                ),
                            ),
                        )
					),
                    'title_font'          => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-infolist-title h3'
                        )
                    ),
                    'title_font_size'    => array(
						'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '2',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infolist-title h3',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        )
					),
                    'title_margin'      => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 0,
                            'bottom'            => 0
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-infolist-title h3',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-infolist-title h3',
                                    'property'          => 'margin-bottom',
                                    'unit'              => 'px'
                                ),
                            )
                        )
                    ),
                ),
            ),
            'text_typography'   => array(
                'title'     => __('Description', 'bb-powerpack'),
                'fields'    => array(
                    'text_color'    => array(
						'type'          => 'color',
						'label'         => __('Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infolist-description',
                            'property'      => 'color',
                        )
					),
                    'text_font'          => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-infolist-description'
                        )
                    ),
                    'text_font_size'    => array(
						'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '2',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infolist-description',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        )
					),
                ),
            ),
		)
	)
));

FLBuilder::register_settings_form('pp_list_item', array(
	'title' => __('Add Item', 'bb-powerpack'),
	'tabs'  => array(
        'general'      => array( // Tab
			'title'         => __('General', 'bb-powerpack'), // Tab title
			'sections'      => array( // Tab Sections
                'type'      => array(
                    'title'     => __('Icon', 'bb-powerpack'),
                    'fields'    => array(
                        'icon_type'      => array(
                            'type'      => 'select',
                            'label'     => __('Icon Type', 'bb-powerpack'),
                            'default'   => 'icon',
                            'options'   => array(
                                'icon'      => __('Icon', 'bb-powerpack'),
                                'image'      => __('Image', 'bb-powerpack'),
                            ),
                            'toggle'        => array(
                                'icon'      => array(
                                    'fields'        => array('icon_select', 'icon_color', 'icon_color_hover', 'icon_background', 'icon_background_hover'),
                                    'tabs'          => array('icon_styles'),
                                ),
                                'image'      => array(
                                    'fields'        => array('image_select'),
                                ),
                            ),
                        ),
                        'icon_select'       => array(
                            'type'      => 'icon',
                            'label'     => __('Icon', 'bb-powerpack'),
                            'show_remove'    => true,
                        ),
                        'image_select'       => array(
                            'type'      => 'photo',
                            'label'     => __('Image Icon', 'bb-powerpack'),
                            'show_remove'    => true,
                            'connections'   => array( 'photo' ),
                        ),
                        'icon_animation'     => array(
                            'type'      => 'select',
                            'label'     => __('Animation', 'bb-powerpack'),
                            'default'     => 'none',
                            'options'       => array(
    							'none'          => __('None', 'bb-powerpack'),
    							'swing'          => __('Swing', 'bb-powerpack'),
    							'pulse'          => __('Pulse', 'bb-powerpack'),
    							'flash'          => __('Flash', 'bb-powerpack'),
    							'fadeIn'          => __('Fade In', 'bb-powerpack'),
    							'fadeInUp'          => __('Fade In Up', 'bb-powerpack'),
    							'fadeInDown'          => __('Fade In Down', 'bb-powerpack'),
    							'fadeInLeft'          => __('Fade In Left', 'bb-powerpack'),
    							'fadeInRight'          => __('Fade In Right', 'bb-powerpack'),
                                'slideInUp'          => __('Slide In Up', 'bb-powerpack'),
    							'slideInDown'          => __('Slide In Down', 'bb-powerpack'),
                                'slideInLeft'          => __('Slide In Left', 'bb-powerpack'),
    							'slideInRight'          => __('Slide In Right', 'bb-powerpack'),
    							'bounceIn'          => __('Bounce In', 'bb-powerpack'),
                                'bounceInUp'          => __('Bounce In Up', 'bb-powerpack'),
    							'bounceInDown'          => __('Bounce In Down', 'bb-powerpack'),
    							'bounceInLeft'          => __('Bounce In Left', 'bb-powerpack'),
    							'bounceInRight'          => __('Bounce In Right', 'bb-powerpack'),
    							'flipInX'          => __('Flip In X', 'bb-powerpack'),
    							'FlipInY'          => __('Flip In Y', 'bb-powerpack'),
    							'lightSpeedIn'          => __('Light Speed In', 'bb-powerpack'),
    							'rotateIn'          => __('Rotate In', 'bb-powerpack'),
                                'rotateInUpLeft'          => __('Rotate In Up Left', 'bb-powerpack'),
                                'rotateInUpRight'          => __('Rotate In Up Right', 'bb-powerpack'),
    							'rotateInDownLeft'          => __('Rotate In Down Left', 'bb-powerpack'),
    							'rotateInDownRight'          => __('Rotate In Down Right', 'bb-powerpack'),
    							'rollIn'          => __('Roll In', 'bb-powerpack'),
    							'zoomIn'          => __('Zoom In', 'bb-powerpack'),
                                'slideInUp'          => __('Slide In Up', 'bb-powerpack'),
    							'slideInDown'          => __('Slide In Down', 'bb-powerpack'),
    							'slideInLeft'          => __('Slide In Left', 'bb-powerpack'),
    							'slideInRight'          => __('Slide In Right', 'bb-powerpack'),
    						)
                        ),
                        'animation_duration'    => array(
                            'type'      => 'text',
                            'label'     => __('Animation Duration', 'bb-powerpack'),
                            'default'     => '1000',
                            'maxlength'     => '4',
                            'size'      => '5',
                            'description'   => _x( 'ms', 'Value unit for animation duration. Such as: "1s"', 'bb-powerpack' ),
                            'preview'       => array(
                                'type'      => 'css',
                                'selector'  => '.animated',
                                'property'  => 'animation-duration'
                            ),
                        ),
                    ),
                ),
                'title'     => array(
                    'title'     => __('Title', 'bb-powerpack'),
                    'fields'    => array(
                        'title'     => array(
                            'type'      => 'text',
                            'label'     => '',
                            'default'     => '',
                            'connections'   => array( 'string', 'html', 'url' ),
                            'preview'       => array(
    							'type'          => 'text',
    							'selector'      => '.pp-infolist-title h3'
    						)
                        ),
                    ),
                ),
                'description'    => array(
                    'title'         => __('Description', 'bb-powerpack'),
                    'fields'        => array(
                        'description'   => array(
                            'type'      => 'editor',
                            'label'     => '',
                            'default'   => '',
                            'media_buttons' => false,
                            'rows'      => 4,
                            'connections'   => array( 'string', 'html', 'url' ),
                            'preview'   => array(
    							'type'       => 'text',
    							'selector'   => '.pp-infolist-description'
    						)
                        ),
                    ),
                ),
                'link_type'     => array(
                    'title'     => __('Link', 'bb-powerpack'),
                    'fields'    => array(
                        'link_type'     => array(
                            'type'      => 'select',
                            'label'     => __('Link Type', 'bb-powerpack'),
                            'default'     => 'none',
                            'options'   => array(
                                'none'  => __('None', 'bb-powerpack'),
                                'box'  => __('Complete Box', 'bb-powerpack'),
                                'title'  => __('Title Only', 'bb-powerpack'),
                                'read_more'  => __('Read More', 'bb-powerpack'),
                            ),
                            'toggle'    => array(
                                'box'     => array(
                                    'fields'    => array('link')
                                ),
                                'title'     => array(
                                    'fields'    => array('link')
                                ),
                                'read_more'     => array(
                                    'fields'    => array('read_more_text', 'read_more_color', 'read_more_color_hover', 'link', 'read_more_font', 'read_more_font_size')
                                ),
                            )
                        ),
                        'link'  => array(
                            'type'          => 'link',
    						'label'         => __('Link', 'bb-powerpack'),
    						'placeholder'   => __( 'http://www.example.com', 'bb-powerpack' ),
                            'connections'   => array( 'url' ),
    						'preview'       => array(
    							'type'          => 'none'
    						)
                        ),
                        'link_target'   => array(
                            'type'          => 'select',
                            'label'         => __('Link Target', 'bb-powerpack'),
                            'default'       => '_self',
                            'options'       => array(
                                '_self'         => __('Same Window', 'bb-powerpack'),
                                '_blank'        => __('New Window', 'bb-powerpack'),
                            ),
                            'preview'       => array(
                                'type'          => 'none'
                            )
                        ),
                        'read_more_text'     => array(
                            'type'      => 'text',
                            'label'         => __('Text', 'bb-powerpack'),
                            'default'       => __('Read More', 'bb-powerpack'),
                            'preview'       => array(
                                'type'      => 'text',
                                'selector'  => '.pp-more-link'
                            ),
                        ),
                        'read_more_color'    => array(
                            'type'      => 'color',
                            'label'     => __('Link Color', 'bb-powerpack'),
                            'default'   => '000000',
                            'show_reset'    => true,
                            'preview'   => array(
                                'type'  => 'css',
                                'selector'  => '.pp-more-link',
                                'property'  => 'color'
                            ),
                        ),
                        'read_more_color_hover'    => array(
                            'type'      => 'color',
                            'label'     => __('Link Hover Color', 'bb-powerpack'),
                            'default'   => 'dddddd',
                            'show_reset'    => true,
                            'preview'   => array(
                                'type'  => 'css',
                                'selector'  => '.pp-more-link:hover',
                                'property'  => 'color'
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'icon_styles'   => array(
            'title'     => __('Icon Style', 'bb-powerpack'),
            'sections'  => array(
                'icon_styles'   => array(
                    'title'     => '',
                    'fields'    => array(
                        'icon_color'    => array(
    						'type'          => 'color',
    						'label'         => __('Color', 'bb-powerpack'),
    						'show_reset'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'      => '.pp-infolist-icon-inner',
                                'property'      => 'color',
                            )
    					),
                        'icon_color_hover'    => array(
    						'type'          => 'color',
    						'label'         => __('Color Hover', 'bb-powerpack'),
    						'show_reset'    => true
    					),
                        'icon_background'    => array(
    						'type'          => 'color',
    						'label'         => __('Background', 'bb-powerpack'),
    						'show_reset'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'      => '.pp-infolist-icon-inner .pp-icon',
                                'property'      => 'background',
                            )
    					),
                        'icon_background_hover'    => array(
    						'type'          => 'color',
    						'label'         => __('Background Hover', 'bb-powerpack'),
    						'show_reset'    => true
    					),
                    ),
                ),
            ),
        ),
    ),
));
