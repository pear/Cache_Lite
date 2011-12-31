<?php

/**
 * @author Markus Tacker <tacker@php.net>
 */

/**
 * @const String Temp dir for cache files
 */
define('TEST_TMP_DIR_DEFAULT', __DIR__ . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);

/**
 * Returns a directory to use for temp files.
 *
 * The dir is now hard coded to a local dir to make the tests runnable
 * under jenkins where there is no write access to the system temp dir.
 *
 * The reason for this solution is, that with phpt files a given
 * --bootstrap file is ignored.
 *
 * @author Markus Tacker <tacker@php.net>*
 * @static
 * @access  public
 * @return  string  The system tmp directory
 */
function tmpDir()
{
    if (defined('TEST_TMP_DIR')) return TEST_TMP_DIR;
    return TEST_TMP_DIR_DEFAULT;
}

// Create directory if not exists
if (!is_dir(tmpDir())) mkdir(tmpDir());

// Clean up afterwards
register_shutdown_function(function()
{
    exec('rm -rf ' . tmpDir());
});

