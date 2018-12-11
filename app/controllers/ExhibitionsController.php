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
        echo "<br><br><br>";
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
            $baseLocation = 'C:\xampp\htdocs\database\public\img\artist/';
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


}