<?php

/**
 * @class PPTwitterButtonsModule
 */
class PPTwitterButtonsModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          => __( 'Twitter Buttons', 'bb-powerpack' ),
			'description'   => __( 'A module to embed twitter buttons.', 'bb-powerpack' ),
			'group'         	=> pp_get_modules_group(),
			'category'			=> pp_get_modules_cat( 'creative' ),
			'dir'           	=> BB_POWERPACK_DIR . 'modules/pp-twitter-buttons/',
			'url'           	=> BB_POWERPACK_URL . 'modules/pp-twitter-buttons/',
			'editor_export' 	=> true, // Defaults to true and can be omitted.
			'enabled'       	=> true, // Defaults to true and can be omitted.
		));

		$this->add_js( 'pp-twitter-widgets' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('PPTwitterButtonsModule', array(
	'general'       => array( // Tab
		'title'         => __( 'General', 'bb-powerpack' ), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __( 'General', 'bb-powerpack' ), // Section Title
				'fields'        => array( // Section Fields
					'button_type'	=> array(
						'type'		=> 'select',
						'label'     => __( 'Type', 'bb-powerpack' ),
						'default'   => 'share',
						'options'   => array(
							'share'			=> __( 'Share', 'bb-powerpack' ),
							'follow'		=> __( 'Follow', 'bb-powerpack' ),
							'mention'		=> __( 'Mention', 'bb-powerpack' ),
							'hashtag'		=> __( 'Hashtag', 'bb-powerpack' ),
							'message'		=> __( 'Message', 'bb-powerpack' ),
						),
						'toggle'	=> array(
							'share'	=> array(
								'fields'	=> array( 'share_text', 'via', 'share_url' ),
							),
							'follow'	=> array(
								'fields'	=> array( 'profile' ),
							),
							'mention'	=> array(
								'fields'	=> array( 'profile', 'via', 'share_text', 'share_url', 'show_count' ),
							),
							'hashtag'	=> array(
								'fields'	=> array( 'hashtag_url', 'via', 'share_text', 'share_url' ),
							),
							'message'	=> array(
								'fields'	=> array( 'profile', 'recipient_id', 'default_text' ),
							),
						),
					),
					'profile'     	=> array(
						'type'          => 'text',
						'label'         => __( 'Profile URL or Username', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string', 'url' ),
					),
					'recipient_id'	=> array(
						'type'          => 'text',
						'label'         => __( 'Recipient ID', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string' ),
						'help'			=> __('Required. The user ID of the recipient @username that will receive the message. <br>Step 1 - Go to Twitter and sign in. Then click on profile button from header and open "Settings and privacy".<br> Step 2 - Click on the "Your Twitter data" tab from the sidebar and confirm your password.<br> Step 3 - Done. Now you can see your User ID, under the username.', 'bb-powerpack')
					),
					'default_text'	=> array(
						'type'          => 'text',
						'label'         => __( 'Default Text', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string', 'url' ),
						'help'			=> __('Optional. Use this field to pre-populate message text.', 'bb-powerpack')
					),
					'hashtag_url'	=> array(
						'type'          => 'text',
						'label'         => __( 'Hashtag URL or #hashtag', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string', 'url' ),
					),
					'via'			=> array(
						'type'          => 'text',
						'label'         => __( 'Via (twitter handler)', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string' ),
					),
					'share_text'     	=> array(
						'type'          => 'text',
						'label'         => __( 'Custom Share Text', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string' ),
					),
					'share_url'     	=> array(
						'type'          => 'text',
						'label'         => __( 'Custom Share URL', 'bb-powerpack' ),
						'default'       => '',
						'connections'	=> array( 'string' ),
					),
					'show_count'	=> array(
						'type'		=> 'pp-switch',
						'label'     => __( 'Show Count', 'bb-powerpack' ),
						'default'   => 'no',
						'options'   => array(
							'yes'		=> __( 'Yes', 'bb-powerpack' ),
							'no'		=> __( 'No', 'bb-powerpack' ),
						),
					),
					'large_button'	=> array(
						'type'		=> 'pp-switch',
						'label'     => __( 'Large Button?', 'bb-powerpack' ),
						'default'   => 'no',
						'options'   => array(
							'yes'		=> __( 'Yes', 'bb-powerpack' ),
							'no'		=> __( 'No', 'bb-powerpack' ),
						),
					),
				),
			),
		),
	),
));
