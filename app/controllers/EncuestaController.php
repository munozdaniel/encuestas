<?php
use \Phalcon\Mvc\Model\Transaction\Manager;
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
     *
     *
     */
    public function sorteoAction()
    {

    }
    /**
     * Villa La Angostura: Se guardan los datos que se ingresaron en la encuesta.
     *
     */
    public function guardarAction()
    {
        //Si no viene del submit retorno al inicio.
        if (!$this->request->isPost()) {
            return $this->redireccionar("index/index");
        }

        //Verifico que los datos ingresados cumplan con las validaciones.
        $data = $this->request->getPost();
        try
        {
            $manager        = new Manager();
            $transaction    = $manager->get();
            $unidad = new Unidad();
            $personal = new Personal();
            $continuar      = true;
            /*--------------------- VALIDAR RECEPCION ------------------------*/
            $recepcionForm  =   new VillaRecepcionForm();
            $recepcion      =   new Recepcion();
            $recepcion->setTransaction($transaction);
            if(!$recepcionForm->isValid($data,$recepcion)){
                foreach($recepcionForm->getMessages() as $message){
                    $this->flash->error($message);
                }
                $continuar      = false;
            }
            else {
                if ($recepcion->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
                    foreach ($recepcion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $continuar      = false;
                }
            }
            /*--------------------- VALIDAR UNIDAD ------------------------*/
            if($continuar) {
                $unidadForm = new VillaUnidadForm();

                $unidad->setTransaction($transaction);
                if (!$unidadForm->isValid($data, $unidad)) {
                    foreach ($unidadForm->getMessages() as $message) {
                        $this->flash->warning($message);
                    }echo "º2";
                    $continuar      = false;
                } else {
                    if ($unidad->save() == false) {
                        foreach ($unidad->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $continuar      = false;
                        $transaction->rollback("Falta completar los datos");
                    }
                }
            }
            /*--------------------- VALIDAR PERSONAL ------------------------*/
            if($continuar) {
                $personalForm = new VillaPersonalForm();
                $personal->setTransaction($transaction);
                if (!$personalForm->isValid($data, $personal)) {
                    foreach ($personalForm->getMessages() as $message) {
                        $this->flash->warning($message);
                    }
                    $continuar      = false;
                } else {
                    if ($personal->save() == false) {
                        foreach ($personal->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $continuar      = false;
                        $transaction->rollback("Falta completar los datos");
                    }
                }
            }
            /*--------------------- VALIDAR ENCUESTA ------------------------*/
            if($continuar) {
                $encuestaForm = new VillaEncuestaForm();
                $encuesta = new Encuesta();
                $encuesta->setTransaction($transaction);

                if (!$encuestaForm->isValid($data, $encuesta)) {
                    foreach ($encuestaForm->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                }
                else {
                    $cadena = $this->validarEncuesta($data);
                    if(!empty($cadena) || trim($cadena)!=""){
                        $this->flash->error($cadena);
                        $transaction->rollback("Falta completar los datos");
                    }
                   else{
                        $encuesta->recepcion_id = $recepcion->recepcion_id;
                        $encuesta->unidad_id = $unidad->unidad_id;
                        $encuesta->personal_id = $personal->personal_id;
                        if ($encuesta->save() == false) {
                            foreach ($encuesta->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                            $transaction->rollback("Falta completar los datos");
                        } else
                        {
                            /*--------------------- RELACIONES ------------------------*/

                            //relacion entre encuesta e informacion
                            $encuestaInformacion = new Encuestainformacion();
                            $encuestaInformacion->setTransaction($transaction);
                            $listaInformacion = $this->request->getPost("informacion_id");

                            if (!empty($listaInformacion)) {
                                foreach ($listaInformacion as $informacion_id) {//Recorro la lista de checkbox
                                    $encuestaInformacion->encuesta_id = $encuesta->encuesta_id;
                                    $encuestaInformacion->informacion_id = $informacion_id;
                                    if ($encuestaInformacion->save() == false) {
                                        foreach ($encuestaInformacion->getMessages() as $message) {
                                            $this->flash->error($message);
                                        }
                                        $transaction->rollback("Falta completar los datos");
                                    } else {
                                        //relacion entre encuesta y complejo
                                        $encuestaComplejo = new Encuestacomplejo();
                                        $encuestaComplejo->setTransaction($transaction);
                                        $listaComplejo = $this->request->getPost("complejo_id");
                                        if (!empty($listaComplejo)) {
                                            foreach ($listaComplejo as $complejo_id) {//Recorro la lista de checkbox
                                                $encuestaComplejo->encuesta_id = $encuesta->encuesta_id;
                                                $encuestaComplejo->complejo_id = $complejo_id;
                                                if ($encuestaComplejo->save() == false) {
                                                    foreach ($encuestaComplejo->getMessages() as $message) {
                                                        $this->flash->error($message);
                                                    }
                                                    $transaction->rollback("Falta completar los datos");
                                                } else {
                                                    $recepcionForm->clear();
                                                    $unidadForm->clear();
                                                    $personalForm->clear();
                                                    $encuestaForm->clear();
                                                    $this->flash->success("OPERACION EXITOSA");
                                                    $transaction->commit();
                                                    return $this->redireccionar("encuesta/sorteo");
                                                }
                                            }
                                        }
                                        else{
                                            //Si no selecciono ningun complejo, se guardara la primera opcion "NO"
                                            $encuestaComplejo->encuesta_id = $encuesta->encuesta_id;
                                            $encuestaComplejo->complejo_id = 1;
                                            if ($encuestaComplejo->save() == false) {
                                                foreach ($encuestaComplejo->getMessages() as $message) {
                                                    $this->flash->error($message);
                                                }
                                                $transaction->rollback("Falta completar los datos");
                                            } else {
                                                $recepcionForm->clear();
                                                $unidadForm->clear();
                                                $personalForm->clear();
                                                $encuestaForm->clear();
                                                $this->flash->success("OPERACION EXITOSA");
                                                $transaction->commit();
                                                return $this->redireccionar("encuesta/sorteo");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return $this->redireccionar("index/index");
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
            $this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return $this->redireccionar("index/index");
        }
    }
    private function validarEncuesta($data)
    {
        if ($data['reservacion_id'] == 1 && ($data['encuesta_otroDondeReservo'] == null || $data['encuesta_otroDondeReservo'] == '')) {
            return "Ingrese el lugar en donde realizó la reserva.";
        }
        if($data['composicion_id'] == 1 && ($data['encuesta_otroComposicionGrupo'] == null || $data['encuesta_otroComposicionGrupo'] == '')) {
            return "Ingrese como está compuesto su grupo.";
        }

        return "";
    }

    private function guardarEncuestaAction($data)
    {
        //Si no viene del submit retorno al inicio.
        if (!$this->request->isPost()) {
            return $this->redireccionar("index/index");
        }

        //Verifico que los datos ingresados cumplan con las validaciones.
        $manager = new Manager();
        $transaction = $manager->get();
        $data = $this->request->getPost();
        try {
            $recepcion = new Recepcion();
            $unidad = new Unidad();
            $personal = new Personal();
            $encuesta = new Encuesta();
            $continuar = $this->validarEncuesta($data,$recepcion,$unidad,$personal,$encuesta);
            if($continuar!=null)
            {
                $recepcion->setTransaction($transaction);
                /*--------------------- PERSISTIR RECEPCION ------------------------*/
                if ($recepcion->save() == false) {
                    foreach ($recepcion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $transaction->rollback("Recepcion: Falta completar los datos.");
                }
                /*--------------------- PERSISTIR UNIDAD ------------------------*/
                if ($unidad->save() == false) {
                    foreach ($unidad->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $transaction->rollback("Unidad: Falta completar los datos.");
                }
                /*--------------------- PERSISTIR PERSONAL ------------------------*/
                if ($personal->save() == false) {
                    foreach ($personal->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $transaction->rollback("Personal: Falta completar los datos.");
                }
            }




        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
            $this->flash->error('Transaccion Fallida: ', $e->getMessage());
            $transaction->rollback("Falta completar los datos");
            return $this->redireccionar("index/index");
        }

    }

    /**
     * Encargado de validar los campos del formulario.
     * @param $data
     * @param $recepcion
     * @param $unidad
     * @param $personal
     * @param $encuesta
     * @return null o $data cargado con los datos del form.
     */
    private function validarEncuesta2($data,$recepcion,$unidad,$personal,$encuesta)
    {
        /*--------------------- VALIDAR RECEPCION ------------------------*/
        $recepcionForm  =   new VillaRecepcionForm();
        if(!$recepcionForm->isValid($data,$recepcion)){
            foreach($recepcionForm->getMessages() as $message){
                $this->flash->error($message);
            }
            return null;
        }
        /*--------------------- VALIDAR UNIDAD ------------------------*/
        $unidadForm = new VillaUnidadForm();
        if (!$unidadForm->isValid($data, $unidad)) {
            foreach ($unidadForm->getMessages() as $message) {
                $this->flash->warning($message);
            }
            return null;
        }
        /*--------------------- VALIDAR PERSONAL ------------------------*/
        $personalForm = new VillaPersonalForm();
        if (!$personalForm->isValid($data, $personal)) {
            foreach ($personalForm->getMessages() as $message) {
                $this->flash->warning($message);
            }
            return null;
        }
        return $data;
    }
}

