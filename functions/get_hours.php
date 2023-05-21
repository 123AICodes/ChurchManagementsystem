<?php
function getDateTimeDiff($date)
{
  // echo date('Y-m-d H:i:s') . date('');
  $now_timeStamp = strtotime(date('Y-m-d H:i:s'));
  $diff_timeStamp = $now_timeStamp - strtotime($date);

  // echo $diff_timeStamp;
  if ($diff_timeStamp < 60) {
    return 'few seconds ago';
  } else if ($diff_timeStamp >= 60 && $diff_timeStamp < 3600) {
    return round($diff_timeStamp / 60) . ' mins ago';
  } else if ($diff_timeStamp >= 3600 && $diff_timeStamp < 86400) {
    return round($diff_timeStamp / 86400) . ' hours ago';
  } else if ($diff_timeStamp >= 86400 && $diff_timeStamp < (86400 * 30)) {
    return round($diff_timeStamp / (86400 * 30)) . ' days ago';
  } else if ($diff_timeStamp >= (86400 * 30) && $diff_timeStamp < (86400 * 365)) {
    return round($diff_timeStamp / (86400 * 365)) . ' months ago';
  } else {
    return round($diff_timeStamp / ((86400 * 365))) . ' years ago';
  }
}
