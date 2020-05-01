<?php

class Application_Model_Sales
{
    protected $_id;
    protected $_product;
    protected $_customer_id;

    public function setId(int $idSales){
        $this->_id = $idSales;
        return $this;    
    }
    public function getId(){
        return $this->_id;
    }

    public function setProduct(int $idProduct){
        $this->_product = $idProduct;
        return $this;    
    }
    public function getProduct(){
        return $this->_product;
    }

    public function setIdCustomer(int $idCustomer){
        $this->_customer_id = $idCustomer;
        return $this;    
    }
    public function getIdCustomer(){
        return $this->_customer_id;
    }

    public function __construct(array $options = null)
    {
        if ($options != null && is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid sales property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid sales property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

}

