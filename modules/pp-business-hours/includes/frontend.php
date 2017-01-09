<div class="pp-business-hours-content clearfix">
	<?php $rows = count($settings->business_hours_rows);
	for ($i=0; $i < count($settings->business_hours_rows); $i++) :

		if(!is_object($settings->business_hours_rows[$i])) continue;

		$bhRow = $settings->business_hours_rows[$i];
		$status = '';
		$highlight = '';

		if( $bhRow->status == 'close' ) {
			$status = ' pp-closed';
		}
		if( $bhRow->highlight == 'yes' ) {
			$highlight = ' pp-highlight-row';
		}

		$title 			= 'short' === $bhRow->day_format ? $module->short_day_format($bhRow->title) . '.' : $module->long_day_format($bhRow->title);
		$opening_hours 	= '';
		$closing_hours 	= '';

		?>
		<div itemprop="openingHoursSpecification" itemtype="https://schema.org/OpeningHoursSpecification" class="pp-bh-row clearfix pp-bh-row-<?php echo $i; ?><?php echo $status; ?><?php echo $highlight; ?>">
			<div class="pp-bh-title">
				<link itemprop="dayOfWeek" href="http://schema.org/<?php echo $bhRow->title; ?>" /><?php echo $title; ?>
			</div>
			<div class="pp-bh-timing">
				<?php if( $bhRow->status == 'close' ) {
					echo $bhRow->status_text;
				} else {
					if ( is_object( $bhRow->start_time ) ) {
						$opening_hours = $bhRow->start_time->hours . ':' . $bhRow->start_time->minutes . ' ' . $bhRow->start_time->day_period;
						$closing_hours = $bhRow->end_time->hours . ':' . $bhRow->end_time->minutes . ' ' . $bhRow->end_time->day_period;
					}
					if ( is_array( $bhRow->start_time ) ) {
						$opening_hours = $bhRow->start_time['hours'] . ':' . $bhRow->start_time['minutes'] . '&nbsp;' . $bhRow->start_time['day_period'];
						$closing_hours = $bhRow->end_time['hours'] . ':' . $bhRow->end_time['minutes'] . '&nbsp;' . $bhRow->end_time['day_period'];
					}
					echo '<time itemprop="opens" content="'.date("H:i", strtotime($opening_hours)).'">' . $opening_hours . '</time>';
					echo ' - ';
					echo '<time itemprop="closes" content="'.date("H:i", strtotime($closing_hours)).'">' . $closing_hours . '</time>';
				} ?>
			</div>
		</div>
		<?php
	endfor; ?>
</div>
