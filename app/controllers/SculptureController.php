<?php

use Phalcon\Mvc\Controller;

class SculptureController extends Controller
{
    public function indexAction()
    {
        $this->response->redirect('sculpture/listsculpture');
    }

    public function listsculptureAction()
    {      
        
    }


}