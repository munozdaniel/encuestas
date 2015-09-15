<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;
use \Phalcon\Forms\Element\Radio;
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 01/09/2015
 * Time: 9:57
 */

class RecepcionForm extends \Phalcon\Forms\Form{
    /**
     * Inicializando el formulario de Villa La Angostura.
     * ( Con los datos de la tabla recepcion )
     */
    public function initialize($entity = null, $options = array())
    {
        /*----------------- NIVEL DE DESEMPEÑO -------------------*/
        /*$nivelDesempeno = new Select('nivelDesempeno', Puntaje::find(), array(
            'using'      => array('puntaje_id', 'puntaje_descripcion'),
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar',
            'emptyValue' => ''
        ));
        $nivelDesempeno->setLabel('Nivel de Desempeño');
        $this->add($nivelDesempeno);*/
        $listaPuntaje = Puntaje::find();
        $descripcionPuntaje = array();
        foreach($listaPuntaje as $item)
        {
            array_push($descripcionPuntaje,$item->puntaje_descripcion."&nbsp; &nbsp;");
        }
        $nivelDesempeno = new RadioGroup("recepcion_nivelDesempeno", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
/*
        $nivelDesempeno->setFilters([
            'striptags',
            'trim'
        ]);

        $nivelDesempeno->addValidators([
            new \Phalcon\Mvc\Model\Validator\StringLength([
                'min' => 1,
                'max' => 1,
                'messageMaximum' => 'Too many characters for Post Type field',
                'messageMinimum' => 'Post Type field cannot be empty',
                'cancelOnFail' => true
            ]),
            new \Phalcon\Mvc\Model\Validator\Regex([
                'pattern' => '/[a-z]/',
                'message' => 'Post Type contained out of bounds characters',
                'cancelOnFail' => true
            ]),
        ]);
*/
        $nivelDesempeno->setChecked(2);
        $this->add($nivelDesempeno);

        /*----------------- TIEMPO DE RESPUESTA -------------------*/
        $tiempoRespuesta = new RadioGroup("recepcion_tiempoRespuesta", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);

        $tiempoRespuesta->setChecked(2);

        $this->add($tiempoRespuesta);

        /*----------------- TRATO Y CORDIALIDAD -------------------*/
        $tratoCordialidad = new RadioGroup("recepcion_tratoYCordialidad", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);

        $tratoCordialidad->setChecked(2);
        $this->add($tratoCordialidad);

        /*----------------- INCONVENIENTES -------------------*/
        $recepcion_inconvenientes = new RadioGroup("recepcion_inconvenientes", [
            'elements' => array('SI','NO'),
            'class' => 'pure-button button-white segment-item sub-items'
        ]);

        $recepcion_inconvenientes->setChecked(1);
        $this->add($recepcion_inconvenientes);

        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("recepcion_comentarios",
            array(
                'maxlength'   => 240,
                'placeholder' => 'Ingrese su comentario...',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}