--TEST--
pearbug7618
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
    'automaticSerialization' => true
);

$cache = new Cache_Lite($options);
$cacheid = "testid";
$tmpar = array();
for ($i=0; $i<2; $i++) {
    $ar[] = 'foo';
    if ($cache->save($ar,$cacheid)) {
        echo "TRUE\n";
    } else {
        echo "FALSE\n";
    }
    if ($data = $cache->get($cacheid)) {
        echo($data[0] . "\n");
    } else {
        echo "FALSE\n";
    }
}
$cache->remove('testid');

?>
--EXPECT--
TRUE
foo
TRUE
foo
