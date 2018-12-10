<?php

use Phalcon\Mvc\Controller;

class LogoutController extends Controller
{
    public function indexAction()
    {
        session_start();
        $_SESSION['user_id'] = NULL;
        $_SESSION['username'] = NULL;
        $this->response->redirect('index');
    }


}