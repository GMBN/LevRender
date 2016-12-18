<?php

namespace LevRender\Service;

class View {

    private $_obj = [];
    private $viewHelper;

    function render($dados, $file_view, $file_template, $viewHelper = []) {

        $this->viewHelper = $viewHelper;
        $_template = true;

        ob_start();
        extract($dados);
        require $file_view;
        $_content = ob_get_clean();

        if ($_template && file_exists($file_template)) {
            require $file_template;
        } else {
            echo $_content;
        }
    }

    function __call($name, $arguments) {
        global $e;
        
        $e->trigger('view.' . $name, $arguments);

        $vh = $this->viewHelper;        

        if (isset($vh[$name])) {
            $className = $vh[$name];
            $class = new $className;            
            return call_user_func_array($class, $arguments);
        }
    }

}
