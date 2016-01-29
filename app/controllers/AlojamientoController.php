<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AlojamientoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for alojamiento
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Alojamiento", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "alojamiento_id";

        $alojamiento = Alojamiento::find($parameters);
        if (count($alojamiento) == 0) {
            $this->flash->notice("The search did not find any alojamiento");

            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $alojamiento,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction($params)
    {
        $this->view->alojamientoForm = new AlojamientoForm();
        if($params==null)
        {
            $this->flash->error("Es necesario que se registre para poder participar");
            return $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "index"
            ));
        }
        $this->view->encuesta_id =  $params;
        $encuesta = Encuesta::findFirst($params);
        if ($encuesta->getEncuestaAlojamientoid() != NULL) {
            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "new",
                "params" => array('encuesta_id' => $encuesta->getEncuestaId())
            ));
        }
    }

    /**
     * Edits a alojamiento
     *
     * @param string $alojamiento_id
     */
    public function editAction($alojamiento_id)
    {

        if (!$this->request->isPost()) {

            $alojamiento = Alojamiento::findFirstByalojamiento_id($alojamiento_id);
            if (!$alojamiento) {
                $this->flash->error("alojamiento was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "alojamiento",
                    "action" => "index"
                ));
            }

            $this->view->alojamiento_id = $alojamiento->alojamiento_id;

            $this->tag->setDefault("alojamiento_id", $alojamiento->getAlojamientoId());
            $this->tag->setDefault("alojamiento_nroUnidad", $alojamiento->getAlojamientoNrounidad());
            $this->tag->setDefault("alojamiento_cantDias", $alojamiento->getAlojamientoCantdias());
            $this->tag->setDefault("alojamiento_tipoPaxId", $alojamiento->getAlojamientoTipopaxid());
            $this->tag->setDefault("alojamiento_fechaEstadia", $alojamiento->getAlojamientoFechaestadia());
            $this->tag->setDefault("alojamiento_primeraVisita", $alojamiento->getAlojamientoPrimeravisita());
            $this->tag->setDefault("alojamiento_habilitado", $alojamiento->getAlojamientoHabilitado());
            
        }
    }

    /**
     * Creates a new alojamiento
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "index"
            ));
        }
        $encuesta = Encuesta::findFirst($this->request->getPost("encuesta_id",'int'));
        if($encuesta->getEncuestaAlojamientoid()==NULL)
        {
            $alojamiento = new Alojamiento();

            $alojamiento->setAlojamientoNrounidad($this->request->getPost("alojamiento_nroUnidad"));
            $alojamiento->setAlojamientoCantdias($this->request->getPost("alojamiento_cantDias"));
            $alojamiento->setAlojamientoTipopaxid($this->request->getPost("alojamiento_tipoPaxId"));
            $alojamiento->setAlojamientoFechaestadia($this->request->getPost("alojamiento_fechaEstadia"));
            $alojamiento->setAlojamientoPrimeravisita($this->request->getPost("alojamiento_primeraVisita"));
            $alojamiento->setAlojamientoHabilitado(1);


            if (!$alojamiento->save()) {
                foreach ($alojamiento->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "alojamiento",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }

            $encuesta->setEncuestaAlojamientoid($alojamiento->getAlojamientoId());
            if (!$encuesta->update()) {
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "alojamiento",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $this->flash->success("PASO Nº1 COMPLETADO CON EXITO!");
        }
        return $this->dispatcher->forward(array(
            "controller" => "recepcion",
            "action" => "new",
            "params" => array('encuesta_id' => $encuesta->getEncuestaId())
        ));

    }

    /**
     * Saves a alojamiento edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "index"
            ));
        }

        $alojamiento_id = $this->request->getPost("alojamiento_id");

        $alojamiento = Alojamiento::findFirstByalojamiento_id($alojamiento_id);
        if (!$alojamiento) {
            $this->flash->error("alojamiento does not exist " . $alojamiento_id);

            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "index"
            ));
        }

        $alojamiento->setAlojamientoNrounidad($this->request->getPost("alojamiento_nroUnidad"));
        $alojamiento->setAlojamientoCantdias($this->request->getPost("alojamiento_cantDias"));
        $alojamiento->setAlojamientoTipopaxid($this->request->getPost("alojamiento_tipoPaxId"));
        $alojamiento->setAlojamientoFechaestadia($this->request->getPost("alojamiento_fechaEstadia"));
        $alojamiento->setAlojamientoPrimeravisita($this->request->getPost("alojamiento_primeraVisita"));
        $alojamiento->setAlojamientoHabilitado($this->request->getPost("alojamiento_habilitado"));
        

        if (!$alojamiento->save()) {

            foreach ($alojamiento->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "edit",
                "params" => array($alojamiento->alojamiento_id)
            ));
        }

        $this->flash->success("alojamiento was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alojamiento",
            "action" => "index"
        ));

    }

    /**
     * Deletes a alojamiento
     *
     * @param string $alojamiento_id
     */
    public function deleteAction($alojamiento_id)
    {

        $alojamiento = Alojamiento::findFirstByalojamiento_id($alojamiento_id);
        if (!$alojamiento) {
            $this->flash->error("alojamiento was not found");

            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "index"
            ));
        }

        if (!$alojamiento->delete()) {

            foreach ($alojamiento->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alojamiento",
                "action" => "search"
            ));
        }

        $this->flash->success("alojamiento was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alojamiento",
            "action" => "index"
        ));
    }

    /**
     * Encargado de guardar una nueva instancia de alojamiento.
     */
    public function saveAlojamientoAction(){
        $alojamientoForm = new AlojamientoForm();
        if ($this->request->isPost()) {
            $data           = $this->request->getPost();
            $alojamiento = new Alojamiento();
            if(!$alojamientoForm->isValid($data)){
                foreach($alojamientoForm->getMessages() as $mensaje){
                    $this->flash->error($mensaje);
                }
                $this->redireccionar('index/index');
            }

            $alojamiento->assign(array(
                'alojamiento_nroUnidad'     => $this->request->getPost('alojamiento_nroUnidad'),
                'alojamiento_cantDias'      =>  $this->request->getPost('alojamiento_cantDias'),
                'alojamiento_tipoPaxId'     =>  $this->request->getPost('alojamiento_tipoPaxId'),
                'alojamiento_fechaEstadia'  =>  $this->request->getPost('alojamiento_fechaEstadia'),
                'alojamiento_primeraVisita' =>  $this->request->getPost('alojamiento_primeraVisita'),
                'alojamiento_habilitado'    =>  1,
            ));
            if ($alojamiento->save() == false) {
                foreach($alojamiento->getMessages() as $mensaje)
                {
                    $this->flash->error($mensaje);
                }
                $this->redireccionar('index/index');
            }
            $this->flash->notice(" <i class='fa fa-thumbs-o-up' style='font-size: 45px !important;'></i> PASO Nº 1 COMPLETADO CON EXITO! ");
            $this->redireccionar('recepcion/index');
        }
        $this->redireccionar('index/index');
    }

}
