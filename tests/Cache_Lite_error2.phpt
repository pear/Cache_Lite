--TEST--
Cache_Lite::Cache_Lite (error2)
--INI--
track_errors=Off
--FILE--
<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/callcache.inc';
require_once __DIR__ . '/tmpdir.inc';
require_once __DIR__ . '/cache_lite_base.inc';

$tmpdir = tmpDir() . '31451992gjhgjh'. '/'; # I hope there will be no directory with that silly name
$options = array(
    'cacheDir' => $tmpdir,
    'lifeTime' => 60,
    'errorHandlingAPIBreak' => true
);

$Cache_Lite = new Cache_Lite($options);
multipleCallCache();

?>
--EXPECT--
==> First call (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
PEAR_ERROR : Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_e9982ec5ca981bd365603623cf4b2277 (#-1)

Done !

==> Second call (cache should be hit)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
PEAR_ERROR : Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_e9982ec5ca981bd365603623cf4b2277 (#-1)

Done !

==> Third call (cache should be hit)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
PEAR_ERROR : Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_e9982ec5ca981bd365603623cf4b2277 (#-1)

Done !

==> We remove cache
Done !

==> Fourth call (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
PEAR_ERROR : Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_e9982ec5ca981bd365603623cf4b2277 (#-1)

Done !

==> #5 Call with another id (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
PEAR_ERROR : Cache_Lite : Unable to write cache file : <cachedir>/31451992gjhgjh/cache_c21f969b5f03d33d43e04f8f136e7682_07eeaa82211be6c3335603523dbea0a3 (#-1)

Done !

==> We remove cache
Done !
