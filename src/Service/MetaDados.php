<?php

namespace LevRender\Service;

use Base\Service\AnnotationParse;

class MetaDados {

    function on($module, $controller, $action) {
        $re = new \ReflectionMethod($controller, $action);
        $re->getDocComment();
        $title= AnnotationParse::getValue('title', $re->getDocComment());
        \sm::getInstance()->set('_meta', ['_title'=> $title]);
    }

}
