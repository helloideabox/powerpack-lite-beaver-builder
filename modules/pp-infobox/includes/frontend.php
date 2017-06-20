<?php

$infobox_class = 'pp-infobox-wrap';

?>
<div class="<?php echo $infobox_class; ?>">
	<?php

	$layout = $settings->layouts;
	switch ( $layout ) {
		case '0': ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
		<div class="pp-infobox layout-0 clearfix">
			<div class="pp-heading-wrapper">
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					<a class="pp-more-link pp-title-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
				<?php } ?>
				<div class="pp-infobox-title-wrapper">
					<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
				</div>
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					</a>
				<?php } ?>
			</div>
			<div class="pp-infobox-description">
				<?php echo $settings->description; ?>
				<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
					<p><a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a></p>
				<?php } ?>
			</div>
		</div>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			</a>
		<?php }
		break;

		case '1': ?>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
			<?php } ?>
			<div class="pp-infobox layout-1 clearfix">
				<div class="pp-heading-wrapper">
					<div class="pp-icon-wrapper animated">
						<?php if ( $settings->icon_type == 'icon' ) { ?>
							<div class="pp-infobox-icon">
								<div class="pp-infobox-icon-inner">
									<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
								</div>
							</div>
						<?php } else { ?>
							<?php if ( isset( $settings->image_select_src ) ) { ?>
								<div class="pp-infobox-image">
	  								<img src="<?php echo $settings->image_select_src; ?>">
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
						<a class="pp-more-link pp-title-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
					<?php } ?>
					<div class="pp-infobox-title-wrapper">
						<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
					</div>
					<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
						</a>
					<?php } ?>
				</div>
				<div class="pp-infobox-description">
					<?php echo $settings->description; ?>
					<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
						<p><a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a></p>
					<?php } ?>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }
			break;

		case '2': ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
			<div class="pp-infobox layout-2 clearfix">
				<div class="pp-heading-wrapper">
					<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
						<a class="pp-more-link pp-title-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
					<?php } ?>
					<div class="pp-infobox-title-wrapper">
						<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
					</div>
					<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
						</a>
					<?php } ?>
					<div class="pp-icon-wrapper animated">
						<?php if( $settings->icon_type == 'icon' ) { ?>
							<div class="pp-infobox-icon">
								<div class="pp-infobox-icon-inner">
									<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
								</div>
							</div>
						<?php } else { ?>
							<div class="pp-infobox-image">
								<?php if ( isset( $settings->image_select_src ) ) { ?>
									<img src="<?php echo $settings->image_select_src; ?>">
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="pp-infobox-description">
					<?php echo $settings->description; ?>
					<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
						<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
					<?php } ?>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }

			break;

		case '3': ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
			<div class="pp-infobox layout-3 clearfix">
				<div class="layout-3-wrapper">
					<div class="pp-icon-wrapper animated">
						<?php if( $settings->icon_type == 'icon' ) { ?>
							<div class="pp-infobox-icon">
								<div class="pp-infobox-icon-inner">
									<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
								</div>
							</div>
						<?php } else { ?>
							<div class="pp-infobox-image">
								<?php if ( isset( $settings->image_select_src ) ) { ?>
								  <img src="<?php echo $settings->image_select_src; ?>">
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<div class="pp-heading-wrapper">
							<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
								<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
							<?php } ?>
								<div class="pp-infobox-title-wrapper">
									<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
								</div>
							<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
								</a>
							<?php } ?>
						<div class="pp-infobox-description">
							<?php echo $settings->description; ?>
							<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
								<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }
			break;

		case '4': ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
			<div class="pp-infobox layout-4 clearfix">
				<div class="layout-4-wrapper">
					<div class="pp-heading-wrapper">
							<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
								<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
							<?php } ?>
								<div class="pp-infobox-title-wrapper">
									<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
								</div>
							<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
								</a>
							<?php } ?>
						<div class="pp-infobox-description">
							<?php echo $settings->description; ?>
							<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
								<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="pp-icon-wrapper animated">
						<?php if( $settings->icon_type == 'icon' ) { ?>
							<div class="pp-infobox-icon">
								<div class="pp-infobox-icon-inner">
									<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
								</div>
							</div>
						<?php } else { ?>
							<div class="pp-infobox-image">
								<?php if ( isset( $settings->image_select_src ) ) { ?>
								  <img src="<?php echo $settings->image_select_src; ?>">
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }
			break;

		case '5': ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
			<div class="pp-infobox layout-5 clearfix">
				<div class="pp-icon-wrapper animated">
					<?php if( $settings->icon_type == 'icon' ) { ?>
						<div class="pp-infobox-icon">
							<div class="pp-infobox-icon-inner">
								<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
							</div>
						</div>
					<?php } else { ?>
						<div class="pp-infobox-image">
							<?php if ( isset( $settings->image_select_src ) ) { ?>
							  <img src="<?php echo $settings->image_select_src; ?>">
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
				<?php } ?>
				<div class="pp-infobox-title-wrapper">
					<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
				</div>
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					</a>
				<?php } ?>
				<div class="pp-infobox-description">
					<?php echo $settings->description; ?>
					<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
						<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
					<?php } ?>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }
			break;

		default: ?>
		<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
			<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
		<?php } ?>
			<div class="pp-infobox clearfix">
				<div class="pp-icon-wrapper animated">
					<?php if( $settings->icon_type == 'icon' ) { ?>
						<div class="pp-infobox-icon">
							<div class="pp-infobox-icon-inner">
								<span class="pp-icon <?php echo $settings->icon_select; ?>"></span>
							</div>
						</div>
					<?php } else { ?>
						<div class="pp-infobox-image">
							<?php if ( isset( $settings->image_select_src ) ) { ?>
							  <img src="<?php echo $settings->image_select_src; ?>">
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					<a class="pp-more-link pp-title-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>">
				<?php } ?>
				<div class="pp-infobox-title-wrapper">
					<<?php echo $settings->title_tag; ?> class="pp-infobox-title"><?php echo $settings->title; ?></<?php echo $settings->title_tag; ?>>
				</div>
				<?php if( $settings->pp_infobox_link_type == 'title' ) { ?>
					</a>
				<?php } ?>
				<div class="pp-infobox-description">
					<?php echo $settings->description; ?>
					<?php if( $settings->pp_infobox_link_type == 'read_more' || $settings->pp_infobox_link_type == 'button' ) { ?>
						<a class="pp-more-link" href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>"><?php echo $settings->pp_infobox_read_more_text; ?></a>
					<?php } ?>
				</div>
			</div>
			<?php if( $settings->pp_infobox_link_type == 'box' ) { ?>
				</a>
			<?php }
			break;
	}
	?>

</div>
