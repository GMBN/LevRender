<?php

namespace LevRender\Service;

class View {

    private $viewHelper;

    function on($dados, $file_view, $file_template, $js, $viewHelper = []) {
        if (!$dados) {
            return;
        }

        $this->viewHelper = $viewHelper;
        $_template = true;

        $metaDados = \sm::getInstance()->get('_meta');

        ob_start();
        extract($metaDados);
        extract($dados);

        if (!empty($_title)) {
            $this->seo()->title($_title); //seta o titulo da page
        }

        require $file_view;
        //inclui o arquivo js
        if (file_exists($js)) {
            echo '<script type="text/javascript">';
            require $js;
            echo '</script>';
        }
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
            if (!is_callable($className)) {
                $class = new $className;
            } else {
                $class = $className;
            }
            return call_user_func_array($class, $arguments);
        }
    }

}
