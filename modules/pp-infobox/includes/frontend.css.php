.fl-node-<?php echo $id; ?> .pp-infobox-title-wrapper .pp-infobox-title {
	<?php if( $settings->title_color ) { ?>color: #<?php echo $settings->title_color; ?>;<?php } ?>
	<?php if( $settings->title_font['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $settings->title_font ); ?><?php } ?>
	<?php if( $settings->title_font_size ) { ?>font-size: <?php echo $settings->title_font_size; ?>px;<?php } ?>
	line-height: <?php echo $settings->title_line_height; ?>;
	margin-top: <?php echo $settings->title_margin['top']; ?>px;
	margin-bottom: <?php echo $settings->title_margin['bottom']; ?>px;
}
.fl-node-<?php echo $id; ?> .pp-infobox-description {
	<?php if( $settings->text_color ) { ?>color: #<?php echo $settings->text_color; ?>;<?php } ?>
	<?php if( $settings->text_font['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $settings->text_font ); ?><?php } ?>
	<?php if( $settings->text_font_size ) { ?>font-size: <?php echo $settings->text_font_size; ?>px;<?php } ?>
	line-height: <?php echo $settings->text_line_height; ?>;
	margin-top: <?php echo $settings->text_margin['top']; ?>px;
	margin-bottom: <?php echo $settings->text_margin['bottom']; ?>px;
}
.fl-node-<?php echo $id; ?> .pp-infobox:hover .pp-infobox-title {
	<?php if ( !empty( $settings->title_color_h ) ) { ?>
		color: #<?php echo $settings->title_color_h; ?>;
	<?php } ?>
}
.fl-node-<?php echo $id; ?> .pp-infobox:hover .pp-infobox-description {
	<?php if ( !empty( $settings->text_color_h ) ) { ?>
		color: #<?php echo $settings->text_color_h; ?>;
	<?php } ?>
}
<?php if( $settings->icon_type == 'icon' ) { ?>
	.fl-node-<?php echo $id; ?> .pp-infobox-icon {
		<?php if( $settings->icon_border_radius ) { ?>border-radius: <?php echo $settings->icon_border_radius; ?>px;<?php } ?>
		<?php if( $settings->show_border == 'yes' ) { ?>
			<?php if( $settings->icon_border_color ) { ?>border-color: #<?php echo $settings->icon_border_color; ?>;<?php } ?>
			<?php if( $settings->icon_border_style ) { ?>border-style: <?php echo $settings->icon_border_style; ?>;<?php } ?>
			<?php if( $settings->icon_border_width ) { ?>border-width: <?php echo $settings->icon_border_width; ?>px;<?php } ?>
		<?php } ?>
		<?php if( $settings->icon_box_size ) { ?>padding: <?php echo $settings->icon_box_size; ?>px;<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .pp-infobox-icon-inner  {
		<?php if( $settings->icon_width ) { ?>height: <?php echo $settings->icon_width; ?>px;<?php } ?>
		<?php if( $settings->icon_width ) { ?>width: <?php echo $settings->icon_width; ?>px;<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .pp-infobox-icon-inner span.pp-icon {
		<?php if( $settings->icon_background ) { ?>background: #<?php echo $settings->icon_background; ?>;<?php } ?>
		<?php if( $settings->icon_border_radius ) { ?>border-radius: <?php echo $settings->icon_border_radius; ?>px;<?php } ?>
		<?php if( $settings->icon_color ) { ?>color: #<?php echo $settings->icon_color; ?>;<?php } ?>
		<?php if( $settings->icon_font_size ) { ?>font-size: <?php echo $settings->icon_font_size; ?>px;<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .pp-infobox-icon-inner span.pp-icon,
	.fl-node-<?php echo $id; ?> .pp-infobox-icon-inner span:before {
		<?php if( $settings->icon_font_size ) { ?>font-size: <?php echo $settings->icon_font_size; ?>px;<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .pp-infobox:hover .pp-infobox-icon {
		<?php if( $settings->show_border == 'yes' ) { ?>
			<?php if( $settings->icon_border_color_hover ) { ?>border-color: #<?php echo $settings->icon_border_color_hover; ?>;<?php } ?>
		<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .pp-infobox:hover .pp-infobox-icon span.pp-icon {
		<?php if( $settings->icon_background_hover ) { ?>background: #<?php echo $settings->icon_background_hover; ?>;<?php } ?>
		<?php if( $settings->icon_color_hover ) { ?>color: #<?php echo $settings->icon_color_hover; ?>;<?php } ?>
	}
<?php } ?>
<?php if( $settings->icon_type == 'image' ) { ?>
	.fl-node-<?php echo $id; ?> .pp-infobox-image img {
		<?php if( $settings->icon_border_radius ) { ?>border-radius: <?php echo $settings->icon_border_radius; ?>px;<?php } ?>
		<?php if( $settings->show_border == 'yes' ) { ?>
			<?php if( $settings->icon_border_color ) { ?>border-color: #<?php echo $settings->icon_border_color; ?>;<?php } ?>
			<?php if( $settings->icon_border_style ) { ?>border-style: <?php echo $settings->icon_border_style; ?>;<?php } ?>
			<?php if( $settings->icon_border_width ) { ?>border-width: <?php echo $settings->icon_border_width; ?>px;<?php } ?>
		<?php } ?>
		height: auto;
		<?php if( $settings->icon_box_size ) { ?>padding: <?php echo $settings->icon_box_size; ?>px;<?php } ?>
		<?php if( $settings->image_width_type == 'custom' && $settings->image_width ) { ?>width: <?php echo $settings->image_width; ?>px;<?php } ?>
		<?php if( $settings->image_width_type == 'default' ) { ?>width: auto;<?php } ?>
		max-width: none;
	}
	.fl-node-<?php echo $id; ?> .pp-infobox:hover .pp-infobox-image img {
		<?php if( $settings->show_border == 'yes' ) { ?>
			<?php if( $settings->icon_border_color_hover ) { ?>border-color: #<?php echo $settings->icon_border_color_hover; ?>;<?php } ?>
		<?php } ?>
	}
<?php } ?>

.fl-node-<?php echo $id; ?> .pp-infobox {
	<?php if( $settings->box_background ) { ?>background: #<?php echo $settings->box_background; ?>;<?php } ?>
	<?php if( $settings->box_border_color ) { ?>border-color: #<?php echo $settings->box_border_color; ?>;<?php } ?>
	<?php if( $settings->box_border_style ) { ?>border-style: <?php echo $settings->box_border_style; ?>;<?php } ?>
	<?php if( $settings->box_border_radius ) { ?>border-radius: <?php echo $settings->box_border_radius; ?>px;<?php } ?>
	<?php if( $settings->box_border_width ) { ?>border-width: <?php echo $settings->box_border_width; ?>px;<?php } ?>
	<?php if( $settings->padding_top >= 0 && '' != $settings->padding_top ) { ?>
		padding-top: <?php echo $settings->padding_top; ?>px;
		padding-bottom: <?php echo $settings->padding_top; ?>px;
	<?php } ?>
	<?php if( $settings->padding_left >= 0 && '' != $settings->padding_left ) { ?>
		padding-left: <?php echo $settings->padding_left; ?>px;
		padding-right: <?php echo $settings->padding_left; ?>px;
	<?php } ?>
	<?php if ( $settings->alignment ) { ?>text-align: <?php echo $settings->alignment; ?>;<?php } ?>
}
.fl-node-<?php echo $id; ?> .pp-infobox:hover {
	<?php if( $settings->box_background_hover ) { ?>background: #<?php echo $settings->box_background_hover; ?>;<?php } ?>
}

<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
	.fl-node-<?php echo $id; ?> .pp-infobox .pp-more-link {
		<?php if ( $settings->pp_infobox_link_type == 'button' ) { ?>
			display: block;
		<?php } ?>
		<?php if( $settings->pp_infobox_read_more_color ) { ?>color: #<?php echo $settings->pp_infobox_read_more_color; ?>;<?php } ?>
		<?php if( $settings->pp_infobox_link_type == 'button' && $settings->button_bg_color != '' ) { ?>
			background-color: #<?php echo $settings->button_bg_color; ?>;
		<?php } ?>
		<?php if( $settings->pp_infobox_read_more_font['family'] != 'Default' ) { ?><?php FLBuilderFonts::font_css( $settings->pp_infobox_read_more_font ); ?>;<?php } ?>
		<?php if( $settings->pp_infobox_read_more_font_size ) { ?>font-size: <?php echo $settings->pp_infobox_read_more_font_size; ?>px;<?php } ?>
		<?php if( $settings->pp_infobox_link_type == 'button' ) { ?>
			border-radius: <?php echo $settings->button_radius; ?>px;
			padding-top: <?php echo $settings->button_padding['top']; ?>px;
			padding-bottom: <?php echo $settings->button_padding['bottom']; ?>px;
			padding-left: <?php echo $settings->button_padding['left']; ?>px;
			padding-right: <?php echo $settings->button_padding['right']; ?>px;
			text-decoration: none;
		<?php } ?>
		margin-top: <?php echo $settings->read_more_margin['top']; ?>px;
		margin-bottom: <?php echo $settings->read_more_margin['bottom']; ?>px;
	}
	.fl-node-<?php echo $id; ?> .pp-infobox .pp-more-link:hover {
		<?php if( $settings->pp_infobox_read_more_color_hover ) { ?>color: #<?php echo $settings->pp_infobox_read_more_color_hover; ?>;<?php } ?>
		<?php if( $settings->pp_infobox_link_type == 'button' && $settings->button_bg_hover_color != '' ) { ?>
			background-color: #<?php echo $settings->button_bg_hover_color; ?>;
		<?php } ?>
	}
<?php } ?>

.fl-node-<?php echo $id; ?> .pp-infobox .animated {
	<?php if( $settings->animation_duration ) { ?>-webkit-animation-duration: <?php echo $settings->animation_duration; ?>ms;<?php } ?>
	<?php if( $settings->animation_duration ) { ?>-moz-animation-duration: <?php echo $settings->animation_duration; ?>ms;<?php } ?>
	<?php if( $settings->animation_duration ) { ?>-o-animation-duration: <?php echo $settings->animation_duration; ?>ms;<?php } ?>
	<?php if( $settings->animation_duration ) { ?>-ms-animation-duration: <?php echo $settings->animation_duration; ?>ms;<?php } ?>
	<?php if( $settings->animation_duration ) { ?>animation-duration: <?php echo $settings->animation_duration; ?>ms;<?php } ?>
}

.fl-node-<?php echo $id; ?> .pp-infobox-wrap .layout-3 .pp-icon-wrapper {
	margin-right: <?php echo $settings->space_bt_icon_text; ?>px;
}

.fl-node-<?php echo $id; ?> .pp-infobox-wrap .layout-4 .pp-icon-wrapper {
	margin-left: <?php echo $settings->space_bt_icon_text; ?>px;
}

@media only screen and (max-width: <?php echo $global_settings->medium_breakpoint; ?>px) {
	.fl-node-<?php echo $id; ?> .pp-infobox-title-wrapper .pp-infobox-title {
		<?php if( $settings->title_font_size_medium ) { ?>font-size: <?php echo $settings->title_font_size_medium; ?>px;<?php } ?>
		line-height: <?php echo $settings->title_line_height_medium; ?>;
	}
	.fl-node-<?php echo $id; ?> .pp-infobox-description {
		<?php if( $settings->text_font_size_medium ) { ?>font-size: <?php echo $settings->text_font_size_medium; ?>px;<?php } ?>
		line-height: <?php echo $settings->text_line_height_medium; ?>;
	}
}

@media only screen and (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	.fl-node-<?php echo $id; ?> .pp-infobox-title-wrapper .pp-infobox-title {
		<?php if( $settings->title_font_size_responsive ) { ?>font-size: <?php echo $settings->title_font_size_responsive; ?>px;<?php } ?>
		line-height: <?php echo $settings->title_line_height_responsive; ?>;
	}
	.fl-node-<?php echo $id; ?> .pp-infobox-description {
		<?php if( $settings->text_font_size_responsive ) { ?>font-size: <?php echo $settings->text_font_size_responsive; ?>px;<?php } ?>
		line-height: <?php echo $settings->text_line_height_responsive; ?>;
	}
}
