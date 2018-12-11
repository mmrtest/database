<?php

use Phalcon\Mvc\Controller;

class ArtController extends Controller
{
    public function indexAction()
    {

    }


    public function detailAction($id)
    {
        $art  = ArtObjects::findFirst([
            'id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $epo  = Epoch::findFirst([
            'epoch_id = ?0',
            'bind' => [
                0 => $art->epoch_id,
            ]
        ]);
        $cou  = Country::findFirst([
            'country_id = ?0',
            'bind' => [
                0 => $art->country_id,
            ]
        ]);
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $art->artist_id,
            ]
        ]);


        // Pass all the username and the posts to the views
        $this->view->setVar('name', $art->title);
        $this->view->setVar('artist', $artist->firstname." ".$artist->midname." " .$artist->lastname);
        $this->view->setVar('year', $art->year);
        $this->view->setVar('des', $art->description);
        $this->view->setVar('id_no', $art->id_no);
        $this->view->setVar('epoch', $epo->epoch_title);
        $this->view->setVar('country', $cou->country_title);
        $this->view->setVar('image', $art->image);

        $art  = Painting::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', "Painting");
            $this->view->setVar('typeP', $art->paint_type);
            $this->view->setVar('draw', $art->draw_on);
            $this->view->setVar('styleP', $art->style);
        }


        $art  = Sculpture::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', "Sculpture");
            $this->view->setVar('materialSc', $art->material);
            $this->view->setVar('heightSc', $art->height);
            $this->view->setVar('weightSc', $art->weight);
            $this->view->setVar('styleSc', $art->style);
        }


        $art  = Statue::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', "Statue");
            $this->view->setVar('materialSt', $art->material);
            $this->view->setVar('heightSt', $art->height);
            $this->view->setVar('weightSt', $art->weight);
            $this->view->setVar('styleSt', $art->style);
        }


        $art  = Other::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', "Other");
            $this->view->setVar('typeO', $art->type);
            $this->view->setVar('styleO', $art->style);
        }


        $art  = Borrow::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('bo', "Borrow");
            $this->view->setVar('acdate', $art->date);
            $this->view->setVar('redate', $art->date_return);
            $this->view->setVar('from', $art->form);
            $col  = Collections::findFirst([
                'Collections_id = ?0',
                'bind' => [
                    0 => $art->collections_id,
                ]
            ]);
            $this->view->setVar('coll', $col->name);
            if($col->name == NULL){$this->view->setVar('coll', "None");}
        }


        $art  = PermanentCollections::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('bo', "PermanentCollections");
            $this->view->setVar('date', $art->date_acquired);
            $this->view->setVar('cost', $art->cost);
            $this->view->setVar('status', $art->status);
        }


    } 

    public function editAction($id)
    {
        $art  = ArtObjects::findFirst([
            'id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $epo  = Epoch::findFirst([
            'epoch_id = ?0',
            'bind' => [
                0 => $art->epoch_id,
            ]
        ]);
        $cou  = Country::findFirst([
            'country_id = ?0',
            'bind' => [
                0 => $art->country_id,
            ]
        ]);
        $artist  = Artist::findFirst([
            'artist_id = ?0',
            'bind' => [
                0 => $art->artist_id,
            ]
        ]);


        // Pass all the username and the posts to the views
        $this->view->setVar('name', $art->title);
        $this->view->setVar('year', $art->year);
        $this->view->setVar('des', $art->description);
        $this->view->setVar('id_no', $art->id_no);
        $this->view->setVar('epoch', $epo->epoch_title);
        $this->view->setVar('country', $cou->country_title);
        $this->view->setVar('artist_id', $art->artist_id);
        $this->view->setVar('image', $art->image);


        $art  = Painting::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', 1);
            $this->view->setVar('typeP', $art->paint_type);
            $this->view->setVar('draw', $art->draw_on);
            $this->view->setVar('styleP', $art->style);
        }


        $art  = Sculpture::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', 2);
            $this->view->setVar('materialSc', $art->material);
            $this->view->setVar('heightSc', $art->height);
            $this->view->setVar('weightSc', $art->weight);
            $this->view->setVar('styleSc', $art->style);
        }


        $art  = Statue::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', 3);
            $this->view->setVar('materialSt', $art->material);
            $this->view->setVar('heightSt', $art->height);
            $this->view->setVar('weightSt', $art->weight);
            $this->view->setVar('styleSt', $art->style);
        }


        $art  = Other::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('type', 4);
            $this->view->setVar('typeO', $art->type);
            $this->view->setVar('styleO', $art->style);
        }


        $art  = Borrow::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('bo', 1);
            $this->view->setVar('acdate', $art->date);
            $this->view->setVar('redate', $art->date_return);
            $this->view->setVar('from', $art->form);
            $this->view->setVar('coll', $art->collections_id);
        }


        $art  = PermanentCollections::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            $this->view->setVar('bo', 2);
            $this->view->setVar('date', $art->date_acquired);
            $this->view->setVar('cost', $art->cost);
            $this->view->setVar('status', $art->status);
        }

           
    }

    public function submitAction($id,$type,$bo)
    {
        echo "<br><br><br>";
        $art  = ArtObjects::findFirst([
            'id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        $art->title = $this->request->getPost("name");
        $art->description = $this->request->getPost("des");
        $art->artist_id = $this->request->getPost("artist");
        $art->country_id = $this->request->getPost("country");
        $art->epoch_id = $this->request->getPost("epoch");

        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\art_object/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                if($file->getName() != "")
                {
                    $art->image = $file->getName();
                }
            }
        }

        // Store and check for errors
        $success = $art->update();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $art->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        //type
        if($type == 1){

            $typ  = Painting::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $typ->paint_type = $this->request->getPost("typeP");
            $typ->draw_on = $this->request->getPost("draw");
            $typ->style = $this->request->getPost("styleP");
            $success = $typ->save();  

        }else if($type == 2){

            $typ  = Sculpture::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $typ->material = $this->request->getPost("materialSc");
            $typ->height = $this->request->getPost("heightSc");
            $typ->weight = $this->request->getPost("weightSc");
            $typ->style = $this->request->getPost("styleSc");
            $success = $typ->save();  

        }else if($type == 3){

            $typ  = Statue::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $typ->material = $this->request->getPost("materialSt");
            $typ->height = $this->request->getPost("heightSt");
            $typ->weight = $this->request->getPost("weightSt");
            $typ->style = $this->request->getPost("styleSt");
            $success = $typ->save(); 
            
        }else if($type == 4){
            
            $typ  = Other::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $typ->type = $this->request->getPost("typeO");
            $typ->style = $this->request->getPost("styleO");
            $success = $typ->save(); 
            
        }
            if ($success) {
                echo "Thanks for updating!";
            } else {
                echo "Sorry, the following problems were generated: ";
    
                $messages = $typ->getMessages();
    
                foreach ($messages as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }

        //bo
        if($bo == 1){

            $bor  = Borrow::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $bor->date = $this->request->getPost("acdate");
            $bor->date_return = $this->request->getPost("redate");
            $bor->form = $this->request->getPost("from");
            if($this->request->getPost("coll") == 0)
            {
                $bor->collections_id = NULL;
            }else{$bor->collections_id = $this->request->getPost("coll");}
            $success = $bor->save();  

        }else if($bo == 2){

            $bor  = PermanentCollections::findFirst([
                'Art_Objects_id_no = ?0',
                'bind' => [
                    0 => $id,
                ]
            ]);
            $bor->date_acquired = $this->request->getPost("date");
            $bor->cost = $this->request->getPost("cost");
            $bor->status = $this->request->getPost("status");
            $success = $bor->save();  

        }
        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $bor->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        //$this->response->redirect('table');


    }

    public function addAction($type,$bo)
    {
        $this->view->setVar('type', $type);
        $this->view->setVar('bo', $bo);
    }

    public function addsubAction($type,$bo)
    {
        echo "<br><br><br>";
        $count = ArtObjects::find();
        $num = count($count);
        for($i=1;$i<=$num;$i++)
       {
        $art = ArtObjects::findFirst([
                    'id_no = ?0',
                    'bind' => [
                        0 => $i,
                    ]
                ]);
        if ($art === false) {$num++;continue;}
        }
        $art = new ArtObjects();
        $art->id_no = $num+1;
        $art->title = $this->request->getPost("name");
        $art->description = $this->request->getPost("des");
        $art->artist_id = $this->request->getPost("artist");
        $art->country_id = $this->request->getPost("country");
        $art->epoch_id = $this->request->getPost("epoch");

        if ($this->request->hasFiles() == true) {
            $baseLocation = 'C:\xampp\htdocs\database\public\img\art_object/';
            foreach ($this->request->getUploadedFiles() as $file) {
                //Move the file into the application
                $file->moveTo($baseLocation . $file->getName());
                $art->image = $file->getName();
                if($file->getName() == "")
                {
                    $art->image = NULL;
                }
            }
        }

        /*$target_dir = "/database/public/img/art_object/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $art->image = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }*/

        $success = $art->save();

        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $art->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        //type
        if($type == 1){

            $typ = new Painting();
            $typ->Art_Objects_id_no = $num+1;
            $typ->paint_type = $this->request->getPost("typeP");
            $typ->draw_on = $this->request->getPost("draw");
            $typ->style = $this->request->getPost("styleP");
            $success = $typ->save();  

        }else if($type == 2){

            $typ = new Sculpture();
            $typ->Art_Objects_id_no = $num+1;
            $typ->material = $this->request->getPost("materialSc");
            $typ->height = $this->request->getPost("heightSc");
            $typ->weight = $this->request->getPost("weightSc");
            $typ->style = $this->request->getPost("styleSc");
            $success = $typ->save();  

        }else if($type == 3){

            $typ = new Statue();
            $typ->Art_Objects_id_no = $num+1;
            $typ->material = $this->request->getPost("materialSt");
            $typ->height = $this->request->getPost("heightSt");
            $typ->weight = $this->request->getPost("weightSt");
            $typ->style = $this->request->getPost("styleSt");
            $success = $typ->save(); 
            
        }else if($type == 4){
            $typ = new Other();
            $typ->Art_Objects_id_no = $num+1;
            $typ->type = $this->request->getPost("typeO");
            $typ->style = $this->request->getPost("styleO");
            $success = $typ->save(); 
            
        }
            if ($success) {
                echo "Thanks for updating!";
            } else {
                echo "Sorry, the following problems were generated: ";
    
                $messages = $typ->getMessages();
    
                foreach ($messages as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }

        //bo
        if($bo == 1){

            $bor = new Borrow();
            $bor->Art_Objects_id_no = $num+1;
            $bor->date = $this->request->getPost("acdate");
            $bor->date_return = $this->request->getPost("redate");
            $bor->form = $this->request->getPost("from");
            if($this->request->getPost("coll") == 0)
            {
                $bor->collections_id = NULL;
            }else{$bor->collections_id = $this->request->getPost("coll");}
            echo $this->request->getPost("coll");
            $success = $bor->save();  

        }else if($bo == 2){

            $bor = new PermanentCollections();
            $bor->Art_Objects_id_no = $num+1;
            $bor->date_acquired = $this->request->getPost("date");
            $bor->cost = $this->request->getPost("cost");
            $bor->status = $this->request->getPost("status");
            $success = $bor->save();  

        }
        if ($success) {
            echo "Thanks for updating!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $bor->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        //$this->response->redirect('table');
        

    }

    public function chooseAction()
    {

    }

    public function passAction()
    {
        $type = $this->request->getPost("type");
        $bo = $this->request->getPost("bo");
        $this->response->redirect('art/add/'.$type.'/'.$bo);
    }

    public function deleteAction($id)
    {
        

        $art  = Painting::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }

        $art  = Sculpture::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }

        $art  = Statue::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }

        $art  = Other::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }

        $art  = Borrow::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }

        $art  = PermanentCollections::findFirst([
            'Art_Objects_id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
                foreach ($messages as $message) {
                    echo $message, "\n";
                }
            } else {
                echo 'Deleted successfully!';
            }
        }
        $art  = ArtObjects::findFirst([
            'id_no = ?0',
            'bind' => [
                0 => $id,
            ]
        ]);
        if ($art !== false) {
            if ($art->delete() === false) {
                echo "Sorry, we can't delete\n";
        
                $messages = $art->getMessages();
        
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
