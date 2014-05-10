<?php

/**
 * Executed by ErrorDieTest
 *
 * @package Cache_Lite
 * @category Caching
 * @version $Id$
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/callcache.inc';
require_once __DIR__ . '/tmpdir.inc';
require_once __DIR__ . '/cache_lite_base.inc';

error_reporting(0);

$options = array(
    'cacheDir' => tmpDir() . '31451992gjhgjh'. '/', # I hope there will be no directory with that silly name
    'lifeTime' => 60,
    'pearErrorMode' => CACHE_LITE_ERROR_DIE
);

$Cache_Lite = new Cache_Lite($options);
multipleCallCache();
