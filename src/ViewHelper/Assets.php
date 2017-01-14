<?php

namespace LevRender\ViewHelper;

class Assets {

    protected $_css = array();
    protected $_js = array();

    function cropper() {
        $this->addCss('/vendor/cropper/cropper.min.css');
        $this->addJs('/vendor/cropper/cropper.min.js');
    }
     function moment() {
        $this->addJs('/vendor/moment/moment.js');
        $this->addJs('/vendor/moment/moment-with-locales.js');
    }

    function dateTimePicker() {
        $this->moment();
        $this->addCss('https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css');
        $this->addJs('https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js');
    }

    function addCss($url) {
        $this->_css[] = '<link href="' . $url . '" rel="stylesheet" type="text/css">';
    }

    function addJs($url) {
        $this->_js[] = ' <script src="' . $url . '"></script>';
    }

    function renderJs() {
        return implode("\n", $this->_js);
    }

    function renderCss() {
        return implode("\n", $this->_css);
    }

}
