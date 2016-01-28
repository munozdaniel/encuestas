<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AdicionalController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for adicional
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Adicional", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "adicional_id";

        $adicional = Adicional::find($parameters);
        if (count($adicional) == 0) {
            $this->flash->notice("The search did not find any adicional");

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $adicional,
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
        $this->view->adicionalForm = new AdicionalForm();
        $this->assets->collection('footer')
            ->addJs("js/jqBootstrapValidation.js");
        $this->assets->collection('footerInline')
            ->addInlineJs('$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );');
    }

    /**
     * Edits a adicional
     *
     * @param string $adicional_id
     */
    public function editAction($adicional_id)
    {

        if (!$this->request->isPost()) {

            $adicional = Adicional::findFirstByadicional_id($adicional_id);
            if (!$adicional) {
                $this->flash->error("adicional was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "adicional",
                    "action" => "index"
                ));
            }

            $this->view->adicional_id = $adicional->adicional_id;

            $this->tag->setDefault("adicional_id", $adicional->getAdicionalId());
            $this->tag->setDefault("adicional_reservaId", $adicional->getAdicionalReservaid());
            $this->tag->setDefault("adicional_reservaOtro", $adicional->getAdicionalReservaotro());
            $this->tag->setDefault("adicional_grupoId", $adicional->getAdicionalGrupoid());
            $this->tag->setDefault("adicional_grupoOtro", $adicional->getAdicionalGrupootro());
            $this->tag->setDefault("adicional_informacionId", $adicional->getAdicionalInformacionid());
            $this->tag->setDefault("adicional_informacionOtro", $adicional->getAdicionalInformacionotro());
            $this->tag->setDefault("adicional_conocimientoId", $adicional->getAdicionalConocimientoid());
            $this->tag->setDefault("adicional_motivoId", $adicional->getAdicionalMotivoid());
            $this->tag->setDefault("adicional_motivoOtro", $adicional->getAdicionalMotivootro());
            $this->tag->setDefault("adicional_observacion", $adicional->getAdicionalObservacion());
            
        }
    }

    /**
     * Creates a new adicional
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "index"
            ));
        }
        //print_r($_POST);
        $adicional = new Adicional();
        //Donde hizo la reserva? 1 - Otro
        $reserva = new Reserva();
        $reserva->setReservaRespuesta(strtoupper($this->request->get('adicional_reservaId','string')));
        if(!$reserva->save())
        {
            foreach ($reserva->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "new"
            ));
        }
        //Adicional
        $adicional->setAdicionalReservaid($reserva->getReservaId());
        $adicional->setAdicionalObservacion(strtoupper($this->request->get('adicional_observacion','string')));
        if (!$adicional->save()) {
            foreach ($adicional->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "new"
            ));
        }
        //Como estuvo compuesto su grupo? +1 - Otro
        $arreglo = $this->request->get('adicional_grupo');
        foreach((array)$arreglo as $grupo){
            $unGrupo = new Grupo();
            $unGrupo->setGrupoAdicionalid($adicional->getAdicionalId());
            $unGrupo->setGrupoRespuesta($grupo);
            if($grupo=="OTRO")
                $unGrupo->setGrupoOtro(strtoupper($this->request->get('adicional_grupoOtro','string')));
            $unGrupo->save();
        }
        // De que manera recibe la información? +1 - Otro
        $arreglo = $this->request->get('adicional_informacion');
        foreach((array)$arreglo as $info){
            $unaInfo = new Informacion();
            $unaInfo->setInformacionAdicionalid($adicional->getAdicionalId());
            $unaInfo->setInformacionRespuesta($info);
            if($info=="OTRO")
                $unaInfo->setInformacionOtro(strtoupper($this->request->get('adicional_informacionOtro','string')));
            $unaInfo->save();
        }
        //Porque eligió este destino? +1 - Otro
        $arreglo = $this->request->get('adicional_motivo');
        foreach((array)$arreglo as $motivo){
            $unMotivo = new Motivo();
            $unMotivo->setMotivoAdicionalid($adicional->getAdicionalId());
            $unMotivo->setMotivoRespuesta($motivo);
            if($motivo=="OTRO")
                $unMotivo->setMotivoOtro(strtoupper($this->request->get('adicional_motivoOtro','string')));
            $unMotivo->save();
        }
        //Conoce algún otro MELEWE?
        $arreglo = $this->request->get('adicional_motivo');
        foreach((array)$arreglo as $conoce){
            $unConocimiento = new Conocimientoadicional();
            $unConocimiento->setAdicionalId($adicional->getAdicionalId());
            $unConocimiento->setConocimientoId($conoce);
            $unConocimiento->save();
        }

        $this->flash->success("Muchas Gracias por completar la encuesta");

        return $this->dispatcher->forward(array(
            "controller" => "adicional",
            "action" => "new"
        ));

    }

    /**
     * Saves a adicional edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "index"
            ));
        }

        $adicional_id = $this->request->getPost("adicional_id");

        $adicional = Adicional::findFirstByadicional_id($adicional_id);
        if (!$adicional) {
            $this->flash->error("adicional does not exist " . $adicional_id);

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "index"
            ));
        }

        $adicional->setAdicionalReservaid($this->request->getPost("adicional_reservaId"));
        $adicional->setAdicionalReservaotro($this->request->getPost("adicional_reservaOtro"));
        $adicional->setAdicionalGrupoid($this->request->getPost("adicional_grupoId"));
        $adicional->setAdicionalGrupootro($this->request->getPost("adicional_grupoOtro"));
        $adicional->setAdicionalInformacionid($this->request->getPost("adicional_informacionId"));
        $adicional->setAdicionalInformacionotro($this->request->getPost("adicional_informacionOtro"));
        $adicional->setAdicionalConocimientoid($this->request->getPost("adicional_conocimientoId"));
        $adicional->setAdicionalMotivoid($this->request->getPost("adicional_motivoId"));
        $adicional->setAdicionalMotivootro($this->request->getPost("adicional_motivoOtro"));
        $adicional->setAdicionalObservacion($this->request->getPost("adicional_observacion"));
        

        if (!$adicional->save()) {

            foreach ($adicional->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "edit",
                "params" => array($adicional->adicional_id)
            ));
        }

        $this->flash->success("adicional was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "adicional",
            "action" => "index"
        ));

    }

    /**
     * Deletes a adicional
     *
     * @param string $adicional_id
     */
    public function deleteAction($adicional_id)
    {

        $adicional = Adicional::findFirstByadicional_id($adicional_id);
        if (!$adicional) {
            $this->flash->error("adicional was not found");

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "index"
            ));
        }

        if (!$adicional->delete()) {

            foreach ($adicional->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "adicional",
                "action" => "search"
            ));
        }

        $this->flash->success("adicional was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "adicional",
            "action" => "index"
        ));
    }

}
