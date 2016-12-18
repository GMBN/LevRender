<?php

$e->on(e::preRender, function($dados, $view, $template, $viewHelper) {
    
    $service = new \LevRender\Service\View();
    return $service->render($dados, $view, $template, $viewHelper);
});

new \LevRender\Event\View\Seo();
new \LevRender\Event\View\Render();
