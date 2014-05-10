--TEST--
Cache_Lite::Cache_Lite (PEAR bug #18328)
--FILE--
<?php

/**
 * Process for test pearbug18328
 * 
 * @see https://pear.php.net/bugs/bug.php?id=18328
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/../Cache/Lite.php';
$c = new Cache_Lite(array('cacheDir' => '.', 'lifeTime' => 60,));
var_dump($c->_cacheDir === '.'); 
$c = new Cache_Lite(array('lifeTime' => 60));
var_dump($c->_cacheDir === (function_exists('sys_get_temp_dir') ? sys_get_temp_dir() . DIRECTORY_SEPARATOR : '/tmp/'));

--GET--
--POST--
--EXPECT--
bool(true)
bool(true)
