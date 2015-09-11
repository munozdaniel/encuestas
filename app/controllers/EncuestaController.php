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

            $continuar      = true;
            /*--------------------- VALIDAR RECEPCION ------------------------*/
            $recepcionForm  =   new VillaRecepcionForm();
            $recepcion      =   new Recepcion();
            $recepcion->setTransaction($transaction);
            if(!$recepcionForm->isValid($data,$recepcion)){
                foreach($recepcionForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
            }
            else{
                if ($recepcion->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
                    foreach ($recepcion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $transaction->rollback();
                }
                else{
                    /*--------------------- VALIDAR UNIDAD ------------------------*/
                    $unidadForm     =   new VillaUnidadForm();
                    $unidad         =   new Unidad();
                    $unidad->setTransaction($transaction);
                    if(!$unidadForm->isValid($data,$unidad)){
                        foreach($unidadForm->getMessages() as $message){
                            $this->flash->warning($message);
                        }
                        $transaction->rollback();
                    }else{
                        if ($unidad->save() == false) {
                            foreach ($unidad->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                            $transaction->rollback();
                        }else{
                            /*--------------------- VALIDAR PERSONAL ------------------------*/
                            $personalForm   =   new VillaPersonalForm();
                            $personal       =   new Personal();
                            $personal->setTransaction($transaction);
                            if(!$personalForm->isValid($data,$personal)){
                                foreach($personalForm->getMessages() as $message){
                                    $this->flash->warning($message);
                                }
                                $transaction->rollback();
                            }else {
                                if ($personal->save() == false) {
                                    foreach ($personal->getMessages() as $message) {
                                        $this->flash->error($message);
                                    }
                                    $transaction->rollback();
                                }else {
                                    /*--------------------- VALIDAR ENCUESTA ------------------------*/
                                    $encuestaForm = new VillaEncuestaForm();
                                    $encuesta = new Encuesta();
                                    $encuesta->setTransaction($transaction);
                                    if (!$encuestaForm->isValid($data, $encuesta)) {
                                        foreach ($encuestaForm->getMessages() as $message) {
                                            $this->flash->warning($message);
                                        }
                                        $transaction->rollback();
                                    }
                                    else{
                                        if($data['reservacion_id']==1 && ($data['reservacion_idOtro']==null || $data['reservacion_idOtro']==''))
                                        {
                                            $this->flash->error("Ingrese en que otro lugar realizó la reserva.");
                                            $transaction->rollback();
                                        }
                                        else
                                        {
                                            $encuesta->recepcion_id     =   $recepcion->recepcion_id;
                                            $encuesta->unidad_id        =   $unidad->unidad_id;
                                            $encuesta->personal_id      =   $personal->personal_id;
                                            if ($encuesta->save() == false) {
                                                foreach ($encuesta->getMessages() as $message) {
                                                    $this->flash->error($message);
                                                }
                                                $transaction->rollback();
                                            }
                                            else{
                                                /*--------------------- RELACIONES ------------------------*/

                                                //relacion entre encuesta e informacion
                                                $encuestaInformacion = new Encuestainformacion();
                                                $encuestaInformacion->setTransaction($transaction);
                                                $listaInformacion    = $this->request->getPost("informacion_id");
                                                if(!empty($listaInformacion)){
                                                    foreach($listaInformacion as $informacion_id) {//Recorro la lista de checkbox
                                                        $encuestaInformacion->encuesta_id   =$encuesta->encuesta_id;
                                                        $encuestaInformacion->informacion_id=$informacion_id;
                                                        if ($encuestaInformacion->save() == false) {
                                                            foreach ($encuestaInformacion->getMessages() as $message) {
                                                                $this->flash->error($message);
                                                            }
                                                            $transaction->rollback();
                                                        }
                                                        else
                                                        {
                                                            //relacion entre encuesta y complejo
                                                            $encuestaComplejo = new Encuestacomplejo();
                                                            $encuestaComplejo->setTransaction($transaction);
                                                            $listaComplejo    = $this->request->getPost("complejo_id");
                                                            if(!empty($listaComplejo)){
                                                                foreach($listaComplejo as $complejo_id) {//Recorro la lista de checkbox
                                                                    $encuestaComplejo->encuesta_id   =$encuesta->encuesta_id;
                                                                    $encuestaComplejo->complejo_id=$complejo_id;
                                                                    if ($encuestaComplejo->save() == false) {
                                                                        foreach ($encuestaComplejo->getMessages() as $message) {
                                                                            $this->flash->error($message);
                                                                        }
                                                                        $transaction->rollback();
                                                                    }
                                                                    else{
                                                                        $recepcionForm->clear();
                                                                        $unidadForm->clear();
                                                                        $personalForm->clear();
                                                                        $encuestaForm->clear();
                                                                        $this->flash->success("OPERACION EXITOSA" );
                                                                        $transaction->commit();
                                                                        return $this->redireccionar("encuesta/sorteo");
                                                                    }
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $this->flash->error("Ingrese campo complejo");
                                                                $transaction->rollback();
                                                            }
                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                    $this->flash->error("Ingrese campo informacion");
                                                    $transaction->rollback();
                                                }

                                            }
                                        }
                                    }
                                }
                            }

                            $recepcionForm->clear();
                            $this->flash->success("OPERACION EXITOSA" );
                            $transaction->commit();
                        }
                    }

                }
            }

        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
            $this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return $this->redireccionar("index/index");
        }


    }

    /**
     * Ingresan los datos enviados por post desde el formulario, validamos y persistimos una instancia de Recepcion.
     * @param $data
     * @return bool
     */
    private function persistirRecepcion($data)
    {
        $manager = new Manager();
        $transaction = $manager->get();
        $continuar = true;
        try
        {
            /*--------------------- VALIDAR RECEPCION ------------------------*/
            $recepcionForm  =   new VillaRecepcionForm();
            $recepcion = new Recepcion();
            if(!$recepcionForm->isValid($data,$recepcion)){
                foreach($recepcionForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                $continuar = false;
                $transaction->rollback();
            }
            else{
                if ($recepcion->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
                    foreach ($recepcion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $continuar = false;
                    $transaction->rollback();
                }
            }
            $recepcionForm->clear();
            $transaction->commit();
            return $continuar;
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {$this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return false;
        }
    }
    /**
     * Ingresan los datos enviados por post desde el formulario, validamos y persistimos una instancia de Unidad.
     * @param $data
     * @return bool
     */
    private function persistirUnidad($data)
    {
        $manager = new Manager();
        $transaction = $manager->get();
        $continuar = true;
        try
        {
            $unidadForm     =   new VillaUnidadForm();
            $unidad         =   new Unidad();
            if(!$unidadForm->isValid($data,$unidad)){
                foreach($unidadForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                $continuar = false;
                $transaction->rollback();
            }
            else{
                if ($unidad->save() == false) {
                    foreach ($unidad->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $continuar = false;
                    $transaction->rollback();
                }
            }
            $unidadForm->clear();
            $transaction->commit();
            return $continuar;
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {$this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return false;
        }
    }
    /**
 * Ingresan los datos enviados por post desde el formulario, validamos y persistimos una instancia de Personal.
 * @param $data
 * @return bool
 */
    private function persistirPersonal($data)
    {
        $manager = new Manager();
        $transaction = $manager->get();
        $continuar = true;
        try
        {
            /*--------------------- VALIDAR PERSONAL ------------------------*/
            $personalForm   =   new VillaPersonalForm();
            $personal       =   new Personal();
            if(!$personalForm->isValid($data,$personal)){
                foreach($personalForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                $continuar = false;
                $transaction->rollback();
            }
            else{
                if ($personal->save() == false) {
                    foreach ($personal->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $continuar = false;
                    $transaction->rollback();
                }
            }
            $personalForm->clear();
            $transaction->commit();
            return $continuar;
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {$this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return false;
        }
    }
    /**
     * Ingresan los datos enviados por post desde el formulario, validamos y persistimos una instancia de Encuesta
     * y sus relaciones.
     * @param $data
     * @return bool
     */
    private function persistirEncuesta($data,$recepcion, $unidad,$personal)
    {
        $manager = new Manager();
        $transaction = $manager->get();
        $continuar = true;
        try
        {
            /*--------------------- VALIDAR ENCUESTA ------------------------*/
            $encuestaForm   =   new VillaEncuestaForm();
            $encuesta = new Encuesta();

            //$data = $this->request->getPost();
            if(!$encuestaForm->isValid($data,$encuesta)){
                foreach($encuestaForm->getMessages() as $message){
                    $this->flash->warning($message);
                }
                $transaction->rollback();
            }
            else
            {
                if($data['reservacion_id']==1 && ($data['reservacion_idOtro']==null || $data['reservacion_idOtro']==''))
                {
                    //return $this->redireccionar('index/index');
                    $transaction->rollback();
                }
                else
                {
                    $encuesta->recepcion_id     =   $recepcion->recepcion_id;
                    $encuesta->unidad_id        =   $unidad->unidad_id;
                    $encuesta->personal_id      =   $personal->personal_id;
                    if ($encuesta->save() == false) {
                        foreach ($encuesta->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $transaction->rollback();
                        //return $this->redireccionar("index/index");
                    }
                }
            }
            $encuestaForm->clear();

            /*--------------------- RELACIONES ------------------------*/

            //relacion entre encuesta e informacion
            $encuestaInformacion = new Encuestainformacion();
            $listaInformacion    = $this->request->getPost("informacion_id");
            if(!empty($listaInformacion)){
                foreach($listaInformacion as $informacion_id) {//Recorro la lista de checkbox
                    $encuestaInformacion->encuesta_id   =$encuesta->encuesta_id;
                    $encuestaInformacion->informacion_id=$informacion_id;
                    if ($encuestaInformacion->save() == false) {
                        foreach ($encuestaInformacion->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $transaction->rollback();
                    }
                }
            }
            else
            {
                $this->flash->error("Ingrese campo informacion");
                $transaction->rollback();
            }
            //relacion entre encuesta y complejo
            $encuestaComplejo = new Encuestacomplejo();
            $listaComplejo    = $this->request->getPost("complejo_id");
            if(!empty($listaComplejo)){
                foreach($listaComplejo as $complejo_id) {//Recorro la lista de checkbox
                    $encuestaComplejo->encuesta_id   =$encuesta->encuesta_id;
                    $encuestaComplejo->complejo_id=$complejo_id;
                    if ($encuestaComplejo->save() == false) {
                        foreach ($encuestaComplejo->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                        $transaction->rollback();
                    }
                }
            }
            else
            {
                $this->flash->error("Ingrese campo complejo");
                $transaction->rollback();
            }

            $transaction->commit();
            return $continuar;
        }
        catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {$this->flash->error('Transaccion Fallida: ', $e->getMessage());
            return false;
        }
    }
}

