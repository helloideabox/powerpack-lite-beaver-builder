<?php

/**
 * Row and Column Extensions
 */
function pp_extensions()
{
    $extensions = array(
        'row'       => array(
            'separators'    => __('Separators', 'bb-powerpack'),
            'gradient'      => __('Gradient', 'bb-powerpack'),
        ),
        'col'       => array(
            'corners'       => __('Round Corners', 'bb-powerpack'),
        )
    );

    return $extensions;
}

/**
 * Row templates categories
 */
function pp_row_templates_categories()
{
    $cats = array(
        'pp-contact-blocks'     => __('Contact Blocks', 'bb-powerpack'),
        'pp-contact-forms'      => __('Contact Forms', 'bb-powerpack'),
        'pp-call-to-action'     => __('Call To Action', 'bb-powerpack'),
        'pp-hero'               => __('Hero', 'bb-powerpack'),
        'pp-subscribe-forms'    => __('Subscribe Forms', 'bb-powerpack'),
        'pp-content'            => __('Content', 'bb-powerpack'),
        'pp-blog-posts'         => __('Blog Posts', 'bb-powerpack'),
        'pp-lead-generation'    => __('Lead Generation', 'bb-powerpack'),
        'pp-logos'              => __('Logos', 'bb-powerpack'),
        'pp-team'               => __('Team', 'bb-powerpack'),
        'pp-testimonials'       => __('Testimonials', 'bb-powerpack'),
        'pp-features'           => __('Features', 'bb-powerpack'),
        'pp-services'           => __('Services', 'bb-powerpack'),
    );

    asort($cats);

    return $cats;
}

/**
 * Templates categories
 */
function pp_templates_categories( $type )
{
	$templates = pp_get_template_data( $type );
	$data = array();

	if ( is_array( $templates ) ) {
		foreach ( $templates as $cat => $info ) {
			$data[$cat] = array(
				'title'		=> $info['name'],
				'type'		=> $info['type'],
			);
			if ( isset( $info['count'] ) ) {
				$data[$cat]['count'] = $info['count'];
			}
		}

    	ksort($data);
	}

    return $data;
}

/**
 * Templates filters
 */
function pp_template_filters()
{
	$filters = array(
		'all'				=> __( 'All', 'bb-powerpack' ),
		'home'				=> __( 'Home', 'bb-powerpack' ),
		'about'				=> __( 'About', 'bb-powerpack' ),
		'contact'			=> __( 'Contact', 'bb-powerpack' ),
		'landing'			=> __( 'Landing', 'bb-powerpack' ),
		'sales'				=> __( 'Sales', 'bb-powerpack' ),
		'coming-soon'		=> __( 'Coming Soon', 'bb-powerpack' ),
	);

	return $filters;
}

function pp_get_template_data( $type )
{
    $file = "https://wpbeaveraddons.com/page-templates/template-data/?show={$type}&export";
	$data = @file_get_contents( $file );
	if ( $data ) {
		$data = json_decode( $data, true );
	}

    BB_PowerPack_Admin_Settings::$templates = $data;
	BB_PowerPack_Admin_Settings::$templates_count[$type] = count( $data );

	return $data;
}

/**
 * Templates demo source URL
 */
function pp_templates_preview_src( $type = 'page', $category = '' )
{
    $url = 'https://wpbeaveraddons.com/page-templates/';

    $templates = BB_PowerPack_Admin_Settings::$templates;

    if ( ! is_array( $templates ) || ! count( $templates ) > 0 ) {
        $templates = pp_get_template_data( $type );
    }
    
	$data = array();

	if ( is_array( $templates ) ) {

		foreach ( $templates as $cat => $info ) {
			$data[$cat] = $info['slug'];
		}

	}

    if ( '' == $category ) {
        return $data;
    }

    if ( isset( $data[$category] ) ) {
        return $data[$category];
    }

    return $url;
}

function pp_get_template_screenshot_url( $type, $category, $mode = '' )
{
	$url = 'https://s3.amazonaws.com/ppbeaver/assets/400x400/';
	$scheme = 'color';

	if ( ( $type == 'page' || $scheme == 'color' ) && $mode == '' ) {
		return $url . $category . '.jpg';
	}

	if ( $mode == 'color' ) {
		return $url . $category . '.jpg';
	}

	if ( $mode == 'greyscale' ) {
		return $url . 'greyscale/' . $category . '.jpg';
	}

	return $url . $scheme . '/' . $category . '.jpg';
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

/**
 * Returns long day format.
 *
 * @since 1.2.2
 * @param string $day
 * @return mixed
 */
function pp_long_day_format( $day = '' )
{
	$days = array(
		'Sunday'        => __('Sunday', 'bb-powerpack'),
		'Monday'        => __('Monday', 'bb-powerpack'),
		'Tuesday'       => __('Tuesday', 'bb-powerpack'),
		'Wednesday'     => __('Wednesday', 'bb-powerpack'),
		'Thursday'      => __('Thursday', 'bb-powerpack'),
		'Friday'        => __('Friday', 'bb-powerpack'),
		'Saturday'      => __('Saturday', 'bb-powerpack'),
	);

	if ( isset( $days[$day] ) ) {
		return $days[$day];
	}
	else {
		return $days;
	}
}

/**
 * Returns short day format.
 *
 * @since 1.2.2
 * @param string $day
 * @return string
 */
function pp_short_day_format( $day )
{
	$days = array(
		'Sunday'        => __('Sun', 'bb-powerpack'),
		'Monday'        => __('Mon', 'bb-powerpack'),
		'Tuesday'       => __('Tue', 'bb-powerpack'),
		'Wednesday'     => __('Wed', 'bb-powerpack'),
		'Thursday'      => __('Thu', 'bb-powerpack'),
		'Friday'        => __('Fri', 'bb-powerpack'),
		'Saturday'      => __('Sat', 'bb-powerpack'),
	);

	if ( isset( $days[$day] ) ) {
		return $days[$day];
	}
}

/**
 * Returns badges data.
 *
 * @since 1.0.8
 * @param int $number
 * @return array
 */
function pp_modules_badges( $number = '' )
{
    $badges = array(
        1 => __('Unique & Popular', 'bb-powerpack'),
        2 => __('Unique', 'bb-powerpack'),
        3 => __('Popular', 'bb-powerpack'),
        4 => __('Coming Soon', 'bb-powerpack')
    );

    if ( ! $number || empty( $number ) ) {
        return $badges;
    }

    $number = absint( $number );

    if ( isset( $badges[$number] ) ) {
        return $badges[$number];
    }
}
