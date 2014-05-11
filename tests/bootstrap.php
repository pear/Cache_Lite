<?php

if (version_compare(PHP_VERSION, '5.4', '>=')) {
    error_reporting(E_ALL ^ E_STRICT);
} else if (version_compare(PHP_VERSION, '5.3', '>=')) {
    error_reporting(E_ALL & ~E_STRICT);
}
