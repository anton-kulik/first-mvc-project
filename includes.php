<?php

function autoload($className) {
    
	$className = str_replace('\\', DS, $className);
    $file = $className . '.php' ;

    if(file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoload');