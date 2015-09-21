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

    /**
     * @return \Phalcon\Http\Response
     */
    public function generarAction()
    {
        $data_points = array();
        $consulta = "SELECT COUNT(RE.reservacion_id) AS cantidad,RE.reservacion_nombre
                        FROM encuesta AS ENCUESTA, reservacion AS RE WHERE ENCUESTA.reservacion_id=RE.reservacion_id group by RE.reservacion_id";
        $estadistica = $this->modelsManager->executeQuery($consulta);

        foreach($estadistica as $p)
        {
           // echo "title: ", $p->cantidad, " content: ", $p->reservacion_nombre, "<br>";
            $point = array("label" => $p->reservacion_nombre , "y" => $p->cantidad);

            array_push($data_points, $point);
        }
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }
}

