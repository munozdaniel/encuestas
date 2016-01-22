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
    public function newAction()
    {

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
                "controller" => "alojamiento",
                "action" => "index"
            ));
        }

        $alojamiento = new Alojamiento();

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
                "action" => "new"
            ));
        }

        $this->flash->success("alojamiento was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "alojamiento",
            "action" => "index"
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
        $this->view->disable();
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
            if($this->request->getPost('alojamiento_primeraVisita')=="SI")
                $primeraVisita = 1;
            else
                $primeraVisita = 0;
            $alojamiento->assign(array(
                'alojamiento_nroUnidad'     => $this->request->getPost('alojamiento_nroUnidad'),
                'alojamiento_cantDias'      =>  $this->request->getPost('alojamiento_cantDias'),
                'alojamiento_tipoPaxId'     =>  $this->request->getPost('alojamiento_tipoPaxId'),
                'alojamiento_fechaEstadia'  =>  $this->request->getPost('alojamiento_fechaEstadia'),
                'alojamiento_primeraVisita' =>  $primeraVisita,
                'alojamiento_habilitado'    =>  1,
            ));
            if ($alojamiento->save() == false) {
                foreach($alojamiento->getMessages() as $mensaje)
                {
                    $this->flash->error($mensaje);
                }
                $this->redireccionar('index/index');
            }
            $this->response->redirect('index/recepcion');
        }
        $this->redireccionar('index/index');
    }
}
