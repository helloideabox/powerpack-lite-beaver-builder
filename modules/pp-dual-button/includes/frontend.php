<?php
$nofollow_1 = isset( $settings->button_1_link_nofollow ) && 'yes' == $settings->button_1_link_nofollow ? ' rel="nofollow"' : '';
$target_1 = isset( $settings->button_1_link_target ) ? ' target="' . $settings->button_1_link_target . '"' : '';
$nofollow_2 = isset( $settings->button_2_link_nofollow ) && 'yes' == $settings->button_2_link_nofollow ? ' rel="nofollow"' : '';
$target_2 = isset( $settings->button_2_link_target ) ? ' target="' . $settings->button_2_link_target . '"' : '';
?>
<div class="pp-dual-button-content clearfix">
    <div class="pp-dual-button-inner">
        <div class="pp-dual-button-1 pp-dual-button pp-button-effect-<?php echo $settings->button_1_effect; ?>">
            <a href="<?php echo $settings->button_1_link; ?>" class="pp-button <?php echo $settings->button_1_css_class; ?>" role="button"<?php echo $target_1; ?><?php echo $nofollow_1; ?>>
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
        <div class="pp-dual-button-2 pp-dual-button pp-button-effect-<?php echo $settings->button_2_effect; ?>">
            <a href="<?php echo $settings->button_2_link; ?>" class="pp-button <?php echo $settings->button_2_css_class; ?>" role="button"<?php echo $target_2; ?><?php echo $nofollow_2; ?>>
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
