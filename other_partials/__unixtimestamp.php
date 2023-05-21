<?php
// Convert the date to a Unix timestamp
$timestamp = strtotime($member['date']);
// Get the current Unix timestamp
//date_default_timezone_get();
$date = date('M d, Y - l H:i:s A');
$currentTimestamp = time();
// Calculate the difference between the timestamps
$difference = abs($currentTimestamp - $timestamp);
// Determine how long ago the date was
if ($difference < 60) {
  // Less than 1 minute ago
  $timeAgo = "just now";
} elseif ($difference < 3600) {
  // Less than 1 hour ago
  $minutes = floor($difference / 60);
  $timeAgo = $minutes . " minutes ago";
} elseif ($difference < 86400) {
  // Less than 1 day ago
  $hours = floor($difference / 3600);
  $timeAgo = $hours . " hours ago";
} else {
  // More than 1 day ago
  $days = floor($difference / 86400);
  $timeAgo = $days . " days ago";
}
