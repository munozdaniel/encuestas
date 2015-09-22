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
        $arregloIndexado = array();
        $puntaje = Puntaje::find();
        $consulta = "SELECT  'Nivel de Desempeño' AS NOMBRE,count(rec.recepcion_nivelDesempeno) AS PUNTAJE FROM recepcion as rec
                        RIGHT JOIN puntaje as pun ON rec.recepcion_nivelDesempeno=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON rec.recepcion_id=enc.personal_id
                         GROUP BY pun.puntaje_descripcion";

        $desempeno = $this->modelsManager->executeQuery($consulta);
        $this->view->puntaje  =$puntaje;
        $arregloIndexado[0]=$desempeno;
        $consulta = "SELECT  'Tiempo de Respuesta' AS NOMBRE,count(rec.recepcion_tiempoRespuesta) AS PUNTAJE FROM recepcion as rec
                        RIGHT JOIN puntaje as pun ON rec.recepcion_tiempoRespuesta=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON rec.recepcion_id=enc.personal_id
                         GROUP BY pun.puntaje_descripcion";

        $respuesta = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[1]=$respuesta;
        $consulta = "SELECT  'Trato y Cordialidad' AS NOMBRE,count(rec.recepcion_tratoYCordialidad) AS PUNTAJE FROM recepcion as rec
                        RIGHT JOIN puntaje as pun ON rec.recepcion_tratoYCordialidad=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON rec.recepcion_id=enc.personal_id
                         GROUP BY pun.puntaje_descripcion";


        $cordialidad = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[2]=$cordialidad;

        $this->view->arregloIndexado = $arregloIndexado;
        $this->view->pick("estadistica/index");
    }
    public function personalAction()
    {
        $arregloIndexado = array();
        $puntaje = Puntaje::find();
        $consulta = "SELECT  'Trato Administrativo' AS NOMBRE,count(per.personal_tratoAdministrativo) AS PUNTAJE FROM personal as per
                        RIGHT JOIN puntaje as pun ON per.personal_tratoAdministrativo=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON per.personal_id=enc.personal_id
                         group by pun.puntaje_descripcion";

        $admin = $this->modelsManager->executeQuery($consulta);
        $this->view->puntaje  =$puntaje;
        $arregloIndexado[0]=$admin;

        $consulta = "SELECT  'Mucamas' AS NOMBRE,count(per.personal_tratoMucamas) AS PUNTAJE FROM personal as per
                        RIGHT JOIN puntaje as pun ON per.personal_tratoMucamas=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON per.personal_id=enc.personal_id
                         group by pun.puntaje_descripcion";
        $mucamas = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[1]=$mucamas;

        $this->view->arregloIndexado = $arregloIndexado;
        $this->view->pick("estadistica/index");
    }
    public function unidadAction()
    {
        $arregloIndexado = array();
        $puntaje = Puntaje::find();
        $this->view->puntaje  =$puntaje;

        $consulta = "SELECT  'Higiene' AS NOMBRE,count(uni.puntaje_higiene) AS PUNTAJE FROM unidad as uni
                        RIGHT JOIN puntaje as pun ON uni.puntaje_higiene=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON uni.unidad_id=enc.unidad_id
                         group by pun.puntaje_descripcion";
        $higiene = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[0]=$higiene;

        $consulta = "SELECT  'Equipamiento' AS NOMBRE,count(uni.puntaje_equipamiento) AS PUNTAJE FROM unidad as uni
                        RIGHT JOIN puntaje as pun ON uni.puntaje_equipamiento=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON uni.unidad_id=enc.unidad_id
                         group by pun.puntaje_descripcion";

        $equipo = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[1]=$equipo;
        $consulta = "SELECT  'Confort' AS NOMBRE,count(uni.puntaje_confort) AS PUNTAJE FROM unidad as uni
                        RIGHT JOIN puntaje as pun ON uni.puntaje_confort=pun.puntaje_id
                        LEFT JOIN encuesta as enc ON uni.unidad_id=enc.unidad_id
                         group by pun.puntaje_descripcion";

        $confort = $this->modelsManager->executeQuery($consulta);
        $arregloIndexado[2]=$confort;

        $this->view->arregloIndexado = $arregloIndexado;
        $this->view->pick("estadistica/index");
    }
    /**
     * @return \Phalcon\Http\Response
     */
    public function generarAction3()
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
    public function generarAction2()
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

