<?php
use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Bienvenidos');
        parent::initialize();
        //cargar los js para la vista de esta función
        $this->assets
            ->collection('footer');
    }
    public function indexAction()
    {
        $continuar = true;
        $this->assets
            ->collection('footer')->addJs('js/tooltip.js');
        $encuestaForm   = new EncuestaForm();
        $personalForm   = new PersonalForm();
        $recepcionForm  = new RecepcionForm();
        $unidadForm     = new UnidadForm();
        if ($this->request->isPost()) {
            $data           = $this->request->getPost();

            $encuesta       = new Encuesta();
            $personal       = new Personal();
            $recepcion      = new Recepcion();
            $unidad         = new Unidad();

            try{
                $this->db->begin();
                //$manager = new \Phalcon\Mvc\Model\Transaction\Manager();
                //$transaction = $manager->get();
                //Validando los formularios
                if (($encuestaForm->isValid($data) != false)
                    &&($personalForm->isValid($data) != false)
                    &&($recepcionForm->isValid($data) != false)
                    &&($unidadForm->isValid($data) != false)) {
                    /*----------------------------------------------PERSONAL-----------------------------------------------------*/
                    //Persisitendo personal, recepcion, unidad para recuperar los id.
                    //$personal->setTransaction($transaction);
                    $personal->assign(array(
                        'personal_tratoAdministrativo'  => $this->request->getPost('personal_tratoAdministrativo'),
                        'personal_tratoMucamas'         =>  $this->request->getPost('personal_tratoMucamas'),
                        'personal_comentarios'          =>  $this->request->getPost('personal_comentarios')
                    ));
                    if (!$personal->save()) {
                        $continuar = false;
                        $this->flash->error($personal->getMessages());
                       // $transaction->rollback("Personal no ha sido persistida");

                    }
                    /*----------------------------------------------RECEPCION----------------------------------------------------*/
                    if($continuar)
                    {
                        //recepcion->setTransaction($transaction);
                        $recepcion->assign(array(
                            'recepcion_nivelDesempeno'      => $this->request->getPost('recepcion_nivelDesempeno'),
                            'recepcion_tiempoRespuesta'     =>  $this->request->getPost('recepcion_tiempoRespuesta'),
                            'recepcion_tratoYCordialidad'   =>  $this->request->getPost('recepcion_tratoYCordialidad'),
                            'recepcion_inconvenientes'      =>  $this->request->getPost('recepcion_inconvenientes'),
                            'recepcion_comentarios'         =>  $this->request->getPost('recepcion_comentarios'),
                        ));
                        if (!$recepcion->save()) {
                            $continuar = false;
                            $this->flash->error($recepcion->getMessages());
                            //$transaction->rollback("Recepcion no ha sido persistida");
                        }
                    }
                    /*----------------------------------------------UNIDAD-------------------------------------------------------*/
                    if($continuar)
                    {
                        //$unidad->setTransaction($transaction);
                        $unidad->assign(array(
                            'puntaje_higiene'       => $this->request->getPost('puntaje_higiene'),
                            'puntaje_equipamiento'  =>  $this->request->getPost('puntaje_equipamiento'),
                            'puntaje_confort'       =>  $this->request->getPost('puntaje_confort'),
                            'unidad_inconveniente'  =>  $this->request->getPost('unidad_inconveniente'),
                            'unidad_comentarios'    =>  $this->request->getPost('unidad_comentarios'),
                        ));
                        if (!$unidad->save()) {
                            $continuar = false;
                            $this->flash->error($unidad->getMessages());
                            //$transaction->rollback("Unidad no ha sido persistida");

                        }
                    }
                    /*--------------------------------------------ENCUESTA-------------------------------------------------------*/
                    if($continuar)
                    {
                        //Validando aquellos datos de los formularios que no estan en los Validators
                        $cadena = $this->validarEncuesta($data);
                        if(!empty($cadena) || trim($cadena)!=""){
                            $continuar = false;
                            $this->flash->error($cadena);

                        }else{echo "VALIDO";
                           // $encuesta->setTransaction($transaction);
                            $encuesta->assign(array(
                                'encuesta_nroUnidad' => $this->request->getPost('encuesta_nroUnidad'),
                                'encuesta_cantDias' =>  $this->request->getPost('encuesta_cantDias'),
                                'encuesta_tipoPax' =>  $this->request->getPost('encuesta_tipoPax'),
                                'encuesta_fechaEstadia' =>  $this->request->getPost('encuesta_fechaEstadia'),
                                'encuesta_primeraVisita' =>  $this->request->getPost('encuesta_primeraVisita'),
                                'recepcion_id' =>  $recepcion->recepcion_id,
                                'personal_id' =>  $unidad->unidad_id,
                                'unidad_id' =>  $personal->personal_id,
                                'composicion_id' =>  $this->request->getPost('composicion_id'),
                                'encuesta_otroComposicionGrupo' =>  $this->request->getPost('encuesta_otroComposicionGrupo'),
                                'reservacion_id' =>  $this->request->getPost('reservacion_id'),
                                'encuesta_otroDondeReservo' =>  $this->request->getPost('encuesta_otroDondeReservo'),
                                'encuesta_otroComoSeInforma' =>  $this->request->getPost('encuesta_otroComoSeInforma'),
                                'motivo_id' => $this->request->getPost('motivo_id'),
                                'encuesta_observacion' =>  $this->request->getPost('encuesta_observacion'),
                            ));

                            if (!$encuesta->save()) {
                                $continuar = false;
                                $this->flash->error($encuesta->getMessages());
                               // $transaction->rollback("Encuesta no ha sido persistida");
                            }
                            else{
                                //Si encuesta se pudo persistir, se debera persistir encuesta_informacion
                                /*--------------------- RELACIONES ------------------------*/
                                //relacion entre encuesta e informacion
                                //$encuestaInformacion->setTransaction($transaction);
                                $listaInformacion = $this->request->getPost("informacion_id");
                                if (!empty($listaInformacion)) {
                                    foreach ($listaInformacion as $informacion_id) {//Recorro la lista de checkbox
                                        $encuestaInformacion = new Encuestainformacion();
                                        $encuestaInformacion->encuesta_id = $encuesta->encuesta_id;
                                        $encuestaInformacion->informacion_id = $informacion_id;
                                        if ($encuestaInformacion->save() == false) {
                                            $continuar = false;
                                            $this->flash->error("ENCUESTA_INFORMACION");
                                            //$transaction->rollback("La relacion Encuesta Informacion no pudo ser persistida");
                                        }
                                    }
                                }

                                //relacion entre encuesta y complejo

                                //$encuestaComplejo->setTransaction($transaction);
                                $listaComplejo = $this->request->getPost("complejo_id");
                                if (!empty($listaComplejo)) {
                                    foreach ($listaComplejo as $complejo_id) {//Recorro la lista de checkbox
                                        $encuestaComplejo = new Encuestacomplejo();
                                        $encuestaComplejo->encuesta_id = $encuesta->encuesta_id;
                                        $encuestaComplejo->complejo_id = $complejo_id;
                                        if ($encuestaComplejo->save() == false) {
                                            $continuar = false;
                                            $this->flash->error("ENCUESTA_COMPLEJO");
                                           //$transaction->rollback("La relacion Encuesta Complejo no pudo ser persistida");
                                        }
                                    }
                                }
                                else{
                                    //Si no selecciono ningun complejo, se guardara la primera opcion "NO"
                                    $encuestaComplejo = new Encuestacomplejo();
                                    $encuestaComplejo->encuesta_id = $encuesta->encuesta_id;
                                    $encuestaComplejo->complejo_id = 1;
                                    if ($encuestaComplejo->save() == false) {
                                        $continuar= false;
                                        $this->flash->error("ENCUESTA_COMPLEJO");
                                        //$transaction->rollback("La relacion Encuesta Complejo (NO) no pudo ser persistida");
                                    }
                                }
                            }
                        }
                    }
                    /*------------------------------------------ COMMIT/ROLLBACK-------------------------------------------------*/
                    if($continuar){
                        $recepcionForm->clear();
                        $unidadForm->clear();
                        $personalForm->clear();
                        $encuestaForm->clear();
                        //$transaction->commit();
                        $this->db->commit();
                        return $this->redireccionar("sorteo/index");
                    }
                    else{
                        $this->db->rollback();

                    }

                }
            }
            catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
                $this->flash->error('Transaccion Fallida: ', $e->getMessage());
            }
            catch (\Exception $e) {
                $this->flash->error('Transaccion Fallida2: ', $e->getMessage());
            }

        }

        $this->view->encuestaForm   = $encuestaForm;
        $this->view->personalForm   = $personalForm;
        $this->view->recepcionForm  = $recepcionForm;
        $this->view->unidadForm     = $unidadForm;

    }

    private function validarEncuesta($data)
    {//4 es OTRO
        $retorno ="";
        if ($data['reservacion_id'] == 4 && ($data['encuesta_otroDondeReservo'] == null || $data['encuesta_otroDondeReservo'] == '')) {
            $retorno.="<div class='obligatorio'><strong>[*] Ingrese el lugar en donde realizó la reserva. </strong></div>";
        }
        if($data['composicion_id'] == 4 && ($data['encuesta_otroComposicionGrupo'] == null || $data['encuesta_otroComposicionGrupo'] == '')) {
            $retorno.="<div class='obligatorio'><strong>[*] Ingrese como está compuesto su grupo. </strong></div>";
        }

        return $retorno;
    }

}

