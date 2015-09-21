<?php

class EstadisticaController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Estadisticas');
        parent::initialize();
        $this->assets
            ->collection('footer')->addJs('js/jquery.canvasjs.min.js');
    }

    public function indexAction()
    {
        $this->view->formulario = new BusquedaEstadisticaForm();
    }

}

