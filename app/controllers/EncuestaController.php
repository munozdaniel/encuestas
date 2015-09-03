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
    public function guardarVillaAction()
    {
        //Si no viene del submit retorno al inicio.
        if (!$this->request->isPost()) {
            return $this->redireccionar("encuesta/villa");
        }
        //Verifico que los datos ingresados cumplan con las validaciones.

        /*--------------------- VALIDAR ENCUESTA ------------------------*/
      /*  $encuestaForm   =   new VillaEncuestaForm();
        $encuesta = new Encuesta();

        $data = $this->request->getPost();
        if(!$encuestaForm->isValid($data,$encuesta)){
            foreach($encuestaForm->getMessages() as $message){
                $this->flash->error("Encuesta ".$message);
            }
            return $this->redireccionar('encuesta/villa');
        }

        $encuestaForm->clear();*/

        /*--------------------- VALIDAR RECEPCION ------------------------*/
       /* $recepcionForm  =   new VillaRecepcionForm();
        $recepcion = new Recepcion();
        if(!$recepcionForm->isValid($data,$recepcion)){
            foreach($recepcionForm->getMessages() as $message){
                $this->flash->error($message);
            }
            return $this->redireccionar('encuesta/villa');
        }
        $recepcionForm->clear();*/
        /*--------------------- VALIDAR UNIDAD ------------------------*/
        $unidadForm     =   new VillaUnidadForm();
        $unidad         =   new Unidad();
        $data = $this->request->getPost();

        if(!$unidadForm->isValid($data,$unidad)){
            foreach($unidadForm->getMessages() as $message){
                $this->flash->error($message);
            }
            return $this->redireccionar('encuesta/villa');
        }
        if ($unidad->save() == false) {//guuaaaaaattsss?? como corno obtuvo los valores del form?? magia negra.
            foreach ($unidad->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->redireccionar("encuesta/villa");
        }
        //$this->flash->error("INSERTADO: ID: ".$unidad->unidad_id );
        $unidadForm->clear();

        /*--------------------- VALIDAR PERSONAL ------------------------*/
       /* $personalForm   =   new VillaPersonalForm();
        if(!$personalForm->isValid($data,new Personal())){
            foreach($personalForm->getMessages() as $message){
                $this->flash->error($message);
            }
            return $this->redireccionar('encuesta/villa');
        }
        $personalForm->clear();*/


        //$this->flash->success("ENCUESTA ".$encuesta->encuesta_nroUnidad ." - DATA: ".$data['unidad'] );
        return $this->redireccionar("encuesta/villa");

    }
}

