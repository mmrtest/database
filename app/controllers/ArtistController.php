<?php

use Phalcon\Mvc\Controller;

class ArtistController extends Controller
{
    public function indexAction()
    {

    }


    public function detailAction($id)
    {
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);         
        $epo  = Epoch::findFirst([
            'epoch_id = ?0',
            'bind' => [
                0 => $artist->Epoch_epoch_id,
            ]
        ]);
        $cou  = Country::findFirst([
            'country_id = ?0',
            'bind' => [
                0 => $artist->Country_country_id,
            ]
        ]);
       


        // Pass all the username and the posts to the views
        $this->view->setVar('artist', $artist->firstname." ".$artist->midname." " .$artist->lastname);
        $this->view->setVar('date_born', $artist->date_born);
        $this->view->setVar('main_style', $artist->main_style);
        $this->view->setVar('date_die', $artist->date_die);
        $this->view->setVar('artist_id', $artist->artist_id);
        $this->view->setVar('epoch', $epo->epoch_title);
        $this->view->setVar('country', $cou->country_title);
        $this->view->setVar('description', $artist->description);
        $this->view->setVar('image', $artist->image);

    } 

    public function editAction($id)
    {
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);         
        $epo  = Epoch::findFirst([
            'epoch_id = ?0',
            'bind' => [
                0 => $artist->epoch_epoch_id,
            ]
        ]);
        $cou  = Country::findFirst([
            'country_id = ?0',
            'bind' => [
                0 => $artist->country_country_id,
            ]
        ]);
        // Pass all the username and the posts to the views
        $this->view->setVar('firstname', $artist->firstname);
        $this->view->setVar('midname', $artist->midname);
        $this->view->setVar('lastname', $artist->lastname);
        $this->view->setVar('date_born', $artist->date_born);
        $this->view->setVar('main_style', $artist->main_style);
        $this->view->setVar('date_die', $artist->date_die);
        $this->view->setVar('artist_id', $artist->artist_id);
        $this->view->setVar('epoch', $epo->epoch_title);
        $this->view->setVar('country', $cou->country_title);
        $this->view->setVar('des', $artist->description);
        $this->view->setVar('image', $artist->image);
    }

    public function submitAction($id)
    {
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $artist->firstname = $this->request->getPost("firstname");
        $artist->midname = $this->request->getPost("midname");
        $artist->lastname = $this->request->getPost("lastname");
        $artist->date_born = $this->request->getPost("date_born");
        $artist->date_die = $this->request->getPost("date_die");
        $artist->Country_country_id = $this->request->getPost("country");
        $artist->Epoch_epoch_id = $this->request->getPost("epoch");


        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\artist/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                if($file->getName() != "")
                {
                    $artist->image = $file->getName();
                }
            }
        }
        // Store and check for errors
        $success = $artist->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $artist->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }    

    public function addAction()
    {
       
    }

    public function addsubAction()
    {
        echo "<br><br><br>";
        $count = Artist::find();
        $num = count($count);
        for($i=1;$i<=$num;$i++)
       {
        $art = Artist::findFirst([
                    'artist_id = ?0',
                    'bind' => [
                        0 => $i,
                    ]
                ]);
        if ($art === false) {$num++;continue;}
        }
        $artist = new Artist();
        $artist->artist_id = $num+1;
        $artist->firstname = $this->request->getPost("firstname");
        $artist->midname = $this->request->getPost("midname");
        $artist->lastname = $this->request->getPost("lastname");
        $artist->main_style = $this->request->getPost("mainstyle");
        $artist->date_born = $this->request->getPost("dateborn");
        $artist->date_die = $this->request->getPost("datedie");
        $artist->Country_country_id = $this->request->getPost("country");
        $artist->Epoch_epoch_id = $this->request->getPost("epoch");
        $artist->description = $this->request->getPost("des");

        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\artist/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                $artist->image = $file->getName();
                if($file->getName() == "")
                {
                    $artist->image = NULL;
                }
            }
        }

        $success = $artist->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $artist->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }        

    }

    public function deleteAction($id)
    {
        $this->view->setVar('id', $id);
    }

    public function confirmAction($id)
    {
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $count = ArtObjects::find([
            'artist_id = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        for($i=0;$i<count($count);$i++)
        {
            $count[$i]->artist_id = NULL;
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

        if ($artist !== false) {
            if ($artist->delete() === false) {
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


}