<?php

use Phalcon\Mvc\Controller;

class LogoutController extends Controller
{
    public function indexAction()
    {
        session_start();

        $user = User::findFirst([
            'user_id = ?0',
            'bind' => [
                0 => $_SESSION['user_id'],
            ]
        ]);
        $user->status = "offline";
        $user->save();

        $_SESSION['user_id'] = NULL;
        $_SESSION['username'] = NULL;
        $_SESSION['role_id'] = NULL;

        $this->response->redirect('index');
    }


}