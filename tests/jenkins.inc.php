<?php

/**
 * This file is included when running the tests on Jenkins where
 * there is no write access to the system temp dir
 *
 * @author Markus Tacker <tacker@php.net>
 */

define('TEST_TMP_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'tmp');

// Make sure temp dir exists
if (!is_dir(TEST_TMP_DIR)) {
    mkdir(TEST_TMP_DIR);
}

register_shutdown_function(function() {
   exec('rm -rf ' . TEST_TMP_DIR);
});