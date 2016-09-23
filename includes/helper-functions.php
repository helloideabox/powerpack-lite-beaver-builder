<?php

/**
 * Row and Column Extensions
 */
if ( !function_exists( 'pp_extensions' ) )
{
    function pp_extensions()
    {
        $extensions = array(
            'row'       => array(
                'separators'    => __('Separators', 'bb-powerpack'),
                'expandable'    => __('Expandable', 'bb-powerpack'),
                'downarrow'     => __('Down Arrow', 'bb-powerpack'),
            ),
            'col'       => array(
                'corners'       => __('Round Corners', 'bb-powerpack'),
                'shadow'        => __('Box Shadow', 'bb-powerpack'),
            )
        );

        return $extensions;
    }
}

/**
 * Hex to Rgba
 */
if ( !function_exists( 'pp_hex2rgba' ) )
{
    function pp_hex2rgba( $hex, $opacity )
    {
    	$hex = str_replace( '#', '', $hex );

    	if ( strlen($hex) == 3 ) {
    		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
    		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
    		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
    	} else {
    		$r = hexdec(substr($hex,0,2));
    		$g = hexdec(substr($hex,2,2));
    		$b = hexdec(substr($hex,4,2));
    	}
    	$rgba = array($r, $g, $b, $opacity);

    	return 'rgba(' . implode(', ', $rgba) . ')';
    }
}
