<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class EncuestaController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for encuesta
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Encuesta", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "encuesta_id";

        $encuesta = Encuesta::find($parameters);
        if (count($encuesta) == 0) {
            $this->flash->notice("The search did not find any encuesta");

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $encuesta,
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
     * Edits a encuesta
     *
     * @param string $encuesta_id
     */
    public function editAction($encuesta_id)
    {

        if (!$this->request->isPost()) {

            $encuesta = Encuesta::findFirstByencuesta_id($encuesta_id);
            if (!$encuesta) {
                $this->flash->error("encuesta was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "encuesta",
                    "action" => "index"
                ));
            }

            $this->view->encuesta_id = $encuesta->encuesta_id;

            $this->tag->setDefault("encuesta_id", $encuesta->getEncuestaId());
            $this->tag->setDefault("encuesta_fechaCreacion", $encuesta->getEncuestaFechacreacion());
            $this->tag->setDefault("encuesta_habilitado", $encuesta->getEncuestaHabilitado());
            $this->tag->setDefault("encuesta_alojamientoId", $encuesta->getEncuestaAlojamientoid());
            $this->tag->setDefault("encuesta_recepcionId", $encuesta->getEncuestaRecepcionid());
            $this->tag->setDefault("encuesta_unidadId", $encuesta->getEncuestaUnidadid());
            $this->tag->setDefault("encuesta_personalId", $encuesta->getEncuestaPersonalid());
            $this->tag->setDefault("encuesta_adicionalId", $encuesta->getEncuestaAdicionalid());
            $this->tag->setDefault("encuesta_sorteoId", $encuesta->getEncuestaSorteoid());
            $this->tag->setDefault("encuesta_terminado", $encuesta->getEncuestaTerminado());
            
        }
    }

    /**
     * Creates a new encuesta
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "index"
            ));
        }

        $encuesta = new Encuesta();

        $encuesta->setEncuestaId($this->request->getPost("encuesta_id"));
        $encuesta->setEncuestaFechacreacion($this->request->getPost("encuesta_fechaCreacion"));
        $encuesta->setEncuestaHabilitado($this->request->getPost("encuesta_habilitado"));
        $encuesta->setEncuestaAlojamientoid($this->request->getPost("encuesta_alojamientoId"));
        $encuesta->setEncuestaRecepcionid($this->request->getPost("encuesta_recepcionId"));
        $encuesta->setEncuestaUnidadid($this->request->getPost("encuesta_unidadId"));
        $encuesta->setEncuestaPersonalid($this->request->getPost("encuesta_personalId"));
        $encuesta->setEncuestaAdicionalid($this->request->getPost("encuesta_adicionalId"));
        $encuesta->setEncuestaSorteoid($this->request->getPost("encuesta_sorteoId"));
        $encuesta->setEncuestaTerminado($this->request->getPost("encuesta_terminado"));
        

        if (!$encuesta->save()) {
            foreach ($encuesta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "new"
            ));
        }

        $this->flash->success("encuesta was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "encuesta",
            "action" => "index"
        ));

    }

    /**
     * Saves a encuesta edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "index"
            ));
        }

        $encuesta_id = $this->request->getPost("encuesta_id");

        $encuesta = Encuesta::findFirstByencuesta_id($encuesta_id);
        if (!$encuesta) {
            $this->flash->error("encuesta does not exist " . $encuesta_id);

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "index"
            ));
        }

        $encuesta->setEncuestaId($this->request->getPost("encuesta_id"));
        $encuesta->setEncuestaFechacreacion($this->request->getPost("encuesta_fechaCreacion"));
        $encuesta->setEncuestaHabilitado($this->request->getPost("encuesta_habilitado"));
        $encuesta->setEncuestaAlojamientoid($this->request->getPost("encuesta_alojamientoId"));
        $encuesta->setEncuestaRecepcionid($this->request->getPost("encuesta_recepcionId"));
        $encuesta->setEncuestaUnidadid($this->request->getPost("encuesta_unidadId"));
        $encuesta->setEncuestaPersonalid($this->request->getPost("encuesta_personalId"));
        $encuesta->setEncuestaAdicionalid($this->request->getPost("encuesta_adicionalId"));
        $encuesta->setEncuestaSorteoid($this->request->getPost("encuesta_sorteoId"));
        $encuesta->setEncuestaTerminado($this->request->getPost("encuesta_terminado"));
        

        if (!$encuesta->save()) {

            foreach ($encuesta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "edit",
                "params" => array($encuesta->encuesta_id)
            ));
        }

        $this->flash->success("encuesta was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "encuesta",
            "action" => "index"
        ));

    }

    /**
     * Deletes a encuesta
     *
     * @param string $encuesta_id
     */
    public function deleteAction($encuesta_id)
    {

        $encuesta = Encuesta::findFirstByencuesta_id($encuesta_id);
        if (!$encuesta) {
            $this->flash->error("encuesta was not found");

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "index"
            ));
        }

        if (!$encuesta->delete()) {

            foreach ($encuesta->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "encuesta",
                "action" => "search"
            ));
        }

        $this->flash->success("encuesta was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "encuesta",
            "action" => "index"
        ));
    }

}
