<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PersonalController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for personal
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Personal", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "personal_id";

        $personal = Personal::find($parameters);
        if (count($personal) == 0) {
            $this->flash->notice("The search did not find any personal");

            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $personal,
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
        $this->view->personalForm = new PersonalForm();
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
        if ($encuesta->getEncuestaPersonalid() != NULL) {
            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "new",
                "params" => array('encuesta_id' => $encuesta->getEncuestaId())
            ));
        }
    }

    /**
     * Edits a personal
     *
     * @param string $personal_id
     */
    public function editAction($personal_id)
    {

        if (!$this->request->isPost()) {

            $personal = Personal::findFirstBypersonal_id($personal_id);
            if (!$personal) {
                $this->flash->error("personal was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "personal",
                    "action" => "index"
                ));
            }

            $this->view->personal_id = $personal->personal_id;

            $this->tag->setDefault("personal_id", $personal->getPersonalId());
            $this->tag->setDefault("personal_puntajeAdministrativoId", $personal->getPersonalPuntajeadministrativoid());
            $this->tag->setDefault("personal_puntajeMucamaId", $personal->getPersonalPuntajemucamaid());
            $this->tag->setDefault("personal_comentario", $personal->getPersonalComentario());
            $this->tag->setDefault("personal_habilitado", $personal->getPersonalHabilitado());
            
        }
    }

    /**
     * Creates a new personal
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

        if ($encuesta->getEncuestaPersonalid() == NULL) {
            $personal = new Personal();

            $personal->setPersonalPuntajeadministrativoid($this->request->getPost("personal_puntajeAdministrativoId"));
            $personal->setPersonalPuntajemucamaid($this->request->getPost("personal_puntajeMucamaId"));
            $personal->setPersonalTieneinconvenientes($this->request->getPost("personal_tieneInconvenientes"));
            $personal->setPersonalComentario($this->request->getPost("personal_comentario"));
            $personal->setPersonalHabilitado(1);


            if (!$personal->save()) {
                foreach ($personal->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "personal",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $encuesta->setEncuestaPersonalid($personal->getPersonalId());
            if (!$encuesta->update()) {
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "personal",
                    "action" => "new",
                    "params" => array('encuesta_id' => $encuesta->getEncuestaId())
                ));
            }
            $this->flash->success(" PASO Nº4 COMPLETADO CON EXITO! ");
        }
        return $this->dispatcher->forward(array(
            "controller" => "adicional",
            "action" => "new",
            "params" => array('encuesta_id' => $encuesta->getEncuestaId())
        ));

    }

    /**
     * Saves a personal edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "index"
            ));
        }

        $personal_id = $this->request->getPost("personal_id");

        $personal = Personal::findFirstBypersonal_id($personal_id);
        if (!$personal) {
            $this->flash->error("personal does not exist " . $personal_id);

            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "index"
            ));
        }

        $personal->setPersonalPuntajeadministrativoid($this->request->getPost("personal_puntajeAdministrativoId"));
        $personal->setPersonalPuntajemucamaid($this->request->getPost("personal_puntajeMucamaId"));
        $personal->setPersonalComentario($this->request->getPost("personal_comentario"));
        $personal->setPersonalHabilitado($this->request->getPost("personal_habilitado"));
        

        if (!$personal->save()) {

            foreach ($personal->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "edit",
                "params" => array($personal->personal_id)
            ));
        }

        $this->flash->success("personal was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "personal",
            "action" => "index"
        ));

    }

    /**
     * Deletes a personal
     *
     * @param string $personal_id
     */
    public function deleteAction($personal_id)
    {

        $personal = Personal::findFirstBypersonal_id($personal_id);
        if (!$personal) {
            $this->flash->error("personal was not found");

            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "index"
            ));
        }

        if (!$personal->delete()) {

            foreach ($personal->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "personal",
                "action" => "search"
            ));
        }

        $this->flash->success("personal was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "personal",
            "action" => "index"
        ));
    }

}
