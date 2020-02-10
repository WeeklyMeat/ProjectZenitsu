<?php

    spl_autoload_register(function ($class_name) {
        
        if(is_file('controller\\' . $class_name . '.php')) {
            require 'controller\\' . $class_name . '.php';
        }
        elseif (is_file('model\\' . $class_name . '.php')) {
            require 'model\\' . $class_name . '.php';
        }
        elseif (is_file('model\\interfaces\\' . $class_name . '.php')) {
            require 'model\\interfaces\\' . $class_name . '.php';
        }
        else {
            trigger_error("AUTOLOADER: $class_name.php could not be found", E_USER_ERROR);
        }
    });