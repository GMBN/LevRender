<?php
namespace LevRender\ViewHelper;

class Msg {

    function __invoke() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $html = '<div class="alert %s alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                %s
              </div>';
        $msg = '';
        if (isset($_SESSION['msg_erro'])) {
            foreach ($_SESSION['msg_erro'] as $m) {
                $msg .= sprintf($html, 'alert-danger', $m);
            }
            unset($_SESSION['msg_erro']);
        }
        if (isset($_SESSION['msg_sucesso'])) {
            foreach ($_SESSION['msg_sucesso'] as $m) {
                $msg .= sprintf($html, 'alert-success', $m);
            }
            unset($_SESSION['msg_sucesso']);
        }
        if (isset($_SESSION['msg_aviso'])) {
            foreach ($_SESSION['msg_aviso'] as $m) {
                $msg .= sprintf($html, 'alert-warning', $m);
            }
            unset($_SESSION['msg_aviso']);
        }
        return $msg;
    }

}
