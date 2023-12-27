<?php

// Make a request to ipinfo.io to get user's IP and location information
$ipinfo_url = 'http://ipinfo.io';
$ipinfo_data = file_get_contents($ipinfo_url);
$ipinfo_details = json_decode($ipinfo_data, true);

// Extract relevant information
$userIp = $ipinfo_details['ip'];
$city = $ipinfo_details['city'];

?>