--TEST--
Cache_Lite::Cache_Lite (fatest, no control, no lock)
--INI--
track_errors=Off
--FILE--
<?php

require_once __DIR__ . '/callcache.inc';
require_once __DIR__ . '/tmpdir.inc';
require_once __DIR__ . '/cache_lite_base.inc';

$options = array(
    'cacheDir' => tmpDir() . '/',
    'lifeTime' => 60,
    'fileLocking' => false,
    'writeControl' => false,
    'readControl' => false,
    'fileNameProtection' => false
);

$Cache_Lite = new Cache_Lite($options);
multipleCallCache();

?>
--GET--
--POST--
--EXPECT--
==> First call (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Done !

==> Second call (cache should be hit)
Cache Hit !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Done !

==> Third call (cache should be hit)
Cache Hit !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Done !

==> We remove cache
Done !

==> Fourth call (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Done !

==> #5 Call with another id (cache should be missed)
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Done !

==> We remove cache
Done !
