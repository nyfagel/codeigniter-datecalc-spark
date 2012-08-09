<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Date calculations helper for CodeIgniter.
 *
 * @package		helpers
 * @author		Jan Lindblom <jan@powcorp.se>
 * @copyright	Copyright (c) 2012, POW! Corp.
 * @license		MIT
 * @version		1.0
 */
if ( ! function_exists('days_between')) {
	/**
	 * Return the number of days between two dates.
	 * 
	 * @param string $start the start date formatted as 'YYYY-MM-DD'.
	 * @param string $end the end date formatted as 'YYYY-MM-DD'.
	 * @return array the dates between as strings formatted as 'YYYY-MM-DD'.
	 */
	function days_between($start = null, $end = null) {
		if ((is_null($start)) || (is_null($end))) {
			return 0;
		}
		$day = 86400;
		$format = 'Y-m-d';
		$s = strtotime($start);
		$e = strtotime($end);
		$ndays = round(($e - $s) / $day) + 1;
		$days = array();
		
		for ($d = 0; $d < $ndays; $d++) {
			$days[] = date($format, ($s + ($d * $day)));
		}
		return $days;
	}
}
?>