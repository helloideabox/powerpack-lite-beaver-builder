
div.fl-node-<?php echo $id; ?> .pp-heading-content {
    text-align: <?php echo $settings->heading_alignment; ?>;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading {
    <?php if ( $settings->heading_title == '' && ! FLBuilderModel::is_builder_active() ) { ?>
    display: none;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title {
    <?php if( $settings->heading_font['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->heading_font ); ?>
    <?php } ?>
    <?php if( $settings->heading_font_size >= 0 && $settings->heading_font_size_select == 'custom' ) { ?>
    font-size: <?php echo $settings->heading_font_size; ?>px;
    <?php } ?>
    <?php if ( $settings->heading_letter_space != '' ) { ?>
    letter-spacing: <?php echo $settings->heading_letter_space; ?>px;
    <?php } ?>
    <?php if( $settings->heading_line_height_n >= 0 ) { ?>
    line-height: <?php echo $settings->heading_line_height_n;?>;
    <?php } ?>
    margin-top: <?php echo $settings->heading_top_margin; ?>px;
    margin-bottom: <?php echo $settings->heading_bottom_margin; ?>px;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title span.pp-primary-title {
    <?php if( $settings->heading_color ) { ?>
    color: #<?php echo $settings->heading_color; ?>;
    <?php } ?>
    <?php if( $settings->heading_bg_color ) { ?>
    background-color: #<?php echo $settings->heading_bg_color; ?>;
    <?php } ?>
    <?php if ( 'none' != $settings->heading_border_style ) { ?>
    border-top: <?php echo $settings->heading_border['top']; ?>px <?php echo $settings->heading_border_style; ?> <?php echo '' != $settings->heading_border_color ? '#'.$settings->heading_border_color : 'transparent'; ?>;
    border-bottom: <?php echo $settings->heading_border['bottom']; ?>px <?php echo $settings->heading_border_style; ?> <?php echo '' != $settings->heading_border_color ? '#'.$settings->heading_border_color : 'transparent'; ?>;
    border-left: <?php echo $settings->heading_border['left']; ?>px <?php echo $settings->heading_border_style; ?> <?php echo '' != $settings->heading_border_color ? '#'.$settings->heading_border_color : 'transparent'; ?>;
    border-right: <?php echo $settings->heading_border['right']; ?>px <?php echo $settings->heading_border_style; ?> <?php echo '' != $settings->heading_border_color ? '#'.$settings->heading_border_color : 'transparent'; ?>;
    <?php } ?>
    padding-top: <?php echo $settings->heading_padding['top']; ?>px;
    padding-bottom: <?php echo $settings->heading_padding['bottom']; ?>px;
    padding-left: <?php echo $settings->heading_padding['left']; ?>px;
    padding-right: <?php echo $settings->heading_padding['right']; ?>px;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title span.pp-secondary-title {
    <?php if( $settings->heading2_font['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->heading2_font ); ?>
    <?php } ?>
    <?php if( $settings->heading2_font_size >= 0 && $settings->heading2_font_size_select == 'custom' ) { ?>
    font-size: <?php echo $settings->heading2_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->heading2_color ) { ?>
    color: #<?php echo $settings->heading2_color; ?>;
    <?php } ?>
    <?php if( $settings->heading2_bg_color ) { ?>
    background-color: #<?php echo $settings->heading2_bg_color; ?>;
    <?php } ?>
    <?php if ( $settings->heading2_letter_space != '' ) { ?>
    letter-spacing: <?php echo $settings->heading2_letter_space; ?>px;
    <?php } ?>
    <?php if( $settings->heading2_line_height_n >= 0 ) { ?>
    line-height: <?php echo $settings->heading2_line_height_n;?>;
    <?php } ?>
    <?php if ( 'none' != $settings->heading2_border_style ) { ?>
    border-top: <?php echo $settings->heading2_border['top']; ?>px <?php echo $settings->heading2_border_style; ?> <?php echo '' != $settings->heading2_border_color ? '#'.$settings->heading2_border_color : 'transparent'; ?>;
    border-bottom: <?php echo $settings->heading2_border['bottom']; ?>px <?php echo $settings->heading2_border_style; ?> <?php echo '' != $settings->heading2_border_color ? '#'.$settings->heading2_border_color : 'transparent'; ?>;
    border-left: <?php echo $settings->heading2_border['left']; ?>px <?php echo $settings->heading2_border_style; ?> <?php echo '' != $settings->heading2_border_color ? '#'.$settings->heading2_border_color : 'transparent'; ?>;
    border-right: <?php echo $settings->heading2_border['right']; ?>px <?php echo $settings->heading2_border_style; ?> <?php echo '' != $settings->heading2_border_color ? '#'.$settings->heading2_border_color : 'transparent'; ?>;
    <?php } ?>
    padding-top: <?php echo $settings->heading2_padding['top']; ?>px;
    padding-bottom: <?php echo $settings->heading2_padding['bottom']; ?>px;
    padding-left: <?php echo $settings->heading2_padding['left']; ?>px;
    padding-right: <?php echo $settings->heading2_padding['right']; ?>px;
    margin-left: <?php echo $settings->heading2_left_margin; ?>px;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title span.title-text {
    display: inline-block;
}

<?php if ( $settings->dual_heading == 'no' ) { ?>
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading.pp-separator-inline .heading-title span {
    <?php if( $settings->font_title_line_space ) { ?>
    padding-right: <?php echo $settings->font_title_line_space; ?>px;
    <?php } ?>
    <?php if( $settings->font_title_line_space ) { ?>
    padding-left: <?php echo $settings->font_title_line_space; ?>px;
    <?php } ?>
}
<?php } else { ?>
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading.pp-separator-inline .heading-title span.pp-primary-title {
    <?php if( $settings->font_title_line_space ) { ?>
    padding-left: <?php echo $settings->font_title_line_space; ?>px;
    <?php } ?>
}
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading.pp-separator-inline .heading-title span.pp-secondary-title {
    <?php if( $settings->font_title_line_space ) { ?>
    padding-right: <?php echo $settings->font_title_line_space; ?>px;
    <?php } ?>
}
<?php } ?>

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading.pp-separator-inline .heading-title <?php if ( $settings->dual_heading == 'no' ) { ?>span<?php } else { ?>span.pp-primary-title<?php } ?>:before {
    <?php if( $settings->line_width >= 0 ) { ?>
    width: <?php echo $settings->line_width; ?>px;
    <?php } ?>
    <?php if( $settings->heading_line_style ) { ?>
    border-style: <?php echo $settings->heading_line_style; ?>;
    <?php } ?>
    <?php if( $settings->line_color ) { ?>
    border-color: #<?php echo $settings->line_color; ?>;
    <?php } ?>
    <?php if( $settings->line_height >= 0 ) { ?>
    border-bottom-width: <?php echo $settings->line_height; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading.pp-separator-inline .heading-title <?php if ( $settings->dual_heading == 'no' ) { ?>span<?php } else { ?>span.pp-secondary-title<?php } ?>:after {
    <?php if( $settings->line_width >= 0 ) { ?>
    width: <?php echo $settings->line_width; ?>px;
    <?php } ?>
    <?php if( $settings->heading_line_style ) { ?>
    border-style: <?php echo $settings->heading_line_style; ?>;
    <?php } ?>
    <?php if( $settings->line_color ) { ?>
    border-color: #<?php echo $settings->line_color; ?>;
    <?php } ?>
    <?php if( $settings->line_height >= 0 ) { ?>
    border-bottom-width: <?php echo $settings->line_height; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-sub-heading {
    <?php if( $settings->sub_heading_font['family'] != 'Default' ) { ?>
    <?php FLBuilderFonts::font_css( $settings->sub_heading_font ); ?>
    <?php } ?>
    <?php if( $settings->sub_heading_font_size_select == 'custom' ) { ?>
    font-size: <?php echo $settings->sub_heading_font_size; ?>px;
    <?php } ?>
    <?php if( $settings->sub_heading_color ) { ?>
    color: #<?php echo $settings->sub_heading_color; ?>;
    <?php } ?>
    <?php if( $settings->sub_heading_line_height_n >= 0 ) { ?>
    line-height: <?php echo $settings->sub_heading_line_height_n;?>;
    <?php } ?>
    margin-top: <?php echo $settings->sub_heading_top_margin; ?>px;
    margin-bottom: <?php echo $settings->sub_heading_bottom_margin; ?>px;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-sub-heading p:last-of-type {
    margin-bottom: 0;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-align {
    <?php if( $settings->heading_alignment ) { ?>
    text-align: <?php echo $settings->heading_alignment; ?>;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon:before {
    <?php if( $settings->font_icon_line_space >= 0 ) { ?>
    margin-right: <?php echo $settings->font_icon_line_space; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon:after {
    <?php if( $settings->font_icon_line_space >= 0 ) { ?>
    margin-left: <?php echo $settings->font_icon_line_space; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon.pp-left:after {
    left: 1%;
}
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon.pp-right:before {
    right: 1%;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon:before,
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon:after {
    <?php if( $settings->line_width >= 0 ) { ?>
    width: <?php echo $settings->line_width; ?>px;
    <?php } ?>
    <?php if( $settings->heading_line_style ) { ?>
    border-style: <?php echo $settings->heading_line_style; ?>;
    <?php } ?>
    <?php if( $settings->line_color ) { ?>
    border-color: #<?php echo $settings->line_color; ?>;
    <?php } ?>
    <?php if( $settings->line_height >= 0 ) { ?>
    border-bottom-width: <?php echo $settings->line_height; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator img.heading-icon-image {
    <?php if( $settings->heading_icon_select == 'custom_icon_select' ) { ?>
        <?php if( $settings->font_icon_font_size >= 0 ) { ?>
        width: <?php echo $settings->font_icon_font_size; ?>px;
        <?php } ?>
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-separator-line {
    <?php if( $settings->heading_line_style ) { ?>
    border-bottom-style: <?php echo $settings->heading_line_style; ?>;
    <?php } ?>
    <?php if( $settings->line_height >= 0 ) { ?>
    border-bottom-width: <?php echo $settings->line_height; ?>px;
    <?php } ?>
    <?php if( $settings->line_color ) { ?>
    border-bottom-color: #<?php echo $settings->line_color; ?>;
    <?php } ?>
    <?php if( $settings->line_width >= 0 ) { ?>
    width: <?php echo $settings->line_width; ?>px;
    <?php } ?>
    <?php if( $settings->heading_alignment == 'right' ) { ?>
    float: right;
    <?php } else if( $settings->heading_alignment == 'left' ) { ?>
    float: left;
    <?php } else { ?>
    margin: 0 auto;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator {
    <?php if( $settings->font_icon_color ) { ?>
    color: #<?php echo $settings->font_icon_color; ?>;
    <?php } ?>
    margin-top: <?php echo $settings->separator_heading_top_margin; ?>px;
    margin-bottom: <?php echo $settings->separator_heading_bottom_margin; ?>px;
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-icon {
    display: inline-block;
    text-align: center;
    <?php if( $settings->font_icon_bg_color ) { ?>
    background: #<?php echo $settings->font_icon_bg_color; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->font_icon_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->font_icon_border_width; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_border_style ) { ?>
    border-style: <?php echo $settings->font_icon_border_style; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_border_color ) { ?>
    border-color: #<?php echo $settings->font_icon_border_color; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_padding_top >= 0 ) { ?>
    padding-top: <?php echo $settings->font_icon_padding_top; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_bottom >= 0 ) { ?>
    padding-bottom: <?php echo $settings->font_icon_padding_bottom; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_left >= 0 ) { ?>
    padding-left: <?php echo $settings->font_icon_padding_left; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_right >= 0 ) { ?>
    padding-right: <?php echo $settings->font_icon_padding_right; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-icon i,
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-icon i:before {
    <?php if( $settings->heading_icon_select == 'font_icon_select' ) { ?>
        <?php if( $settings->font_icon_font_size >= 0 ) { ?>
        font-size: <?php echo $settings->font_icon_font_size; ?>px;
        <?php } ?>
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.icon_only span {
    <?php if( $settings->font_icon_bg_color ) { ?>
    background: #<?php echo $settings->font_icon_bg_color; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->font_icon_border_radius; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_border_width >= 0 ) { ?>
    border-width: <?php echo $settings->font_icon_border_width; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_border_style ) { ?>
    border-style: <?php echo $settings->font_icon_border_style; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_border_color ) { ?>
    border-color: #<?php echo $settings->font_icon_border_color; ?>;
    <?php } ?>
    <?php if( $settings->font_icon_padding_top >= 0 ) { ?>
    padding-top: <?php echo $settings->font_icon_padding_top; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_bottom >= 0 ) { ?>
    padding-bottom: <?php echo $settings->font_icon_padding_bottom; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_left >= 0 ) { ?>
    padding-left: <?php echo $settings->font_icon_padding_left; ?>px;
    <?php } ?>
    <?php if( $settings->font_icon_padding_right >= 0 ) { ?>
    padding-right: <?php echo $settings->font_icon_padding_right; ?>px;
    <?php } ?>
}

div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.icon_only img,
div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator.line_with_icon img {
    <?php if( $settings->font_icon_border_radius >= 0 ) { ?>
    border-radius: <?php echo $settings->font_icon_border_radius; ?>px;
    <?php } ?>
}

@media only screen and (max-width: 768px) {
    div.fl-node-<?php echo $id; ?> .pp-heading-content {
        text-align: <?php echo $settings->heading_tablet_alignment; ?>;
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title {
        <?php if( $settings->heading_tablet_font_size >= 0 && '' != $settings->heading_tablet_font_size ) { ?>
        font-size: <?php echo $settings->heading_tablet_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->heading_tablet_line_height_n >= 0 && '' != $settings->heading_tablet_line_height_n ) { ?>
        line-height: <?php echo $settings->heading_tablet_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title span.pp-secondary-title {
        <?php if( $settings->heading2_tablet_font_size >= 0 && '' != $settings->heading2_tablet_font_size ) { ?>
        font-size: <?php echo $settings->heading2_tablet_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->heading2_tablet_line_height_n >= 0 && '' != $settings->heading2_tablet_line_height_n ) { ?>
        line-height: <?php echo $settings->heading2_tablet_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-sub-heading {
        <?php if( $settings->sub_heading_tablet_font_size >= 0 && '' != $settings->sub_heading_tablet_font_size ) { ?>
        font-size: <?php echo $settings->sub_heading_tablet_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->sub_heading_tablet_line_height_n >= 0 && '' != $settings->sub_heading_tablet_line_height_n ) { ?>
        line-height: <?php echo $settings->sub_heading_tablet_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-align,
    div.fl-node-<?php echo $id; ?> .pp-heading-content {
        <?php if( $settings->heading_tablet_alignment ) { ?>
        text-align: <?php echo $settings->heading_tablet_alignment; ?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-separator-line {
        <?php if( $settings->heading_tablet_alignment == 'right' ) { ?>
        float: right;
        <?php } elseif( $settings->heading_tablet_alignment == 'left' ) { ?>
        float: left;
        <?php } else { ?>
        margin: 0 auto;
        float: none;
        <?php } ?>
    }
}

@media only screen and (max-width: 480px) {
    div.fl-node-<?php echo $id; ?> .pp-heading-content {
        text-align: <?php echo $settings->heading_mobile_alignment; ?>;
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title {
        <?php if( $settings->heading_mobile_font_size >= 0 && '' != $settings->heading_mobile_font_size ) { ?>
        font-size: <?php echo $settings->heading_mobile_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->heading_mobile_line_height_n >= 0 && '' != $settings->heading_mobile_line_height_n ) { ?>
        line-height: <?php echo $settings->heading_mobile_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading .heading-title span.pp-secondary-title {
        <?php if( $settings->heading2_mobile_font_size >= 0 && '' != $settings->heading2_mobile_font_size ) { ?>
        font-size: <?php echo $settings->heading2_mobile_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->heading2_mobile_line_height_n >= 0 && '' != $settings->heading2_mobile_line_height_n ) { ?>
        line-height: <?php echo $settings->heading2_mobile_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-sub-heading {
        <?php if( $settings->sub_heading_mobile_font_size >= 0 && '' != $settings->sub_heading_mobile_font_size ) { ?>
        font-size: <?php echo $settings->sub_heading_mobile_font_size; ?>px;
        <?php } ?>
        <?php if( $settings->sub_heading_mobile_line_height_n >= 0 && '' != $settings->sub_heading_mobile_line_height_n ) { ?>
        line-height: <?php echo $settings->sub_heading_mobile_line_height_n;?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-heading-separator-align,
    div.fl-node-<?php echo $id; ?> .pp-heading-content {
        <?php if( $settings->heading_mobile_alignment ) { ?>
        text-align: <?php echo $settings->heading_mobile_alignment; ?>;
        <?php } ?>
    }
    div.fl-node-<?php echo $id; ?> .pp-heading-content .pp-heading-separator .pp-separator-line {
        <?php if( $settings->heading_mobile_alignment == 'right' ) { ?>
        float: right;
        <?php } else if( $settings->heading_mobile_alignment == 'left' ) { ?>
        float: left;
        <?php } else { ?>
        margin: 0 auto;
        <?php } ?>
    }
}
