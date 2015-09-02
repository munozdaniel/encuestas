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

class VillaRecepcionForm extends \Phalcon\Forms\Form{
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
        $nivelDesempeno = new RadioGroup("nivelDesempeno", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);

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


        $this->add($nivelDesempeno);
        /*----------------- TIEMPO DE RESPUESTA -------------------*/
        $tiempoRespuesta = new RadioGroup("tiempoRespuesta", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);

        $tiempoRespuesta->setFilters([
            'striptags',
            'trim'
        ]);

        $tiempoRespuesta->addValidators([
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


        $this->add($tiempoRespuesta);
        /*$tiempoRespuesta = new Select('tiempoRespuesta', Puntaje::find(), array(
            'using'      => array('puntaje_id', 'puntaje_descripcion'),
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar',
            'emptyValue' => ''
        ));
        $tiempoRespuesta->setLabel('Tiempo de Respuesta');
        $this->add($tiempoRespuesta);*/

        /*----------------- TRATO Y CORDIALIDAD -------------------*/
        $tratoCordialidad = new RadioGroup("tratoCordialidad", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);

        $tratoCordialidad->setFilters([
            'striptags',
            'trim'
        ]);

        $tratoCordialidad->addValidators([
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


        $this->add($tratoCordialidad);

        /*----------------- INCONVENIENTES -------------------*/
        $rbtInconvenienteSi = new Radio('rbtInconvenienteSi', array(
            'name' => 'inconvenientesRecepcion',
            'value' => 0
        ));
        $this->add($rbtInconvenienteSi);
        $rbtInconvenienteNo= new Radio('rbtInconvenienteNo', array(
            'name' => 'inconvenientesRecepcion',
            'value' => 1
        ));
        $this->add($rbtInconvenienteNo);

        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("comentarios",
            array(
                'maxlength'   => 240,
                'placeholder' => 'Ingrese su comentario...',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}