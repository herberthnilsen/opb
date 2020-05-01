<?php

class SalesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $sales = new Application_Model_SalesMapper();
        $result = $sales->fetchAll(10, 3);
        $this->view->entries = $result;
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Sales();
 
        if ($this->getRequest()->isPost()) {
            
            if ($form->isValid($request->getPost())) {
            
                $mapper  = new Application_Model_SalesMapper();
                $result = $mapper->fetchAll($form->getValues()['qtdRegistros']);
                
                $this->view->time = $result['time'];
                array_pop($result);
                
                $this->view->entries = $result;
            
            }

        }
 
        
        $this->view->form = $form;
    }



}


