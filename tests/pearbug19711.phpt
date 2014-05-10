--TEST--
Cache_Lite::Cache_Lite (PEAR bug #19711)
--FILE--
<?php

/**
 * Test for Pear Bug #19711
 *
 * @see https://pear.php.net/bugs/bug.php?id=19711
 *
 * @package Cache_Lite
 * @category Caching
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/../Cache/Lite.php';
require_once __DIR__ . '/tmpdir.inc';

$options = array(
    'cacheDir' => tmpDir() . '/',
    'lifeTime' => 60,
    'automaticSerialization' => true
);

$Cache_Lite = new Cache_Lite($options);
$data = array('apples', 'oranges');
$Cache_Lite->save($data, 'array_cached');
$fetched_data = $Cache_Lite->get('array_cached');

var_dump($data === $fetched_data);

?>
--GET--
--POST--
--EXPECT--
bool(true)
