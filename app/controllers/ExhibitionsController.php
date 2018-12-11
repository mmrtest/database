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


}