<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Bienvenidos');
        parent::initialize();
        //cargar los js para la vista de esta función
        $this->assets
            ->collection('footer');
    }
    public function indexAction()
    {
        $this->assets
            ->addJs('js/main.js');
        $this->view->encuestaForm = new EncuestaForm;
        $this->view->unidadForm = new UnidadForm();
        $this->view->recepcionForm = new RecepcionForm();
        $this->view->personalForm = new PersonalForm();

    }


}

