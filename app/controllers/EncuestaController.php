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
     * Muestra un formulario cuyo datos se guardan la tabla Sorteo.
     */
    public function sorteoAction()
    {
        $form = new SorteoForm();
        $this->view->form = $form;
    }
    /**
      * Muestra un formulario cuyo datos se guardan la tabla Sorteo.
     */
    public function participarAction()
    {
        $this->assets
            ->collection('footer')->addJs('js/tooltip.js');

        $form = new SorteoForm();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {
                $sorteo = new Sorteo();
                $sorteo->assign(array(
                    'sorteo_nombreApellido' => $this->request->getPost('sorteo_nombreApellido', 'striptags'),
                    'sorteo_correo' => $this->request->getPost('sorteo_correo'),
                    'sorteo_telefono' =>  $this->request->getPost('sorteo_telefono'),
                    'sorteo_ciudad' =>  $this->request->getPost('sorteo_ciudad')
                ));
                if ($sorteo->save()) {
                    return $this->redireccionar('encuesta/registrado');
                }
                $this->flash->error($sorteo->getMessages());
            }
        }
        $this->view->form = $form;
    }
    /**
     *  Muestra la vista felicitando al usuario por su logro por participar en el sorteo.
     */
    public function registradoAction()
    {
            //Vacio
    }


}

