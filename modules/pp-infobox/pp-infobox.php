<?php

/**
 * @class PPInfoBoxModule
 */
class PPInfoBoxModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Info Box', 'bb-powerpack'),
            'description'   => __('Addon to display info box.', 'bb-powerpack'),
            'group'         => pp_get_modules_group(),
            'category'		=> pp_get_modules_cat( 'content' ),
            'dir'           => BB_POWERPACK_DIR . 'modules/pp-infobox/',
            'url'           => BB_POWERPACK_URL . 'modules/pp-infobox/',
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

    public function render_link()
    {
        $settings = $this->settings;
        $button_class = ( 'button' == $settings->pp_infobox_link_type && '' != $settings->link_css_class ) ? ' ' . $settings->link_css_class : '';

        if ( 'button' == $settings->pp_infobox_link_type ) {
            ?>
            <div class="pp-button-wrap">
                <a class="pp-more-link pp-button<?php echo $button_class; ?>" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
            </div>
            <?php
        }
        if ( 'read_more' == $settings->pp_infobox_link_type ) {
            ?>
            <p><a class="pp-more-link<?php echo $button_class; ?>" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a></p>
            <?php
        }
    }

    /**
     * @method get_alt
     */
    public function get_alt()
    {
        $photo = FLBuilderPhoto::get_attachment_data($this->settings->image_select);

        if(!empty($photo->alt)) {
            return htmlspecialchars($photo->alt);
        }
        else if(!empty($photo->description)) {
            return htmlspecialchars($photo->description);
        }
        else if(!empty($photo->caption)) {
            return htmlspecialchars($photo->caption);
        }
        else if(!empty($photo->title)) {
            return htmlspecialchars($photo->title);
        }
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('PPInfoBoxModule', array(
	'general'      => array( // Tab
		'title'         => __('General', 'bb-powerpack'), // Tab title
		'sections'      => array( // Tab Sections
            'layout'        => array(
                'title'         => '',
                'fields'        => array(
                    'layouts'       => array(
                        'type'      => 'select',
                        'label'     => __('Layout', 'bb-powerpack'),
                        'default'   => '5',
                        'options'   => array(
                            '0'         => __('No Icon', 'bb-powerpack'),
                            '5'         => __('Icon at Top', 'bb-powerpack'),
                            '3'         => __('Icon at Left', 'bb-powerpack'),
                            '4'         => __('Icon at Right', 'bb-powerpack'),
                            '1'         => __('Icon at Left with Title', 'bb-powerpack'),
                            '2'         => __('Icon at Right with Title', 'bb-powerpack'),
                        ),
                        'toggle'        => array(
                            '1'             => array(
                                'tabs'          => array('icon_styles'),
                                'sections'      => array('type'),
                            ),
                            '2'             => array(
                                'tabs'          => array('icon_styles'),
                                'sections'      => array('type'),
                            ),
                            '3'             => array(
                                'tabs'          => array('icon_styles'),
                                'sections'      => array('type'),
                                'fields'        => array('space_bt_icon_text')
                            ),
                            '4'             => array(
                                'tabs'          => array('icon_styles'),
                                'sections'      => array('type'),
                                'fields'        => array('space_bt_icon_text')
                            ),
                            '5'             => array(
                                'tabs'          => array('icon_styles'),
                                'sections'      => array('type'),
                            ),
                        )
                    ),
                )
            ),
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
                                'sections'      => array('icon_colors'),
                                'fields'        => array('icon_select', 'icon_color', 'icon_font_size', 'icon_color_hover', 'icon_background', 'icon_background_hover', 'icon_width'),
                            ),
                            'image'      => array(
                                'fields'        => array('image_select', 'image_width_type'),
                            ),
                        ),
                    ),
                    'icon_select'       => array(
                        'type'      => 'icon',
                        'label'     => __('Icon', 'bb-powerpack'),
                        'show_remove'   => true
                    ),
                    'image_select'       => array(
                        'type'      => 'photo',
                        'label'     => __('Image Icon', 'bb-powerpack'),
                        'show_remove'   => true,
                        'connections'   => array( 'photo' ),
                    ),
                    'space_bt_icon_text'    => array(
                        'type'                  => 'text',
                        'label'                 => __('Space between icon and text', 'bb-powerpack'),
                        'description'           => 'px',
                        'default'               => 10,
                        'size'                  => 5,
                        'maxlength'             => 3,
                        'preview'               => array(
                            'type'                  => 'css',
                            'rules'                 => array(
                                array(
                                    'selector'              => '.pp-infobox-wrap .layout-3 .pp-icon-wrapper',
                                    'property'              => 'margin-right',
                                    'unit'                  => 'px'
                                ),
                                array(
                                    'selector'              => '.pp-infobox-wrap .layout-4 .pp-icon-wrapper',
                                    'property'              => 'margin-left',
                                    'unit'                  => 'px'
                                )
                            )
                        )
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
                        'default'     => '500',
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
        )
    ),
    'content'   => array(
        'title'     => __('Content', 'bb-powerpack'),
        'sections'  => array(
			'title_prefix'     => array(
                'title'     => __('Title Prefix', 'bb-powerpack'),
                'fields'    => array(
                    'title_prefix'     => array(
                        'type'      => 'text',
                        'label'     => '',
                        'connections'   => array( 'string', 'html', 'url' ),
                        'preview'       => array(
							'type'          => 'text',
							'selector'      => '.pp-infobox-title-prefix'
						)
                    ),
                ),
            ),
            'title'     => array(
                'title'     => __('Title', 'bb-powerpack'),
                'fields'    => array(
                    'title'     => array(
                        'type'      => 'text',
                        'label'     => '',
                        'connections'   => array( 'string', 'html', 'url' ),
                        'preview'       => array(
							'type'          => 'text',
							'selector'      => '.pp-infobox-title-wrapper .pp-infobox-title'
						)
                    ),
                ),
            ),
            'description'     => array(
                'title'     => __('Description', 'bb-powerpack'),
                'fields'    => array(
                    'description'     => array(
                        'type'      => 'editor',
                        'label'     => '',
                        'default'     => '',
                        'media_buttons' => false,
                        'rows'      => 4,
                        'connections'   => array( 'string', 'html', 'url' ),
                        'preview'       => array(
							'type'          => 'text',
							'selector'      => '.pp-infobox-description'
						)
                    ),
                ),
            ),
		)
	),
    'button_link'   => array(
        'title'         => __('Link', 'bb-powerpack'),
        'sections'      => array(
            'pp_infobox_link_type'     => array(
                'title'     => __('Link', 'bb-powerpack'),
                'fields'    => array(
                    'pp_infobox_link_type'     => array(
                        'type'      => 'select',
                        'label'     => __('Link Type', 'bb-powerpack'),
                        'default'   => 'none',
                        'options'   => array(
                            'none'      => __('None', 'bb-powerpack'),
                            'box'       => __('Complete Box', 'bb-powerpack'),
                            'title'     => __('Title Only', 'bb-powerpack'),
                            'read_more' => __('Text Link', 'bb-powerpack'),
                            'button'    => __('Button', 'bb-powerpack'),
                        ),
                        'toggle'    => array(
                            'box'     => array(
                                'fields'    => array('link', 'link_target')
                            ),
                            'title'     => array(
                                'fields'    => array('link', 'link_target')
                            ),
                            'read_more'     => array(
                                'fields'        => array('pp_infobox_read_more_text', 'link', 'link_target'),
                                'sections'      => array('link_style', 'button_typography')
                            ),
                            'button'     => array(
                                'fields'        => array('pp_infobox_read_more_text', 'link', 'link_target', 'link_css_class', 'button_bg_color', 'button_bg_hover_color', 'button_padding', 'button_radius', 'button_width', 'field_separator_1', 'field_separator_3'),
                                'sections'      => array('link_style', 'button_border', 'button_typography')
                            ),
                        )
                    ),
                    'pp_infobox_read_more_text'     => array(
                        'type'      => 'text',
                        'label'         => __('Text', 'bb-powerpack'),
                        'default'       => __('Read More', 'bb-powerpack'),
                        'preview'       => array(
                            'type'      => 'text',
                            'selector'  => '.pp-more-link'
                        ),
                    ),
                    'link'  => array(
                        'type'          => 'link',
						'label'         => __('Link', 'bb-powerpack'),
						'placeholder'   => 'http://www.example.com',
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
                    'link_css_class'    => array(
                        'type'  => 'text',
                        'label' => __('Custom CSS Class', 'bb-powerpack'),
                        'default'   => ''
                    ),
                ),
            ),
            'link_style'    => array(
                'title'         => __('Style', 'bb-powerpack'),
                'fields'        => array(
                    'button_bg_color'    => array(
                        'type'      => 'color',
                        'label'     => __('Background Color', 'bb-powerpack'),
                        'default'   => '',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'css',
                            'selector'  => '.pp-more-link',
                            'property'  => 'background-color'
                        ),
                    ),
                    'button_bg_hover_color'    => array(
                        'type'      => 'color',
                        'label'     => __('Background Hover Color', 'bb-powerpack'),
                        'default'   => '',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'      => 'none',
                        ),
                    ),
                    'field_separator_1' => array(
                        'type'      => 'pp-separator',
                        'color'   => 'eeeeee'
                    ),
                    'pp_infobox_read_more_color'    => array(
                        'type'      => 'color',
                        'label'     => __('Text Color', 'bb-powerpack'),
                        'default'   => '',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-more-link',
                            'property'  => 'color'
                        ),
                    ),
                    'pp_infobox_read_more_color_hover'    => array(
                        'type'      => 'color',
                        'label'     => __('Text Hover Color', 'bb-powerpack'),
                        'default'   => '',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-more-link:hover',
                            'property'  => 'color'
                        ),
                    ),
                    'field_separator_2' => array(
                        'type'      => 'pp-separator',
                        'color'     => 'eeeeee'
                    ),
                    'button_padding'       => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Padding', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 10,
                            'bottom'            => 10,
                            'left'              => 15,
                            'right'             => 15,
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'padding-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'padding-bottom',
                                    'unit'              => 'px'
                                ),
                            ),
                            'left'              => array(
                                'placeholder'       => __('Left', 'bb-powerpack'),
                                'tooltip'           => __('Left', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-left',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'padding-left',
                                    'unit'              => 'px'
                                ),
                            ),
                            'right'             => array(
                                'placeholder'       => __('Right', 'bb-powerpack'),
                                'tooltip'           => __('Right', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-right',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'padding-right',
                                    'unit'              => 'px'
                                ),
                            ),
                        )
                    ),
                    'read_more_margin'       => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 0,
                            'bottom'            => 0,
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-more-link',
                                    'property'          => 'margin-bottom',
                                    'unit'              => 'px'
                                ),
                            ),
                        )
                    ),
                    'field_separator_3' => array(
                        'type'      => 'pp-separator',
                        'color'     => 'eeeeee'
                    ),
                    'button_radius'     => array(
                        'type'      => 'text',
                        'label'     => __('Round Corners', 'bb-powerpack'),
                        'size'      => '4',
                        'maxlength' => '3',
                        'default'   => '0',
                        'description'   => 'px',
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-more-link',
                            'property'  => 'border-radius',
                            'unit'      => 'px'
                        )
                    ),
                    'button_width'  => array(
                        'type'          => 'pp-switch',
                        'label'         => __('Button Width', 'bb-powerpack'),
                        'default'       => 'auto',
                        'options'       => array(
                            'auto'          => __('Auto', 'bb-powerpack'),
                            'custom'        => __('Custom', 'bb-powerpack'),
                            'full'          => __('Full Width', 'bb-powerpack')
                        ),
                        'toggle'        => array(
                            'custom'        => array(
                                'fields'        => array('button_width_custom')
                            )
                        )
                    ),
                    'button_width_custom'   => array(
                        'type'                  => 'text',
                        'label'                 => __('Custom Width', 'bb-powerpack'),
                        'default'               => '',
                        'size'                  => '4',
                        'description'           => 'px'
                    ),
                )
            ),
            'button_border' => array(
                'title'         => __('Border', 'bb-powerpack'),
                'fields'        => array(
                    'button_border' => array(
                        'type'          => 'pp-switch',
                        'label'         => __('Border', 'bb-powerpack'),
                        'default'       => 'default',
                        'options'       => array(
                            'default'       => __('Default', 'bb-powerpack'),
                            'custom'        => __('Custom', 'bb-powerpack')
                        ),
                        'toggle'    => array(
                            'custom'    => array(
                                'fields'    => array('button_border_custom', 'button_border_style', 'button_border_color', 'button_border_hover_color')
                            )
                        )
                    ),
                    'button_border_custom'  => array(
                        'type'      => 'text',
                        'label'     => __('Border Custom', 'bb-powerpack'),
                        'default'   => '0',
                        'size'      => '5',
                        'description' => 'px'
                    ),
                    'button_border_style'   => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Border Style', 'bb-powerpack'),
                        'default'   => 'solid',
                        'options'   => array(
                            'solid'     => __('Solid', 'bb-powerpack'),
                            'dashed'    => __('Dashed', 'bb-powerpack'),
                            'dotted'    => __('Dotted', 'bb-powerpack')
                        )
                    ),
                    'button_border_color'   => array(
                        'type'          => 'color',
                        'label'         => __('Border Color', 'bb-powerpack'),
                        'show_reset'    => true
                    ),
                    'button_border_hover_color'   => array(
                        'type'          => 'color',
                        'label'         => __('Border Hover Color', 'bb-powerpack'),
                        'show_reset'    => true
                    )
                )
            )
        )
    ),
    'box'       => array(
        'title'     => __('Style', 'bb-powerpack'),
        'sections'  => array(
			'box_style'     => array(
                'title'         => __('Box', 'bb-powerpack'),
                'fields'        => array(
                    'box_background'    => array(
                        'type'              => 'color',
                        'label'             => __('Background Color', 'bb-powerpack'),
                        'default'           => 'ffffff',
                        'show_reset'        => true,
                        'preview'           => array(
                            'type'              => 'css',
                            'selector'          => '.pp-infobox',
                            'property'          => 'background'
                        ),
                    ),
                    'box_background_hover'    => array(
                        'type'      => 'color',
                        'label'     => __('Background Hover Color', 'bb-powerpack'),
                        'default'   => '',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-infobox:hover',
                            'property'  => 'background'
                        ),
                    ),
                    'box_border_style'    => array(
                        'type'      => 'select',
                        'label'     => __('Border Style', 'bb-powerpack'),
                        'default'   => 'none',
                        'options'   => array(
                            'none'     => __('None', 'bb-powerpack'),
                            'solid'     => __('Solid', 'bb-powerpack'),
                            'dashed'     => __('Dashed', 'bb-powerpack'),
                            'dotted'     => __('Dotted', 'bb-powerpack'),
                            'double'     => __('Double', 'bb-powerpack'),
                        ),
                        'toggle'   => array(
                            'solid'  => array(
                                'fields'    => array('box_border_width', 'box_border_color'),
                            ),
                            'dashed'  => array(
                                'fields'    => array('box_border_width', 'box_border_color'),
                            ),
                            'dotted'  => array(
                                'fields'    => array('box_border_width', 'box_border_color'),
                            ),
                            'double'  => array(
                                'fields'    => array('box_border_width', 'box_border_color'),
                            ),
                        ),
                    ),
                    'box_border_width'    => array(
                        'type'      => 'text',
                        'label'     => __('Border Width', 'bb-powerpack'),
                        'default'   => '1',
                        'size'          => '5',
                        'maxlength'     => '2',
                        'description'   => 'px',
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-infobox',
                            'property'  => 'border-width',
                            'unit'      => 'px'
                        ),
                    ),
                    'box_border_color'    => array(
                        'type'      => 'color',
                        'label'     => __('Border Color', 'bb-powerpack'),
                        'default'   => 'd8d8d8',
                        'show_reset'    => true,
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-infobox',
                            'property'  => 'border-color'
                        ),
                    ),
					'box_border_radius'     => array(
                        'type'      => 'text',
                        'label'     => __('Round Corners', 'bb-powerpack'),
                        'size'      => '5',
                        'maxlength' => '3',
                        'default'   => '0',
                        'description'   => 'px',
                        'preview'   => array(
                            'type'  => 'css',
                            'selector'  => '.pp-infobox',
                            'property'  => 'border-radius',
                            'unit'      => 'px'
                        )
                    ),
                    'padding_top'   => array(
                        'type'      => 'text',
                        'size'      => '5',
                        'maxlength'     => '3',
                        'default'       => '20',
                        'label'     => __('Top/Bottom Padding', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infobox',
                                    'property'      => 'padding-top',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox',
                                    'property'      => 'padding-bottom',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                    'padding_left'   => array(
                        'type'      => 'text',
                        'size'      => '5',
                        'maxlength'     => '3',
                        'default'       => '20',
                        'label'     => __('Left/Right Padding', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infobox',
                                    'property'      => 'padding-left',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox',
                                    'property'      => 'padding-right',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
					'alignment' => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Content Alignment', 'bb-powerpack'),
                        'default'   => 'center',
                        'options'   => array(
                            'left'      => __('Left', 'bb-powerpack'),
                            'center'    => __('Center', 'bb-powerpack'),
                            'right'     => __('Right', 'bb-powerpack'),
                        )
                    )
                )
            ),
			'title_prefix_style'   => array(
                'title'         => __('Title Prefix', 'bb-powerpack'),
                'fields'        => array(
                    'title_prefix_color'    => array(
						'type'          => 'color',
						'label'         => __('Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-prefix',
                            'property'      => 'color',
                        )
					),
                    'title_prefix_margin'      => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => '',
                            'bottom'            => '',
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-title-prefix',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-title-prefix',
                                    'property'          => 'margin-bottom',
                                    'unit'              => 'px'
                                ),
                            ),
                        )
                    ),
                )
            ),
            'title_style'   => array(
                'title'         => __('Title', 'bb-powerpack'),
                'fields'        => array(
                    'title_color'    => array(
						'type'          => 'color',
						'label'         => __('Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-wrapper .pp-infobox-title',
                            'property'      => 'color',
                        )
					),
                    'title_color_h'    => array(
						'type'          => 'color',
						'label'         => __('Hover Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'none',
                        )
					),
                    'title_margin'      => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 10,
                            'bottom'            => 10,
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-title-wrapper .pp-infobox-title',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-title-wrapper .pp-infobox-title',
                                    'property'          => 'margin-bottom',
                                    'unit'              => 'px'
                                ),
                            ),
                        )
                    ),
                )
            ),
            'description_style' => array(
                'title'             => __('Description', 'bb-powerpack'),
                'fields'            => array(
                    'text_color'    => array(
						'type'          => 'color',
						'label'         => __('Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-description',
                            'property'      => 'color',
                        )
					),
                    'text_color_h'    => array(
						'type'          => 'color',
						'label'         => __('Hover Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'none',
                        )
					),
                    'text_margin'       => array(
                        'type'              => 'pp-multitext',
                        'label'             => __('Margin', 'bb-powerpack'),
                        'description'       => 'px',
                        'default'           => array(
                            'top'               => 0,
                            'bottom'            => 0,
                        ),
                        'options'           => array(
                            'top'               => array(
                                'placeholder'       => __('Top', 'bb-powerpack'),
                                'tooltip'           => __('Top', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-up',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-description',
                                    'property'          => 'margin-top',
                                    'unit'              => 'px'
                                ),
                            ),
                            'bottom'            => array(
                                'placeholder'       => __('Bottom', 'bb-powerpack'),
                                'tooltip'           => __('Bottom', 'bb-powerpack'),
                                'icon'              => 'fa-long-arrow-down',
                                'preview'           => array(
                                    'selector'          => '.pp-infobox-description',
                                    'property'          => 'margin-bottom',
                                    'unit'              => 'px'
                                ),
                            ),
                        )
                    ),
                )
            ),
        ),
    ),
    'icon_styles'   => array(
        'title'     => __('Icon Style', 'bb-powerpack'),
        'sections'  => array(
            'icon_size'   => array(
                'title'     => __('Size', 'bb-powerpack'),
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
                            'rules'         => array(
                                array(
                                    'selector'      => '.pp-infobox-icon-inner span.pp-icon',
                                    'property'      => 'font-size',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-icon-inner span.pp-icon:before',
                                    'property'      => 'font-size',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
					),
                    'icon_width'    => array(
                        'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '3',
                        'default'       => '0',
						'label'         => __('Icon Box Size', 'bb-powerpack'),
                        'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'      => '.pp-infobox-icon-inner',
                                    'property'     => 'width',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-icon-inner',
                                    'property'     => 'height',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
                    ),
                    'image_width_type'  => array(
                        'type'              => 'pp-switch',
                        'label'             => __('Image Icon Size', 'bb-powerpack'),
                        'default'           => 'custom',
                        'options'           => array(
                            'default'           => __('Default', 'bb-powerpack'),
                            'custom'            => __('Custom', 'bb-powerpack'),
                        ),
                        'toggle'            => array(
                            'custom'            => array(
                                'fields'            => array('image_width')
                            )
                        )
                    ),
                    'image_width'    => array(
						'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '3',
                        'default'     => '100',
						'label'         => __('Image Icon Custom Size', 'bb-powerpack'),
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'      => '.pp-infobox-image',
                                    'property'     => 'width',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image',
                                    'property'     => 'height',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img',
                                    'property'     => 'width',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img',
                                    'property'     => 'height',
                                    'unit'          => 'px'
                                ),
                            ),
                        )
					),
                ),
            ),
            'icon_colors'   => array(
                'title'         => __('Colors', 'bb-powerpack'),
                'fields'        => array(
                    'icon_color'    => array(
                        'type'          => 'color',
                        'label'         => __('Color', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-icon-inner',
                            'property'      => 'color',
                        )
                    ),
                    'icon_color_hover'    => array(
                        'type'          => 'color',
                        'label'         => __('Hover Color', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-icon:hover-inner',
                            'property'      => 'color',
                        )
                    ),
                    'icon_background'    => array(
                        'type'          => 'color',
                        'label'         => __('Background', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-icon-inner',
                            'property'      => 'background',
                        )
                    ),
                    'icon_background_hover'    => array(
                        'type'          => 'color',
                        'label'         => __('Background Hover Color', 'bb-powerpack'),
                        'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-icon-inner:hover',
                            'property'      => 'background',
                        )
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
                    'icon_border_style'    => array(
                        'type'      => 'pp-switch',
                        'label'     => __('Border Style', 'bb-powerpack'),
                        'default'   => 'solid',
                        'options'   => array(
                            'solid'     => __('Solid', 'bb-powerpack'),
                            'dashed'     => __('Dashed', 'bb-powerpack'),
                            'dotted'     => __('Dotted', 'bb-powerpack'),
                            'double'     => __('Double', 'bb-powerpack'),
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
                            'rules'         => array(
                                array(
                                    'selector'      => '.pp-infobox-icon',
                                    'property'      => 'border-width',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img',
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
                                    'selector'      => '.pp-infobox-icon',
                                    'property'      => 'border-color',
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img',
                                    'property'      => 'border-color',
                                ),
                            ),
                        )
					),
                    'icon_border_color_hover'    => array(
						'type'          => 'color',
						'label'         => __('Border Hover Color', 'bb-powerpack'),
						'show_reset'    => true,
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'     => array(
                                array(
                                    'selector'      => '.pp-infobox-icon:hover',
                                    'property'      => 'border-color',
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img:hover',
                                    'property'      => 'border-color',
                                ),
                            ),
                        )
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
                                    'selector'      => '.pp-infobox-image img',
                                    'property'     => 'padding',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-icon',
                                    'property'     => 'padding',
                                    'unit'          => 'px'
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
                                    'selector'      => '.pp-infobox-icon',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-icon-inner',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-icon-inner span.pp-icon',
                                    'property'      => 'border-radius',
                                    'unit'          => 'px'
                                ),
                                array(
                                    'selector'      => '.pp-infobox-image img',
                                    'property'      => 'border-radius',
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
			'title_prefix'     => array(
                'title'     => __('Title Prefix', 'bb-powerpack'),
                'fields'    => array(
                    'title_prefix_font'          => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-infobox-title-prefix'
                        )
                    ),
                    'title_prefix_font_size'    => array(
						'type'          => 'unit',
                        'size'          => '5',
                        'maxlength'     => '2',
                        'default'       => '',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-prefix',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        ),
                        'help'          => __('Leave empty for default font size.', 'bb-powerpack')
					),
                    'title_prefix_line_height' => array(
                        'type'              => 'unit',
                        'label'             => __('Line Height', 'bb-powerpack'),
                        'default'           => '',
                        'size'              => 5,
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'           => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-prefix',
                            'property'      => 'line-height',
                        ),
                        'help'          => __('Leave empty for default line height.', 'bb-powerpack')
                    ),
                ),
            ),
            'general'     => array(
                'title'     => __('Title', 'bb-powerpack'),
                'fields'    => array(
                    'title_tag' => array(
                        'type'      => 'select',
                        'label'     => __('HTML Tag', 'bb-powerpack'),
                        'default'   => 'h4',
                        'options'   => array(
                            'h1'        => 'H1',
                            'h2'        => 'H2',
                            'h3'        => 'H3',
                            'h4'        => 'H4',
                            'h5'        => 'H5',
                            'h6'        => 'H6',
                            'p'         => 'p'
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
                            'selector'        => '.pp-infobox-title-wrapper .pp-infobox-title'
                        )
                    ),
                    'title_font_size'    => array(
						'type'          => 'unit',
                        'size'          => '5',
                        'maxlength'     => '2',
                        'default'       => '',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-wrapper .pp-infobox-title',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        ),
                        'help'          => __('Leave empty for default font size.', 'bb-powerpack')
					),
                    'title_line_height' => array(
                        'type'              => 'unit',
                        'label'             => __('Line Height', 'bb-powerpack'),
                        'default'           => '',
                        'size'              => 5,
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'           => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-title-wrapper .pp-infobox-title',
                            'property'      => 'line-height',
                        ),
                        'help'          => __('Leave empty for default line height.', 'bb-powerpack')
                    ),
                ),
            ),
            'text_typography'   => array(
                'title'     => __('Description', 'bb-powerpack'),
                'fields'    => array(
                    'text_font'          => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-infobox-description'
                        )
                    ),
                    'text_font_size'    => array(
						'type'          => 'unit',
                        'size'          => '5',
                        'maxlength'     => '2',
                        'default'       => '',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-description',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        ),
                        'help'          => __('Leave empty for default font size.', 'bb-powerpack')
					),
                    'text_line_height' => array(
                        'type'              => 'unit',
                        'label'             => __('Line Height', 'bb-powerpack'),
                        'default'           => '',
                        'size'              => 5,
                        'responsive'    => array(
                            'placeholder' => array(
									'default'    => '',
									'medium'     => '',
									'responsive' => '',
								)
                        ),
                        'preview'           => array(
                            'type'          => 'css',
                            'selector'      => '.pp-infobox-description',
                            'property'      => 'line-height',
                        ),
                        'help'          => __('Leave empty for default line height.', 'bb-powerpack')
                    ),
                )
            ),
            'button_typography'     => array(
                'title'     => __('Link', 'bb-powerpack'),
                'fields'    => array(
                    'pp_infobox_read_more_font'          => array(
                        'type'          => 'font',
                        'default'		=> array(
                            'family'		=> 'Default',
                            'weight'		=> 300
                        ),
                        'label'         => __('Font', 'bb-powerpack'),
                        'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.pp-more-link'
                        )
                    ),
                    'pp_infobox_read_more_font_size'    => array(
						'type'          => 'text',
                        'size'          => '5',
                        'maxlength'     => '2',
						'label'         => __('Font Size', 'bb-powerpack'),
						'description'   => 'px',
                        'preview'       => array(
                            'type'          => 'css',
                            'selector'      => '.pp-more-link',
                            'property'      => 'font-size',
                            'unit'          => 'px'
                        )
					),
                )
            ),
		)
	)
));
