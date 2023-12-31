<?php
/**
 * Autoload a class file.
 *
 * @param string $class The fully-qualified class name.
 */
spl_autoload_register(function ($class) {

    // base directory for the class files
    $base_dir = 'src';

    if (strpos($class, 'IMSGlobal\\LTI\\') === 0) {
        $class = substr($class, 14);
    }

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php

    $file = $base_dir . preg_replace('/[\\\\\/]/', DIRECTORY_SEPARATOR, $class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require($file);
    }

});

?>