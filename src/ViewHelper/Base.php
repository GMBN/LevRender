<?php

namespace LevRender\ViewHelper;

abstract class Base {

    public function __call($name, $arguments) {
         $config =  \sm::getInstance()->get('config');
         $e = \sm::getInstance()->get('e');

        $vh = $config['viewHelper'];
        $e->trigger('view.' . $name, $arguments);
        
        if (isset($vh[$name])) {
            $class = new $vh[$name];
            return call_user_func_array($class, $arguments);
        }
    }

}
