<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new User();
        $user->role_id = $this->request->getPost("roleid");
        $user->status = "offline";
        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "username",
                "email",
                "password",
            ]
            
        );

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    
}