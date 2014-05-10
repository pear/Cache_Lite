<?php

// Bench script of Cache_Lite
// $Id$

require_once __DIR__ . '/../Cache/Lite.php';

$options = array(
    'caching' => true,
    'cacheDir' => '/tmp/',
    'lifeTime' => 10
);

$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite->get('123')) {
    echo($data);
} else {
    $data = '';
    for($i=0;$i<1000;$i++) {
        $data .= '0123456789';
    }
    echo($data);
    $Cache_Lite->save($data);
}

?>
