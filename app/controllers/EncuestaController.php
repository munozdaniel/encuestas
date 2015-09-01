<?php

class EncuestaController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Bienvenidos');
        parent::initialize();

    }
    public function indexAction()
    {

    }

    /**
     * Villa La Angostura: Muestra la vista para ingresar los datos de la encuesta con
     * componentes elaborados en VillaEncuestaForm.
     */
    public function villaAction()
    {
        $this->view->encuestaForm = new VillaEncuestaForm;
        $this->view->unidadForm = new VillaUnidadForm();
        $this->view->recepcionForm = new VillaRecepcionForm();
    }


}

