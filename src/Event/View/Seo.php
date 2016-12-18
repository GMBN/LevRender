<?php

namespace LevRender\Event\View;

class Seo {

    protected $head = '';

    function __construct() {
        global $e;

        $e->on('view.title', function($titulo) {
            $this->head .= '<title>' . $titulo . ' | SOS Casar</title>'
                    . '<meta property="og:title" content="' . $titulo . ' | SOS Casar" />';
        });
        
        $e->on('view.metaDesc', function($desc) {
            $this->head .= '<meta name="description" content="'.$desc.'"/>'
               . '<meta property="og:description" content="'.$desc.'" />';
        });
        
        $e->on('view.metaImg', function($url) {
            $this->head .= ' <meta property="og:image" content="'.$url.'" />';
        });

        $e->on('view.getHead', function() {
            echo $this->head;
        });
    }

}
