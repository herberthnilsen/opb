<?php

class Application_Form_Sales extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'customerName', array('label'=> 'Nome do Cliente'));
        $this->addElement('text', 'qtdRegistros', array('label'=> 'Quantidade Registros', 'value'=>5));
        $this->addElement('hidden', 'page', array( 'value'=>1));

        $this->addElement('submit', 'addPage', array(
            'ignore'   => true,
            'label'    => 'Próxima Página >>',
            'onClick'=>'proximaPagina();'
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Pesquisar'));
    }


}

