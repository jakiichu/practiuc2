<?php
include_once 'application/core/controller.php';

class Controller_logout extends Controller
{
    function action_index()
    {
        $this->view->generate('logout_view.php', 'template_view.php');
    }
}

