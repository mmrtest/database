<?php

use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    public function indexAction()
    {

    }

    public function editAction($id)
    {
        $user  = User::findFirst([
            'user_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);         
        // Pass all the username and the posts to the views
        $this->view->setVar('id', $id);
        $this->view->setVar('name', $user->username);
        $this->view->setVar('pass', $user->password);
        $this->view->setVar('mail', $user->email);
        $this->view->setVar('role_id', $user->role_id);
        $this->view->setVar('status', $user->status);
    }

    public function submitAction($id)
    {
        $user  = User::findFirst([
            'user_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]); 
        $user->username = $this->request->getPost("name");
        $user->password = $this->request->getPost("pass");
        $user->email = $this->request->getPost("mail");
        $user->role_id = $this->request->getPost("role");

        $success = $user->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function deleteAction($id)
    {
        $this->view->setVar('id', $id);
    }
    
    public function deletesubAction($id)
    {
        $user  = User::findFirst([
            'user_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);

        if ($user !== false) {
            if ($user->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $user->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
       }    
        $this->response->redirect('table');
        
    }

}