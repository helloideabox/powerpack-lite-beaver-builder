<?php
$nofollow_1 = isset( $settings->link_no_follow_1 ) && 'yes' == $settings->link_no_follow_1 ? ' rel="nofollow"' : '';
$nofollow_2 = isset( $settings->link_no_follow_2 ) && 'yes' == $settings->link_no_follow_2 ? ' rel="nofollow"' : '';
?>
<div class="pp-dual-button-content clearfix">
    <div class="pp-dual-button-inner">
        <div class="pp-dual-button-1 pp-dual-button">
            <a href="<?php echo $settings->button_link_1; ?>" class="pp-button <?php echo $settings->button_1_css_class; ?>" role="button" target="<?php echo $settings->link_target_1; ?>"<?php echo $nofollow_1; ?>>
                <?php if( $settings->button_1_icon_aligment == 'left' ) { ?>
                     <?php if( $settings->button_font_icon_1 && $settings->button_icon_select_1 == 'font_icon' ) { ?>
                        <span class="pp-font-icon <?php echo $settings->button_font_icon_1; ?>"></span>
                    <?php } ?>
                    <?php if( $settings->button_custom_icon_1 && $settings->button_icon_select_1 == 'custom_icon' ) { ?>
                        <img class="pp-custom-icon" src="<?php echo $settings->button_custom_icon_1_src; ?>" />
                    <?php } ?>
                <?php } ?>
                <span class="pp-button-1-text"><?php echo $settings->button_1_title; ?></span>
                <?php if( $settings->button_1_icon_aligment == 'right' ) { ?>
                     <?php if( $settings->button_font_icon_1 && $settings->button_icon_select_1 == 'font_icon' ) { ?>
                        <span class="pp-font-icon <?php echo $settings->button_font_icon_1; ?>"></span>
                    <?php } ?>
                    <?php if( $settings->button_custom_icon_1 && $settings->button_icon_select_1 == 'custom_icon' ) { ?>
                        <img class="pp-custom-icon" src="<?php echo $settings->button_custom_icon_1_src; ?>" />
                    <?php } ?>
                <?php } ?>
            </a>
        </div>
        <div class="pp-spacer"></div>
        <div class="pp-dual-button-2 pp-dual-button">
            <a href="<?php echo $settings->button_link_2; ?>" class="pp-button <?php echo $settings->button_2_css_class; ?>" role="button" target="<?php echo $settings->link_target_2; ?>"<?php echo $nofollow_2; ?>>
                <?php if( $settings->button_2_icon_aligment == 'left' ) { ?>
                    <?php if( $settings->button_font_icon_2 && $settings->button_icon_select_2 == 'font_icon' ) { ?>
                       <span class="pp-font-icon <?php echo $settings->button_font_icon_2; ?>"></span>
                   <?php } ?>
                   <?php if( $settings->button_custom_icon_2 && $settings->button_icon_select_2 == 'custom_icon' ) { ?>
                       <img class="pp-custom-icon" src="<?php echo $settings->button_custom_icon_2_src; ?>" />
                   <?php } ?>
               <?php } ?>
                 <span class="pp-button-2-text"><?php echo $settings->button_2_title; ?></span>
                 <?php if( $settings->button_2_icon_aligment == 'right' ) { ?>
                     <?php if( $settings->button_font_icon_2 && $settings->button_icon_select_2 == 'font_icon' ) { ?>
                        <span class="pp-font-icon <?php echo $settings->button_font_icon_2; ?>"></span>
                    <?php } ?>
                    <?php if( $settings->button_custom_icon_2 && $settings->button_icon_select_2 == 'custom_icon' ) { ?>
                        <img class="pp-custom-icon" src="<?php echo $settings->button_custom_icon_2_src; ?>" />
                    <?php } ?>
                <?php } ?>
            </a>
        </div>
    </div>
</div>
