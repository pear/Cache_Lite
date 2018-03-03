--TEST--
Cache_Lite::Cache_Lite (lifetime)
--INI--
track_errors=Off
--FILE--
<?php

require_once __DIR__ . '/callcache.inc';
require_once __DIR__ . '/tmpdir.inc';
require_once __DIR__ . '/cache_lite_base.inc';

$options = array(
    'cacheDir' => tmpDir() . '/',
    'lifeTime' => 2
);

$Cache_Lite = new Cache_Lite($options);
callCache('31415926');
echo("\n");
callCache('31415926');
echo("\n");
sleep(4);
callCache('31415926');
echo("\n");
sleep(4);
$Cache_Lite->extendLife();
callCache('31415926');
echo("\n");
$Cache_Lite->remove('31415926');

?>
--GET--
--POST--
--EXPECT--
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Cache Hit !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Cache Missed !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
Cache Hit !
0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
