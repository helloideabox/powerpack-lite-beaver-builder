<?php

function pp_row_render_js( $extensions ) {

    if ( array_key_exists( 'downarrow', $extensions['row'] ) || in_array( 'downarrow', $extensions['row'] ) ) {
        add_filter( 'fl_builder_render_js', 'pp_row_downarrow_js', 10, 3 );
    }
}

/**
 * Down Arrow
 */
function pp_row_downarrow_js( $js, $nodes, $global_settings ) {
    foreach ( $nodes['rows'] as $row ) {
        ob_start();
        ?>

        ;(function($) {
        	$('.pp-down-arrow').on('click', function() {
        		var rowSelector = '.fl-node-' + $(this).data('row-id');
        		var nextRow		= $(rowSelector).next();
        		var topOffset	= ( '' === $(this).data('top-offset') ) ? 0 : $(this).data('top-offset');
                var adminBar    = $('body').hasClass('admin-bar') ? 32 : 0;
        		var trSpeed		= $(this).data('transition-speed');
        		$('html, body').animate({
        			scrollTop: nextRow.offset().top + topOffset + adminBar
        		}, trSpeed);
        	});
        })(jQuery);

        <?php

        $js .= ob_get_clean();
    }

    return $js;
}
