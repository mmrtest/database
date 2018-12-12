<?php

use Phalcon\Mvc\Controller;

class CollectionController extends ControllerBase
{
    public function indexAction()
    {
      
    }

    public function addAction()
    {
      
    }

    public function addsubAction()
    {
        $count = Collections::find();
        $num = count($count);
        for($i=1;$i<=$num;$i++)
       {
        $art = Collections::findFirst([
                    'Collections_id = ?0',
                    'bind' => [
                        0 => $i,
                    ]
                ]);
        if ($art === false) {$num++;continue;}
        }
        $co = new Collections();
        $co->Collections_id = $num+1;
        $co->name = $this->request->getPost("coname");
        $co->type = $this->request->getPost("type");
        $co->description = $this->request->getPost("des");
        $co->address = $this->request->getPost("addr");
        $co->phone = $this->request->getPost("phone");
        $co->contact_person = $this->request->getPost("cont");

        $success = $co->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $co->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }        

    }

    public function editAction($id)
    {
        $co  = Collections::findFirst([
            'Collections_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);           
        // Pass all the username and the posts to the views
        $this->view->setVar('coname', $co->name);
        $this->view->setVar('type', $co->type);
        $this->view->setVar('des', $co->description);
        $this->view->setVar('addr', $co->address);
        $this->view->setVar('phone', $co->phone);
        $this->view->setVar('cont', $co->contact_person);
        $this->view->setVar('id', $co->Collections_id);
    }

    public function submitAction($id)
    {
        $co  = Collections::findFirst([
            'Collections_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $co->name = $this->request->getPost("coname");
        $co->type = $this->request->getPost("type");
        $co->description = $this->request->getPost("des");
        $co->address = $this->request->getPost("addr");
        $co->phone = $this->request->getPost("phone");
        $co->contact_person = $this->request->getPost("cont");

        // Store and check for errors
        $success = $co->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $co->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function deleteAction($id)
    {
        $co  = Collections::findFirst([
            'Collections_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $count = Borrow::find([
            'collections_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        for($i=0;$i<count($count);$i++)
        {
            $count[$i]->collections_id = NULL;
            $success = $count[$i]->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $count[$i]->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        }

        if ($co !== false) {
            if ($co->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $artist->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
       }    
        $this->response->redirect('table');
        
    }

    public function detailAction($id)
    {
        $co  = Collections::findFirst([
            'Collections_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $this->view->setVar('id', $id);
        $this->view->setVar('coname', $co->name);

    }
}

