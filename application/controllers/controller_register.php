<?php
include_once 'application/core/controller.php';

class Controller_register extends Controller
{
    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php');
    }
}

