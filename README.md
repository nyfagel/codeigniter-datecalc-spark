# CodeIgniter DateCalc Spark 1.0.2

Date calculations helper for CodeIgniter. Should rename it to moredate instead perhaps.

Get started by running:

```sh
php tools/spark install -v1.0.2 datecalc
```

If you don't use the autoload feature, load the spark with

```php
$this->load->spark('datecalc/1.0.2');
```

from your controller or model.

## Functions

The following functions are currently included:

### days_between($start, $end)
Return the number of days between two dates.

 * $start: the start date formatted as 'YYYY-MM-DD'.
 * $end: the end date formatted as 'YYYY-MM-DD'.

 * returns: the dates between as strings formatted as 'YYYY-MM-DD'.

### year_of($date)
Return the year as an integer of the given epoch timestamp.

 * $date: the epoch timestamp, defaults to time() if omitted.

 * returns: integer representation of the year.

### month_of($date)
Return the month as an integer of the given epoch timestamp.

 * $date: the epoch timestamp, defaults to time() if omitted.

 * returns: integer representation of the month.

### day_of($date)
Return the day-of-month as an integer of the given epoch timestamp.

 * $date: the epoch timestamp, defaults to time() if omitted.

 * returns: integer representation of the day-of-month.

### time_ago($tm, $rcs = 0, $lang = 'en') _(experimental)_
Returns a string representation of a time span.

Based on this: [css-tricks.com/snippets/php/time-ago-function](http://css-tricks.com/snippets/php/time-ago-function/)

 * $tm: the epoch timestamp to compare with.
 * $rcs: recursion controller, gives some level of "resolution" to the result (_3 weeks, 2 days, 14 minutes_ compared to _3 weeks, 2 days_), play with it to see the results.
 * $lang: optional language parameter, defaults to 'en' for English, only options are ['en', 'sv'].

 * returns: time since supplied timestamp in a human readable form.