<?php

return [
    'sm' => [
        'assets' => \LevRender\ViewHelper\Assets::class,
        'seo' => \LevRender\ViewHelper\Seo::class
    ],
    'eventGlobal' => [
        e::preRender => \LevRender\Service\View::class
    ],
    'viewHelper' => [
        'msg' => \LevRender\ViewHelper\Msg::class,
        'assets' => function() {
            $obj = \sm::getInstance()->get('assets');
            return $obj;
        },
        'seo' => function() {
            $obj = \sm::getInstance()->get('seo');
            return $obj;
        }
    ]
];
