<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class RecepcionController extends ControllerBase
{

    /**
     * Etapa Nº2
     */
    public function indexAction()
    {
        //        $this->persistent->parameters = null;
    }

    /**
     * Searches for recepcion
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Recepcion", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "recepcion_id";

        $recepcion = Recepcion::find($parameters);
        if (count($recepcion) == 0) {
            $this->flash->notice("The search did not find any recepcion");

            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $recepcion,
            "limit" => 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction($params)
    {
        $this->view->recepcionForm = new RecepcionForm();

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
        if ($encuesta->getEncuestaRecepcionid() != NULL) {
            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "new",
                "params" => array('encuesta_id' => $encuesta->getEncuestaId())
            ));
        }
    }

    /**
     * Edits a recepcion
     *
     * @param string $recepcion_id
     */
    public function editAction($recepcion_id)
    {

        if (!$this->request->isPost()) {

            $recepcion = Recepcion::findFirstByrecepcion_id($recepcion_id);
            if (!$recepcion) {
                $this->flash->error("recepcion was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "recepcion",
                    "action" => "index"
                ));
            }

            $this->view->recepcion_id = $recepcion->recepcion_id;

            $this->tag->setDefault("recepcion_id", $recepcion->getRecepcionId());
            $this->tag->setDefault("recepcion_puntajeNivelId", $recepcion->getRecepcionPuntajenivelid());
            $this->tag->setDefault("recepcion_puntajeTiempoId", $recepcion->getRecepcionPuntajetiempoid());
            $this->tag->setDefault("recepcion_puntajeTratoId", $recepcion->getRecepcionPuntajetratoid());
            $this->tag->setDefault("recepcion_tieneInconvenientes", $recepcion->getRecepcionTieneinconvenientes());
            $this->tag->setDefault("recepcion_comentario", $recepcion->getRecepcionComentario());
            $this->tag->setDefault("recepcion_habilitado", $recepcion->getRecepcionHabilitado());

        }
    }

    /**
     * Creates a new recepcion
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "index",
                "action" => "index"
            ));
        }
        $encuesta = Encuesta::findFirst($this->request->getPost("encuesta_id", 'int'));
        if ($encuesta->getEncuestaRecepcionid() == NULL) {
            $recepcion = new Recepcion();

            $recepcion->setRecepcionPuntajenivelid($this->request->getPost("recepcion_puntajeNivelId"));
            $recepcion->setRecepcionPuntajetiempoid($this->request->getPost("recepcion_puntajeTiempoId"));
            $recepcion->setRecepcionPuntajetratoid($this->request->getPost("recepcion_puntajeTratoId"));
            $recepcion->setRecepcionTieneinconvenientes($this->request->getPost("recepcion_puntajeInconvenientes") - 1);//Le resto 1 porque el RadioGroup Genera los values a partir de 1
            $recepcion->setRecepcionComentario($this->request->getPost("recepcion_comentario"));
            $recepcion->setRecepcionHabilitado(1);


            if (!$recepcion->save()) {
                foreach ($recepcion->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "recepcion",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $encuesta->setEncuestaRecepcionid($recepcion->getRecepcionId());
            if (!$encuesta->update()) {
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "recepcion",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $this->flash->success("PASO Nº 2 COMPLETADO CON EXITO!  ");
        }
        return $this->dispatcher->forward(array(
            "controller" => "unidad",
            "action" => "new",
            "params" => array('encuesta_id' => $encuesta->getEncuestaId())
        ));

    }

    /**
     * Saves a recepcion edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "index"
            ));
        }

        $recepcion_id = $this->request->getPost("recepcion_id");

        $recepcion = Recepcion::findFirstByrecepcion_id($recepcion_id);
        if (!$recepcion) {
            $this->flash->error("recepcion does not exist " . $recepcion_id);

            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "index"
            ));
        }

        $recepcion->setRecepcionPuntajenivelid($this->request->getPost("recepcion_puntajeNivelId"));
        $recepcion->setRecepcionPuntajetiempoid($this->request->getPost("recepcion_puntajeTiempoId"));
        $recepcion->setRecepcionPuntajetratoid($this->request->getPost("recepcion_puntajeTratoId"));
        $recepcion->setRecepcionTieneinconvenientes($this->request->getPost("recepcion_tieneInconvenientes"));
        $recepcion->setRecepcionComentario($this->request->getPost("recepcion_comentario"));
        $recepcion->setRecepcionHabilitado($this->request->getPost("recepcion_habilitado"));


        if (!$recepcion->save()) {

            foreach ($recepcion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "edit",
                "params" => array($recepcion->recepcion_id)
            ));
        }

        $this->flash->success("recepcion was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "recepcion",
            "action" => "index"
        ));

    }

    /**
     * Deletes a recepcion
     *
     * @param string $recepcion_id
     */
    public function deleteAction($recepcion_id)
    {

        $recepcion = Recepcion::findFirstByrecepcion_id($recepcion_id);
        if (!$recepcion) {
            $this->flash->error("recepcion was not found");

            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "index"
            ));
        }

        if (!$recepcion->delete()) {

            foreach ($recepcion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "recepcion",
                "action" => "search"
            ));
        }

        $this->flash->success("recepcion was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "recepcion",
            "action" => "index"
        ));
    }

}
