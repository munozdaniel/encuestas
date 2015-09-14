<?php

class ContactoController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Contactos');
        parent::initialize();
        //cargar los js para la vista de esta función
        $this->assets
            ->collection('footer');
    }
    public function indexAction()
    {

    }

}

