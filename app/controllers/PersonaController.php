<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PersonaController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for persona
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Persona", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "persona_id";

        $persona = Persona::find($parameters);
        if (count($persona) == 0) {
            $this->flash->notice("The search did not find any persona");

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $persona,
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
     * Edits a persona
     *
     * @param string $persona_id
     */
    public function editAction($persona_id)
    {

        if (!$this->request->isPost()) {

            $persona = Persona::findFirstBypersona_id($persona_id);
            if (!$persona) {
                $this->flash->error("persona was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "persona",
                    "action" => "index"
                ));
            }

            $this->view->persona_id = $persona->persona_id;

            $this->tag->setDefault("persona_id", $persona->getPersonaId());
            $this->tag->setDefault("persona_nombre", $persona->getPersonaNombre());
            $this->tag->setDefault("persona_apellido", $persona->getPersonaApellido());
            $this->tag->setDefault("persona_correo", $persona->getPersonaCorreo());
            $this->tag->setDefault("persona_telefono", $persona->getPersonaTelefono());
            $this->tag->setDefault("persona_ciudad", $persona->getPersonaCiudad());
            $this->tag->setDefault("persona_encuestaId", $persona->getPersonaEncuestaid());
            $this->tag->setDefault("persona_habilitado", $persona->getPersonaHabilitado());
            
        }
    }

    /**
     * Creates a new persona
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "index"
            ));
        }

        $persona = new Persona();

        $persona->setPersonaNombre($this->request->getPost("persona_nombre"));
        $persona->setPersonaApellido($this->request->getPost("persona_apellido"));
        $persona->setPersonaCorreo($this->request->getPost("persona_correo"));
        $persona->setPersonaTelefono($this->request->getPost("persona_telefono"));
        $persona->setPersonaCiudad($this->request->getPost("persona_ciudad"));
        $persona->setPersonaEncuestaid($this->request->getPost("persona_encuestaId"));
        $persona->setPersonaHabilitado($this->request->getPost("persona_habilitado"));
        

        if (!$persona->save()) {
            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "new"
            ));
        }

        $this->flash->success("persona was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "persona",
            "action" => "index"
        ));

    }

    /**
     * Saves a persona edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "index"
            ));
        }

        $persona_id = $this->request->getPost("persona_id");

        $persona = Persona::findFirstBypersona_id($persona_id);
        if (!$persona) {
            $this->flash->error("persona does not exist " . $persona_id);

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "index"
            ));
        }

        $persona->setPersonaNombre($this->request->getPost("persona_nombre"));
        $persona->setPersonaApellido($this->request->getPost("persona_apellido"));
        $persona->setPersonaCorreo($this->request->getPost("persona_correo"));
        $persona->setPersonaTelefono($this->request->getPost("persona_telefono"));
        $persona->setPersonaCiudad($this->request->getPost("persona_ciudad"));
        $persona->setPersonaEncuestaid($this->request->getPost("persona_encuestaId"));
        $persona->setPersonaHabilitado($this->request->getPost("persona_habilitado"));
        

        if (!$persona->save()) {

            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "edit",
                "params" => array($persona->persona_id)
            ));
        }

        $this->flash->success("persona was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "persona",
            "action" => "index"
        ));

    }

    /**
     * Deletes a persona
     *
     * @param string $persona_id
     */
    public function deleteAction($persona_id)
    {

        $persona = Persona::findFirstBypersona_id($persona_id);
        if (!$persona) {
            $this->flash->error("persona was not found");

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "index"
            ));
        }

        if (!$persona->delete()) {

            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "persona",
                "action" => "search"
            ));
        }

        $this->flash->success("persona was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "persona",
            "action" => "index"
        ));
    }

}
