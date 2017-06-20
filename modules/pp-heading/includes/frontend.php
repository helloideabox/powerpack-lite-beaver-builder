<div class="pp-heading-content">
	<?php if ( $settings->heading_separator_postion == 'top' && $settings->heading_separator != 'no_spacer' && $settings->heading_separator != 'inline' ) { ?>
		<div class="pp-heading-separator <?php echo $settings->heading_separator; ?> pp-<?php echo $settings->heading_alignment; ?>">
			<?php if ( $settings->heading_separator == 'line_with_icon' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select && $settings->heading_icon_select == 'font_icon_select' ) { ?>
					                <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						    <?php if( $settings->heading_custom_icon_select && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				                    <img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'font_icon_select' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select ) { ?>
				                <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'line_only' ) { ?>
				<span class="pp-separator-line"></span>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				<span class="separator-image">
					<img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
				</span>
			<?php } ?>

		</div>
	<?php } ?>
	<div class="pp-heading <?php if( $settings->heading_separator == 'inline' ) { echo 'pp-separator-' . $settings->heading_separator; } ?> pp-<?php echo $settings->heading_alignment; ?>">

		<<?php echo $settings->heading_tag; ?> class="heading-title">

			<?php if( !empty( $settings->heading_link ) ) : ?>
				<a class="pp-heading-link" href="<?php echo $settings->heading_link; ?>" target="<?php echo $settings->heading_link_target; ?>">
			<?php endif; ?>

			<span class="title-text pp-primary-title"><?php echo $settings->heading_title; ?></span>
			<?php if ( isset($settings->dual_heading) && $settings->dual_heading == 'yes' ) { ?>
			<span class="title-text pp-secondary-title"><?php echo $settings->heading_title2; ?></span>
			<?php } ?>

			<?php if( !empty( $settings->heading_link ) ) : ?>
				</a>
			<?php endif; ?>

		</<?php echo $settings->heading_tag; ?>>

	</div>
	<?php if ( $settings->heading_separator_postion == 'middle' && $settings->heading_separator != 'no_spacer' && $settings->heading_separator != 'inline' ) { ?>
		<div class="pp-heading-separator <?php echo $settings->heading_separator; ?> pp-<?php echo $settings->heading_alignment; ?>">

			<?php if ( $settings->heading_separator == 'line_with_icon' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select && $settings->heading_icon_select == 'font_icon_select' ) { ?>
					            <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						    <?php if( $settings->heading_custom_icon_select && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				                <img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'font_icon_select' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select ) { ?>
				                <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'line_only' ) { ?>
				<span class="pp-separator-line"></span>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				<span class="separator-image">
					<img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
				</span>
			<?php } ?>

		</div>
	<?php } ?>
	<div class="pp-sub-heading">
		<?php echo $settings->heading_sub_title; ?>
	</div>

	<?php if ( $settings->heading_separator_postion == 'bottom' && $settings->heading_separator != 'no_spacer' && $settings->heading_separator != 'inline' ) { ?>
		<div class="pp-heading-separator <?php echo $settings->heading_separator; ?> pp-<?php echo $settings->heading_alignment; ?>">

			<?php if ( $settings->heading_separator == 'line_with_icon' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select && $settings->heading_icon_select == 'font_icon_select' ) { ?>
					                <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						    <?php if( $settings->heading_custom_icon_select && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				                    <img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'font_icon_select' ) { ?>
				<div class="pp-heading-separator-wrapper">
					<div class="pp-heading-separator-align">
						<div class="pp-heading-separator-icon">
							<?php if( $settings->heading_font_icon_select ) { ?>
				                <i class="<?php echo $settings->heading_font_icon_select; ?> pp-separator-font-icon"></i>
						    <?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'line_only' ) { ?>
				<span class="pp-separator-line"></span>
			<?php } ?>

			<?php if ( $settings->heading_separator == 'icon_only' && $settings->heading_icon_select == 'custom_icon_select' ) { ?>
				<span class="separator-image">
					<img class="heading-icon-image" src="<?php echo $settings->heading_custom_icon_select_src; ?>" />
				</span>
			<?php } ?>

		</div>
	<?php } ?>
</div>
