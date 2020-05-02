<?php

class Application_Model_SalesMapper
{

    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Sales');
        }
        return $this->_dbTable;
    }
 

    public function fetchAll(  $limit=10, $page=null)
    {

        $select = $this->getDbTable()->select()
        ->order('id asc');
        if($page > 0){

            $select->limit($limit, ($page-1)*$limit);
        }else{
            $select->limit($limit);
        }

        $timestamp = (int) (microtime(true) * 1000);
        $resultSet = $this->getDbTable()->fetchAll($select);
        $timestampDB=(int) (microtime(true) * 1000);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Sales();
            $entry->setId($row->ID)
                  ->setProduct($row->PRODUCT_ID)
                  ->setIdCustomer($row->CUSTOMER_ID)
                ;
            $entries[] = $entry;
        }
        $entries['timeDB']=$timestampDB-$timestamp;
        $entries['time']=((int) (microtime(true) * 1000))-$timestamp;
        return $entries;       
    }
}

