<?php
include_once 'application/core/controller.php';

class Controller_add extends Controller
{
    function action_index()
    {
        $this->view->generate('add_view.php', 'template_view.php');
    }
}

