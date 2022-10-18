<?php

// If a Composer autoload file exists, load it before running tests
if ( file_exists(__DIR__ . '/../vendor/autoload.php') ) {
	require_once __DIR__ . '/../vendor/autoload.php';
}

if (version_compare(PHP_VERSION, '5.4', '>=')) {
    error_reporting(E_ALL ^ E_STRICT);
} else if (version_compare(PHP_VERSION, '5.3', '>=')) {
    error_reporting(E_ALL & ~E_STRICT);
}
