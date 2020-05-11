<?php

class Application_Model_DbTable_Customers extends Zend_Db_Table_Abstract
{

    protected $_schema = 'atpc_user';
    protected $_name = 'customers';
    protected $_primary = 'ID';

}

