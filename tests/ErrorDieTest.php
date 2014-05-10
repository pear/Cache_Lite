<?php

/**
 * Test for CACHE_LITE_ERROR_DIE
 *
 * @package Cache_Lite
 * @category Caching
 * @version $Id$
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/tmpdir.inc';

class ErrorDieTest extends PHPUnit_Framework_TestCase
{
	public function testErrorDie()
	{
        exec('/usr/bin/env php ' . __DIR__ . DIRECTORY_SEPARATOR . 'errordie.php', $out);
        $message = join(PHP_EOL, $out);
        $message = str_replace(tmpDir(), '<cachedir>/', $message); // Remove system specific cache dir
        $expected = join(PHP_EOL, array(
            '==> First call (cache should be missed)',
            'Cache Missed !',
            '0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_e9982ec5ca981bd365603623cf4b2277',
        ));

        $this->assertEquals($message, $expected);

	}
}
