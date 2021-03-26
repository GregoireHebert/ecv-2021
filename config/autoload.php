<?php

spl_autoload_register(function (string $class) {
    $filename = str_replace('\\', '/', substr($class, 4)).'.php';
    require_once ($filename);
});
