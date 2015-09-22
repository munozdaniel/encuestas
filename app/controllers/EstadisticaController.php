<?php

class EstadisticaController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Estadisticas');
        parent::initialize();
        $this->assets
            ->collection('footer')
            ->addJs('js/highcharts/highcharts.js')
            ->addJs('js/highcharts/exporting.js')
            ->addJs('js/highcharts/data.js')
            ->addJs('js/highcharts/highcharts.personalizado.js');
    }

    public function indexAction()
    {
        //echo "SSSSTADISTIC";
        //$this->view->formulario = new BusquedaEstadisticaForm();
        $puntaje = Puntaje::find();
        $consulta = "SELECT count(PE.personal_tratoAdministrativo) AS TRATO,PUNTO.puntaje_descripcion  FROM encuesta AS ENCUESTA JOIN personal AS PE ON ENCUESTA.personal_id=PE.personal_id  JOIN puntaje AS PUNTO ON PE.personal_tratoAdministrativo=PUNTO.puntaje_id group by  PE.personal_tratoAdministrativo";
        $estadistica = $this->modelsManager->executeQuery($consulta);

        $this->view->puntaje  =$puntaje;
        $this->view->administrativo= $estadistica;


    }

    /**
     * @return \Phalcon\Http\Response
     */
    public function indexAction2()
    {

        //$this->view->disable();
        //$response = new \Phalcon\Http\Response();
        $data_points = array();
        $consulta = "SELECT COUNT(RE.reservacion_id) AS cantidad,RE.reservacion_nombre
                        FROM encuesta AS ENCUESTA, reservacion AS RE WHERE ENCUESTA.reservacion_id=RE.reservacion_id group by RE.reservacion_id";
        $estadistica = $this->modelsManager->executeQuery($consulta);

        foreach($estadistica as $p)
        {
         //  echo "title: ", $p->cantidad, " content: ", $p->reservacion_nombre, "<br>";
            $point = array("name" => $p->reservacion_nombre , "data" => $p->cantidad);

            array_push($data_points, $point);
        }
        $this->view->pick("estadistica/index");
        $this->view->data =  json_encode($data_points, JSON_NUMERIC_CHECK);
        //$response->setContent(json_encode($data_points));

        // echo json_encode($data_points, JSON_NUMERIC_CHECK);
        //return $response;

    }
    /**
     * @return \Phalcon\Http\Response
     */
    public function generarAction()
    {
        echo "GENERAR";
       /* $this->view->disable();
        $data = $this->view->getParamsToView();

        $data_points = array();
        $consulta = "SELECT count(PE.personal_tratoAdministrativo) AS TRATO,PUNTO.puntaje_descripcion  FROM encuesta AS ENCUESTA JOIN personal AS PE ON ENCUESTA.personal_id=PE.personal_id  JOIN puntaje AS PUNTO ON PE.personal_tratoAdministrativo=PUNTO.puntaje_id group by  PE.personal_tratoAdministrativo";
        $estadistica = $this->modelsManager->executeQuery($consulta);

        foreach($estadistica as $p)
        {
            //  echo "title: ", $p->cantidad, " content: ", $p->reservacion_nombre, "<br>";
            $point = array("label" => $p->TRATO , "y" => $p->puntaje_descripcion);

            array_push($data_points, $point);
        }

        $json =  json_encode($data_points, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $this->response
            ->setContentType('application/json', 'utf-8')
            ->setContent($json);
        //$this->view->disable();
        //$response = new \Phalcon\Http\Response();

        //$response->setContent(json_encode($data_points));

        // echo json_encode($data_points, JSON_NUMERIC_CHECK);
        //return $response;
        return $this->response->send();
       */
    }
    // This action invokes the statistics view
    public function statisticAction()
    {
        $this->view->pick("/estadistica/index");
    }
}

