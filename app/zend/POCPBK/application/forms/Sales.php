<?php

class Application_Form_Sales extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'qtdRegistros', array('label'=> 'Quantidade Registros'));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Pesquisar'));
    }


}

