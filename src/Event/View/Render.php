<?php

namespace LevRender\Event\View;

class Render {

    protected $js = array();
    protected $css = array();

    function __construct() {
        global $e;

        //Listeners Js
        $e->on('view.addJs', function($file) {
            $this->js[] = $file;
        });

        $e->on('view.renderJs', function() {
            $html = '';
            foreach ($this->js as $url) {
                $html .= ' <script src="' . $url . '"></script>' . "\n";
            }
            echo $html;
        });
        
        //Listeners Css
        $e->on('view.addCss', function($file) {
            $this->css[] = $file;
        });

        $e->on('view.renderCss', function() {
            $html = '';
            foreach ($this->css as $url) {
                $html .= '<link href="' . $url . '" rel="stylesheet" type="text/css">'. "\n";
            }
            echo $html;
        });
    }

}
