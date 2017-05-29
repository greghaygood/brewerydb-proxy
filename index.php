<?php

require_once('config.php');

define( 'API_BASE', 'http://api.brewerydb.com/v2' );
define( 'API_FORMAT', 'application/json' );

session_start();

$endpoint = $_REQUEST['_ep'];
header('Content-Type: ' . API_FORMAT);

if (!defined('API_KEY') || empty(API_KEY)) {
	error('No API key provided');
}

if (!empty($endpoint)) {
	$args = http_build_query($_REQUEST);
	echo send_request(API_BASE . $endpoint . '?format=' . API_FORMAT . '&key=' . API_KEY . '&' . $args);
} else {
	error('No endpoint requested');
}

function error($message) {
	http_response_code(400);
	echo json_encode(array('error' => $message));
	die;
}

function send_request($url) {
	if (function_exists('curl_init')) {
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		if ($response === false) {
			$response = curl_getinfo( $ch );
		}
		curl_close($ch);

		return $response;
	} else {
		return file_get_contents($url);
	}
}
