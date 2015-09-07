<?php

class EncuestaController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Bienvenidos');
        parent::initialize();

    }
    public function indexAction()
    {

    }

    /**
     * Villa La Angostura: Muestra la vista para ingresar los datos de la encuesta con
     * componentes elaborados en VillaEncuestaForm.
     */
    public function villaAction()
    {
        $this->view->encuestaForm = new VillaEncuestaForm;
        $this->view->unidadForm = new VillaUnidadForm();
        $this->view->recepcionForm = new VillaRecepcionForm();
        $this->view->personalForm = new VillaPersonalForm();
    }

    /**
     * Villa La Angostura: Se guardan los datos que se ingresaron en la encuesta.
     *
     */
    public function guardarAction()
    {
        //Si no viene del submit retorno al inicio.
        if (!$this->request->isPost()) {
            return $this->redireccionar("encuesta/villa");
        }
        //Verifico que los datos ingresados cumplan con las validaciones.
        $data = $this->request->getPost();
        try
        {
            $manager = new \Phalcon\Mvc\Model\Transaction\Manager();
            $transaction = $manager->get();
            /*--------------------- VALIDAR RECEPCION ------------------------*/
            $recepcionForm  =   new VillaRecepcionForm();
            $recepcion = new Recepcion();
            if(!$recepcionForm->isValid($data,$recepcion)){
                foreach($recepcionForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                return $this->redireccionar('encuesta/villa');
            }
            if ($recepcion->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
                $transaction->rollback("No se pùdo guardar recepcion");
                foreach ($recepcion->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->redireccionar("encuesta/villa");
            }
            $recepcionForm->clear();
            /*--------------------- VALIDAR UNIDAD ------------------------*/
            $unidadForm     =   new VillaUnidadForm();
            $unidad         =   new Unidad();

            if(!$unidadForm->isValid($data,$unidad)){
                foreach($unidadForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                return $this->redireccionar('encuesta/villa');
            }
            if ($unidad->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
                $transaction->rollback("No se pùdo guardar unidad");
                foreach ($unidad->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->redireccionar("encuesta/villa");
            }
            //$this->flash->error("INSERTADO: ID: ".$unidad->unidad_id );
            $unidadForm->clear();

            /*--------------------- VALIDAR PERSONAL ------------------------*/
            $personalForm   =   new VillaPersonalForm();
            $personal       =   new Personal();
            if(!$personalForm->isValid($data,$personal)){
                foreach($personalForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                return $this->redireccionar('encuesta/villa');
            }
            if ($personal->save() == false) {
                $transaction->rollback("No se pùdo guardar personal");
                foreach ($personal->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->redireccionar("encuesta/villa");
            }
            $personalForm->clear();

            /*--------------------- VALIDAR ENCUESTA ------------------------*/
             $encuestaForm   =   new VillaEncuestaForm();
            $encuesta = new Encuesta();

            //$data = $this->request->getPost();
            if(!$encuestaForm->isValid($data,$encuesta)){
                foreach($encuestaForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                return $this->redireccionar('encuesta/villa');
            }

            $encuesta->recepcion_id     =   $recepcion->recepcion_id;
            $encuesta->unidad_id        =   $unidad->unidad_id;
            $encuesta->personal_id      =   $personal->personal_id;
            if ($encuesta->save() == false) {
                $transaction->rollback("No se pudo guardar encuesta");
                foreach ($encuesta->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->redireccionar("encuesta/villa");
            }
            $encuestaForm->clear();

            /*--------------------- RELACIONES ------------------------*/

            //relacion entre encuesta e informacion
            $encuestaInformacion = new Encuestainformacion();
            $listaInformacion    = $this->request->getPost("informacion_id");
            foreach($listaInformacion as $informacion_id) {
                $encuestaInformacion->encuesta_id   =$encuesta->encuesta_id;
                $encuestaInformacion->informacion_id=$informacion_id;
                if ($encuestaInformacion->save() == false) {
                    $transaction->rollback("No se pudo guardar encuestaInformacion");
                    foreach ($encuestaInformacion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return $this->redireccionar("encuesta/villa");
                }
            }
            //relacion entre encuesta y complejo
            $encuestaComplejo = new Encuestacomplejo();
            $listaComplejo    = $this->request->getPost("complejo_id");
            foreach($listaComplejo as $complejo_id) {
                $encuestaComplejo->encuesta_id   =$encuesta->encuesta_id;
                $encuestaComplejo->complejo_id=$complejo_id;
                if ($encuestaComplejo->save() == false) {
                    $transaction->rollback("No se pudo guardar encuestaComplejo");
                    foreach ($encuestaComplejo->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return $this->redireccionar("encuesta/villa");
                }
            }

            $this->flash->success("OPERACION EXITOSA" );
            $transaction->commit();
            return $this->redireccionar("encuesta/villa");
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
            echo 'Transaccion Fallida.: ', $e->getMessage();
        }

    }

}

