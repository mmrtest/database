<?php

use Phalcon\Mvc\Controller;

class  ExhibitionsController extends Controller
{
    public function indexAction()
    {
        
        
    }
    public function detailexhibitionAction($id)
    {
        $this->view->setVar('id', $id);
        
    }

    public function addAction()
    {
        
        
    }

    public function addsubAction()
    {
        $count = Exhibitions::find();
        $num = count($count)+1;
        $ex = new Exhibitions();
        $ex->ex_id = $num;
        $ex->ex_name = $this->request->getPost("exname");
        $ex->num_people = $this->request->getPost("num");
        $ex->start_date = $this->request->getPost("datestr");
        $ex->end_date = $this->request->getPost("dateend");
        
        $wsb = $this->request->getPost("formats");

        $numWsb = count($wsb);

        for($i=0;$i<$numWsb;$i++){
            $temp = new WasShowBy();
            $temp->Art_Objects_id_no = $wsb[$i];
            $temp->Exhibitions_ex_id = $num;



            $success = $temp->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $temp->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        } 
        }

        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\exhibitions/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                $ex->image = $file->getName();
                if($file->getName() == "")
                {
                    $ex->image = NULL;
                }
            }
        }

        $success = $ex->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $ex->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }        

    }

    public function editAction($id)
    {
        $ex  = Exhibitions::findFirst([
            'ex_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]); 
        $wsb  = WasShowBy::find("Exhibitions_ex_id = '$id'");           

        // Pass all the username and the posts to the views
        $this->view->setVar('exname', $ex->ex_name);
        $this->view->setVar('datestr', $ex->start_date);
        $this->view->setVar('dateend', $ex->end_date);
        $this->view->setVar('num', $ex->num_people);
        $this->view->setVar('wsb', $wsb);
        $this->view->setVar('image', $ex->image);
        $this->view->setVar('id', $ex->ex_id);
    }

    public function submitAction($id)
    {
        $ex  = Exhibitions::findFirst([
            'ex_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $ex->ex_name = $this->request->getPost("exname");
        $ex->num_people = $this->request->getPost("num");
        $ex->start_date = $this->request->getPost("datestr");
        $ex->end_date = $this->request->getPost("dateend");

        $wsb = $this->request->getPost("formats");

        $numWsb = count($wsb);
        
        $count = WasShowBy::find("Exhibitions_ex_id = '$id'");
        $num = count($count);
        for($i=0;$i<$num;$i++){
            
        if ($count[$i] !== false) {
            if ($count[$i]->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $count[$i]->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }
        }


        for($i=0;$i<$numWsb;$i++){
            $temp = new WasShowBy();
            $temp->Art_Objects_id_no = $wsb[$i];
            $temp->Exhibitions_ex_id = $id;



            $success = $temp->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $temp->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        } 
        }


        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\exhibitions/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                if($file->getName() != "")
                {
                    $ex->image = $file->getName();
                }
            }
        }
        // Store and check for errors
        $success = $ex->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $ex->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function deleteAction($id)
    { 
    $ex  = Exhibitions::findFirst([
        'ex_id = ?0',
        'bind' => [
            0 => $id,
        ]
    ]);

        $count = WasShowBy::find("Exhibitions_ex_id = '$id'");
        $num = count($count);
        for($i=0;$i<$num;$i++){
            
        if ($count[$i] !== false) {
            if ($count[$i]->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $count[$i]->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }
        }
    if ($ex !== false) {
        if ($ex->delete() === false) {
            echo "Sorry, we can't delete\n";
    
            $messages = $ex->getMessages();
    
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