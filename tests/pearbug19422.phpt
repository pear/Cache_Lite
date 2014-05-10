--TEST--
Cache_Lite::Cache_Lite (PEAR bug #19422)
--FILE--
<?php

/**
 * Test for Pear Bug #19422
 *
 * @see https://pear.php.net/bugs/bug.php?id=19422
 * @see https://bugs.php.net/bug.php?id=30936
 *
 * @package Cache_Lite
 * @category Caching
 * @author Markus Tacker <tacker@php.net>
 */

require_once __DIR__ . '/../Cache/Lite.php';

define('FsStreamWrapper_CACHE_DIR', sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'cachelite-streamwrapper' . DIRECTORY_SEPARATOR);

class FsStreamWrapper
{
    const SCHEME = 'public';
    private $fp;

    public function __construct()
    {
        if (!is_dir(FsStreamWrapper_CACHE_DIR)) mkdir(FsStreamWrapper_CACHE_DIR);
    }

    public function url_stat($path, $flags)
    {
        $localpath = $this->scheme2file($path);
        if (!is_file($localpath)) return 0;
        return stat($localpath);
    }

    private function scheme2file($path)
    {
        return str_replace(self::SCHEME . '://', FsStreamWrapper_CACHE_DIR, $path);
    }

    public function stream_open($path, $mode, $options, &$opath)
    {
        $this->fp = fopen($this->scheme2file($path), $mode);
        return true;
    }

    public function stream_write($data)
    {
        return fwrite($this->fp, $data);
    }

    public function stream_close()
    {
        return fclose($this->fp);
    }

    public function stream_lock($operation)
    {
        return flock($this->fp, $operation);
    }

    public function unlink($path)
    {
        return unlink($this->scheme2file($path));
    }

    public function stream_read($count)
    {
        return fread($this->fp, $count);
    }

    public function stream_eof()
    {
        return feof($this->fp);
    }

    public function stream_seek($offset, $whence)
    {
        return !fseek($this->fp, $offset, $whence);
    }

    public function stream_flush()
    {
        return fflush($this->fp);
    }

    public function stream_tell()
    {
        return ftell($this->fp);
    }

    public function rename($from_uri, $to_uri)
    {
        return rename($this->scheme2file($from_uri), $this->scheme2file($to_uri));
    }
}

$xml = array();
$cacheOpt = array();
$cacheOpt['cacheDir'] = 'public://';
$cacheOpt['cache_time'] = 3600;
$Cache_Lite = new Cache_Lite($cacheOpt);
$Cache_Lite->setToDebug();

stream_wrapper_register(FsStreamWrapper::SCHEME, 'FsStreamWrapper');

$fp = fopen('/dev/urandom', 'r');
$data = fread($fp, 32 * 1024);
fclose($fp);
$Cache_Lite->save($data, 'largechache');
$verify = $Cache_Lite->get('largechache');

var_dump(strlen($data) === strlen($verify));
var_dump($data === $verify);

?>
--GET--
--POST--
--EXPECT--
bool(true)
bool(true)
