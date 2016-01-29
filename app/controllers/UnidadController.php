<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UnidadController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        //$this->persistent->parameters = null;
    }

    /**
     * Searches for unidad
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Unidad", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "unidad_id";

        $unidad = Unidad::find($parameters);
        if (count($unidad) == 0) {
            $this->flash->notice("The search did not find any unidad");

            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $unidad,
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
        $this->view->unidadForm = new UnidadForm();
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
        if ($encuesta->getEncuestaUnidadid() != NULL) {
            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "new",
                "params" => array('encuesta_id' => $encuesta->getEncuestaId())
            ));
        }

    }

    /**
     * Edits a unidad
     *
     * @param string $unidad_id
     */
    public function editAction($unidad_id)
    {

        if (!$this->request->isPost()) {

            $unidad = Unidad::findFirstByunidad_id($unidad_id);
            if (!$unidad) {
                $this->flash->error("unidad was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "unidad",
                    "action" => "index"
                ));
            }

            $this->view->unidad_id = $unidad->unidad_id;

            $this->tag->setDefault("unidad_id", $unidad->getUnidadId());
            $this->tag->setDefault("unidad_puntajeHigieneId", $unidad->getUnidadPuntajehigieneid());
            $this->tag->setDefault("unidad_puntajeEquipoId", $unidad->getUnidadPuntajeequipoid());
            $this->tag->setDefault("unidad_puntajeConfortId", $unidad->getUnidadPuntajeconfortid());
            $this->tag->setDefault("unidad_tieneInconvenientes", $unidad->getUnidadTieneinconvenientes());
            $this->tag->setDefault("unidad_comentario", $unidad->getUnidadComentario());
            $this->tag->setDefault("unidad_habilitado", $unidad->getUnidadHabilitado());
            
        }
    }

    /**
     * Creates a new unidad
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
        if ($encuesta->getEncuestaUnidadid() == NULL) {
            $unidad = new Unidad();

            $unidad->setUnidadPuntajehigieneid($this->request->getPost("unidad_puntajeHigieneId"));
            $unidad->setUnidadPuntajeequipoid($this->request->getPost("unidad_puntajeEquipoId"));
            $unidad->setUnidadPuntajeconfortid($this->request->getPost("unidad_puntajeConfortId"));
            $unidad->setUnidadTieneinconvenientes($this->request->getPost("unidad_tieneInconvenientes"));
            $unidad->setUnidadComentario($this->request->getPost("unidad_comentario"));
            $unidad->setUnidadHabilitado(1);


            if (!$unidad->save()) {
                foreach ($unidad->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "unidad",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $encuesta->setEncuestaUnidadid($unidad->getUnidadId());
            if (!$encuesta->update()) {
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "unidad",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $this->flash->success(" PASO Nº3 COMPLETADO CON EXITO! ");
        }
        return $this->dispatcher->forward(array(
            "controller" => "personal",
            "action" => "new",
            "params" => array('encuesta_id' => $encuesta->getEncuestaId())
        ));

    }

    /**
     * Saves a unidad edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "index"
            ));
        }

        $unidad_id = $this->request->getPost("unidad_id");

        $unidad = Unidad::findFirstByunidad_id($unidad_id);
        if (!$unidad) {
            $this->flash->error("unidad does not exist " . $unidad_id);

            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "index"
            ));
        }

        $unidad->setUnidadPuntajehigieneid($this->request->getPost("unidad_puntajeHigieneId"));
        $unidad->setUnidadPuntajeequipoid($this->request->getPost("unidad_puntajeEquipoId"));
        $unidad->setUnidadPuntajeconfortid($this->request->getPost("unidad_puntajeConfortId"));
        $unidad->setUnidadTieneinconvenientes($this->request->getPost("unidad_tieneInconvenientes"));
        $unidad->setUnidadComentario($this->request->getPost("unidad_comentario"));
        $unidad->setUnidadHabilitado($this->request->getPost("unidad_habilitado"));
        

        if (!$unidad->save()) {

            foreach ($unidad->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "edit",
                "params" => array($unidad->unidad_id)
            ));
        }

        $this->flash->success("unidad was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "unidad",
            "action" => "index"
        ));

    }

    /**
     * Deletes a unidad
     *
     * @param string $unidad_id
     */
    public function deleteAction($unidad_id)
    {

        $unidad = Unidad::findFirstByunidad_id($unidad_id);
        if (!$unidad) {
            $this->flash->error("unidad was not found");

            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "index"
            ));
        }

        if (!$unidad->delete()) {

            foreach ($unidad->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "unidad",
                "action" => "search"
            ));
        }

        $this->flash->success("unidad was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "unidad",
            "action" => "index"
        ));
    }

}
