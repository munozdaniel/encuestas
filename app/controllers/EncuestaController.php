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
            return $this->forward("encuesta/index");
        }
        //Verifico que los datos ingresados cumplan con las validaciones.
        $form = new VillaEncuestaForms();
        $encuesta = new Encuesta();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $encuesta)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('encuesta/index');
        }

    }
}

