<?php
/**
 * Register framework autoload function
 * @todo deprecate this
 *
 * @package     erdiko/core
 * @copyright   2012-2017 Arroyo Labs, Inc. http://www.arroyolabs.com
 * @author      John Arroyo <john@arroyolabs.com>
 */
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . getenv("ERDIKO_ROOT") . PATH_SEPARATOR . getenv("ERDIKO_ROOT") . '/app');

spl_autoload_register(function ($name) {

    if (strpos($name, '\\') !== false) {
        $path = str_replace('\\', '/', $name);
        $class = basename($path);
        $dir = '/'.dirname($path);
        $filename = getenv("ERDIKO_ROOT").$dir.'/'.$class.'.php';
        // error_log("file: $filename");

        if (is_file($filename)) {
            require_once $filename;
            return;
        }
    }
});
