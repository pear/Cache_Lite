# PEAR Cache_Lite

Fast and safe little cache system.

This package is a little cache system optimized for file containers.
t is fast and safe (because it uses file locking and/or anti-corruption tests).

[![Build Status](https://travis-ci.org/pear/Cache_Lite.svg)](https://travis-ci.org/pear/Cache_Lite)


## Building
To test this package, run

    phpunit tests/

To build, simply execute

    pear package


## Installation
### PEAR
To install from scratch

    pear install package.xml

To upgrade

    pear upgrade -f package.xml

### Composer

    composer require pear/cache_lite


## Links
- Homepage: http://pear.php.net/package/Cache_Lite
- Source code: https://github.com/pear/Cache_Lite
- Issue tracker: http://pear.php.net/bugs/search.php?cmd=display&package_name[]=Cache_Lite
- Unit test status: https://travis-ci.org/pear/Cache_Lite
- Packagist: https://packagist.org/packages/pear/cache_lite
