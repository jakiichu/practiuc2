<?php
include_once 'application/core/controller.php';

class Controller_check extends Controller
{
    function action_index()
    {
        $this->view->generate('check_view.php', 'template_view.php');
    }
}

