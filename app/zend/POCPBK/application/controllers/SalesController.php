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
        $result = $sales->fetchAll();
        $this->view->entries = $result;
    }


}

