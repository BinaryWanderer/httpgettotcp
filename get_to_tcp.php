<?php

// Define the allowlisted IP addresses - This should contain the IP addresses of any devices that will send a request to this script.
$allowlistedIPs = array(
    '127.0.0.1', // Example IP addresses, replace with your own allowlisted IPs
    '::1', 
    '192.168.1.3'
);

// Get the IP address of the requester
$requesterIP = $_SERVER['REMOTE_ADDR'];

// Check if the requester's IP is allowlisted
if (!in_array($requesterIP, $allowlistedIPs)) {
    echo "Not allowlisted: " . $requesterIP;
    exit;
}

// Get the string to forward as anything after the .php/ in the url.
$url = $_SERVER['REQUEST_URI'];
$pattern = '/.php\/(.+)/';
preg_match($pattern, $url, $matches);
$string = isset($matches[1]) ? $matches[1] : '';

// Open a TCP connection to another device
if (!empty($string)) {
    $host = '1.2.3.4'; // Replace with the IP or URL of the receiving device.
    $port = 1234; // Replace with the port of the receiving device.

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket === false) {
        echo "Failed to create socket: " . socket_strerror(socket_last_error());
        exit;
    }

    $result = socket_connect($socket, $host, $port);
    if ($result === false) {
        echo "Failed to connect to $host:$port: " . socket_strerror(socket_last_error($socket));
        socket_close($socket);
        exit;
    }

    // Send the string over the TCP connection
    socket_write($socket, $string, strlen($string));

    // Close the connection
    socket_close($socket);
}

?>
