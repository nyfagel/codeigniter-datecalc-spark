<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Date calculations helper for CodeIgniter.
 *
 * @package		helpers
 * @author		Jan Lindblom <jan@nyfagel.se>
 * @copyright	Copyright (c) 2012, Ny fågel.
 * @license		MIT
 * @version		1.0.2
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

if (!function_exists('year_of')) {
	/**
	 * Return the year as an integer of the given epoch timestamp.
	 * 
	 * @access public
	 * @param int $date the epoch timestamp, defaults to time() if omitted.
	 * @return int integer representation of the year.
	 */
	function year_of($date = null) {
		if (is_null($date)) {
			$date = time();
		}
		return intval(date("%Y", $date));
	}
}

if (!function_exists('month_of')) {
	/**
	 * Return the month as an integer of the given epoch timestamp.
	 * 
	 * @access public
	 * @param int $date the epoch timestamp, defaults to time() if omitted.
	 * @return int integer representation of the month.
	 */
	function month_of($date = null) {
		if (is_null($date)) {
			$date = time();
		}
		return intval(date("%n", $date));
	}
}

if (!function_exists('day_of')) {
	/**
	 * Return the day-of-month as an integer of the given epoch timestamp.
	 * 
	 * @access public
	 * @param int $date the epoch timestamp, defaults to time() if omitted.
	 * @return int integer representation of the day-of-month.
	 */
	function day_of($date = null) {
		if (is_null($date)) {
			$date = time();
		}
		return intval(date("%j", $date));
	}
}

if ( ! function_exists('time_ago')) {
	/**
	 * time_ago function.
	 * 
	 * @link http://css-tricks.com/snippets/php/time-ago-function/
	 * @access public
	 * @param int $tm
	 * @param int $rcs (default: 0)
	 * @param string $lang (default: 'en')
	 * @return string time since supplied timestamp
	 */
	function time_ago($tm, $rcs = 0, $lang = 'en') {
		$cur_tm = time(); $dif = $cur_tm - $tm;
		$pds['en'] = array('second','minute','hour','day','week','month','year','decade');
		$pds['sv'] = array('sekund','minut','timme','dag','vecka','månad','år','årtionde');
		$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		for ($v = sizeof($lngh)-1; ($v >= 0) && (($no = $dif/$lngh[$v]) <= 1); $v--); if ($v < 0) $v = 0; $_tm = $cur_tm - ($dif % $lngh[$v]);
		
		$no = floor($no);
		if ($no <> 1) $pds[$v] .='s'; $x = sprintf("%d %s ", $no, $pds[$lang][$v]);
		
		if (($rcs > 0) && ($v >= 1) && (($cur_tm - $_tm) > 0)) $x .= time_ago($_tm, --$rcs);
		
		return $x;
	}
}
?>
