<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Bienvenidos');
        parent::initialize();
        //cargar los js para la vista de esta función
        $this->assets
            ->collection('footer')
            ->addJs('js/main.js');
    }
    public function indexAction()
    {

    }

}

