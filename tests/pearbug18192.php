<?php

/**
 * Process for test pearbug18192
 *
 * @see https://pear.php.net/bugs/bug.php?id=18192
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/../Cache/Lite.php';
$c = new Cache_Lite(array('cacheDir' => '.', 'lifeTime' => 60));
$id = '#18192';
for ($i = 0; $i < 100000; $i++) {
	$str = uniqid('some-string', true);
	if (!$c->save($str, $id)) fputs(STDERR, "Error saving.\n");
	if ($c->get($id) !== $str) fputs(STDERR, "Wrong data.\n");
}
