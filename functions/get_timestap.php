<?php
// require_once './config/database.php';
// $query = " SELECT * FROM members where member_type='Youth' OR member_type='Teenager' ORDER BY id DESC LIMIT 5";
// $query_results = mysqli_query($connection, $query);

$posted_at = '2022-12-01 6:00:00';

function converToUnitTimestamp($value)
{
  list($date, $time) = explode(' ', $value);
  list($year, $month, $day) = explode(' - ', $date);
  list($hour, $minutes, $seconds) = explode(':', $time);

  $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);

  return $unit_timestamp;
};

function convertToAgoFormat($timestamp)
{
  $diffBtwCurTimeAndTimestamp = time() - $timestamp;

  $periodStrings = ['seconds', 'min', 'hour', 'day', 'week', 'month', 'years', 'decade'];
  $periodNumber = ['60', '60', '60', '24', '7', '4.35', '12', '10'];

  for ($i = 0; $diffBtwCurTimeAndTimestamp >= $periodNumber[$i]; $i++) {
    $diffBtwCurTimeAndTimestamp /= $periodNumber[$i];
    $diffBtwCurTimeAndTimestamp = round($diffBtwCurTimeAndTimestamp);

    if ($diffBtwCurTimeAndTimestamp != 1) $periodStrings[$i] .= 's';

    $output = 'diffBtwCurTimeAndTimestamp $periodStrings[$i]';

    return "Posted" . $output . "ago";
  }
}
$unitTimestamp = converToUnitTimestamp($posted_at);
