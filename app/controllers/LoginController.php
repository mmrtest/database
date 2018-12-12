<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        if ($this->request->isPost()) {

            $password = $this->request->getPost("password");
            $username = $this->request->getPost("username");

            $user = User::findFirst([
                'username = ?0 AND password = ?1',
                'bind' => [
                    0 => $username,
                    1 => $password
                ]
            ]);

            if (false === $user) {// false
                $this->view->disable();
                $this->response->redirect('login');
                
            } else {// true
                session_start();
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;
                $_SESSION['role_id'] = $user->role_id;
                $user->status = "online";
                $user->save();
                $this->response->redirect('table');
                //$this->flash->error("success");
            }
            
        }

        //$this->flash->error("wrong user / password");
    }


}