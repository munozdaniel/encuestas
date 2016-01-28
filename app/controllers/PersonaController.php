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
        //Busco si existe la Persona
        $nombre =$this->request->getPost("persona_nombre",array('string'));
        $apellido = $this->request->getPost("persona_apellido",'string');
        $correo = $this->request->getPost("persona_correo",'email');
        /*$persona = Persona::query()
                ->where("persona_nombre LIKE ':persona_nombre:'")
                ->andWhere("persona_apellido LIKE ':persona_apellido'")
                ->andWhere("persona_correo LIKE ':persona_correo'")
            ->bind(array('persona_nombre'=>$nombre,'persona_apellido'=>$apellido,'persona_correo'=>$correo))
            ->execute();*/
        $persona =  Persona::findFirst(array(
            "(persona_nombre LIKE :persona_nombre:) AND (persona_apellido = :persona_apellido:) AND (persona_correo = :persona_correo:)",
            'bind' => array('persona_nombre' => $nombre, 'persona_apellido' => $apellido,'persona_correo'=>$correo)
        ));
        if(!$persona){
            /*No esta registrado*/
            $persona = new Persona();

            $persona->setPersonaNombre($nombre);
            $persona->setPersonaApellido($apellido);
            $persona->setPersonaCorreo($correo);
            $persona->setPersonaTelefono($this->request->getPost("persona_telefono",'int'));
            $persona->setPersonaCiudad($this->request->getPost("persona_ciudad",'string'));
            $persona->setPersonaHabilitado(1);
            $encuesta = new Encuesta();
            $encuesta->setEncuestaFechacreacion(date('Y-m-d'));
            $encuesta->setEncuestaHabilitado(1);
            if(!$encuesta->save())
            {
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "persona",
                    "action" => "new"
                ));
            }
            $persona->setPersonaEncuestaid($encuesta->getEncuestaId());
            if (!$persona->save()) {
                foreach ($persona->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(array(
                    "controller" => "persona",
                    "action" => "new"
                ));
            }

            $this->flash->success("Gracias por registrarte, completa la encuesta para participar");
        }else{
            /*Esta Registrado*/
            $encuesta = Encuesta::findFirst(array("encuesta_id = :encuesta_id:",'bind'=>array('encuesta_id'=>$persona->getPersonaEncuestaid())));
            if($encuesta->getEncuestaTerminado()==1){
                $this->flash->warning("Usted ya se encuentra participando");

                return $this->dispatcher->forward(array(
                    "controller" => "index",
                    "action" => "participa"
                ));
            }
            $this->flash->warning("Debe finalizar la encuesta para participar");
            if($encuesta->getEncuestaAdicionalid()==NULL){
                return $this->dispatcher->forward(array(
                    "controller" => "adicional",
                    "action" => "new"
                ));
            }
            if($encuesta->getEncuestaUnidadid()==NULL){
                return $this->dispatcher->forward(array(
                    "controller" => "unidad",
                    "action" => "new"
                ));
            }
            if($encuesta->getEncuestaPersonalid()==NULL){
                return $this->dispatcher->forward(array(
                    "controller" => "personal",
                    "action" => "new"
                ));
            }

            if($encuesta->getEncuestaRecepcionid()==NULL){
                return $this->dispatcher->forward(array(
                    "controller" => "recepcion",
                    "action" => "new"
                ));
            }
            if($encuesta->getEncuestaAlojamientoid()==NULL){
                return $this->dispatcher->forward(array(
                    "controller" => "alojamiento",
                    "action" => "new"
                ));
            }
        }



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
