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
        $this->view->encuestaForm = new VillaEncuestaForm;
        $this->view->unidadForm = new VillaUnidadForm();
        $this->view->recepcionForm = new VillaRecepcionForm();
        $this->view->personalForm = new VillaPersonalForm();
    }

}

