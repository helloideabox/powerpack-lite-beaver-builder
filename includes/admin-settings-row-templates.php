<p class="pp-upgrade-msg"><strong><?php _e('Upgrade to PowerPack Pro to unlock these set of templates', 'bb-powerpack'); ?></strong> &nbsp;<a href="<?php echo BB_POWERPACK_PRO; ?>" target="_blank" class="button button-primary"><?php _e('Upgrade Now', 'bb-powerpack'); ?></a></p>
<div class="pp-page-templates">

    <div class="pp-page-templates-grid wp-clearfix">

        <?php foreach ( pp_row_templates_categories() as $cat => $name ) : ?>

            <div class="pp-page-template pp-row-template">
                <div class="pp-template-screenshot"><img src="<?php echo BB_POWERPACK_URL . 'assets/images/templates/' . $cat . '.jpg'; ?>" /></div>
                <h2 class="pp-template-category"><span></span> <?php echo $name; ?></h2>
                <div class="pp-template-actions">
                    <a class="button button-primary pp-btn-upgrade" href="<?php echo BB_POWERPACK_PRO; ?>" target="_blank"><?php _e('Upgrade Now', 'bb-powerpack'); ?></a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</div>

<script>
    jQuery('.pp-btn-upgrade').on('click', function(e) {
        e.stopPropagation();
    });
</script>
