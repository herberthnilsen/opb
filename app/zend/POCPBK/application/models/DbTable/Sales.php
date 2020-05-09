<?php
 $frontendOptions = array(
     'automatic_serialization' => true
     );

 $backendOptions  = array(
     'cache_dir' => realpath(APPLICATION_PATH . '/cache')    );

 $cache = Zend_Cache::factory('Core',
                              'File',
                              $frontendOptions,
                              $backendOptions);

// Next, set the cache to be used with all table objects
Zend_Db_Table_Abstract::setDefaultMetadataCache($cache);

class Application_Model_DbTable_Sales extends Zend_Db_Table_Abstract
{
    protected $_schema = 'atpc_user';
    protected $_name = 'sales';
    protected $_primary = 'ID';


}

