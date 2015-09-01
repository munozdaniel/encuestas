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
        $nivelDesempeno = new Select('nivelDesempeno', Puntaje::find(), array(
            'using'      => array('puntaje_id', 'puntaje_descripcion'),
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar',
            'emptyValue' => ''
        ));
        $nivelDesempeno->setLabel('Nivel de Desempeño');
        $this->add($nivelDesempeno);

        /*----------------- TIEMPO DE RESPUESTA -------------------*/
        $tiempoRespuesta = new Select('tiempoRespuesta', Puntaje::find(), array(
            'using'      => array('puntaje_id', 'puntaje_descripcion'),
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar',
            'emptyValue' => ''
        ));
        $tiempoRespuesta->setLabel('Tiempo de Respuesta');
        $this->add($tiempoRespuesta);

        /*----------------- TRATO Y CORDIALIDAD -------------------*/
        $tratoCordialidad = new Select('tratoCordialidad', Puntaje::find(), array(
            'using'      => array('puntaje_id', 'puntaje_descripcion'),
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar',
            'emptyValue' => ''
        ));
        $tratoCordialidad->setLabel('Tiempo de Respuesta');
        $this->add($tratoCordialidad);

        /*----------------- INCONVENIENTES -------------------*/
        $rbtInconvenienteSi = new Radio('rbtRecepcionInconSi', array(
            'name' => 'inconvenientesRecepcion',
            'value' => 0
        ));
        $this->add($rbtInconvenienteSi);
        $rbtInconvenienteNo= new Radio('rbtRecepcionInconNo', array(
            'name' => 'inconvenientesRecepcion',
            'value' => 1
        ));
        $this->add($rbtInconvenienteNo);

        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new Text("comentarios",
            array(
                'maxlength'   => 150,
                'placeholder' => 'Ingrese su comentario...',
                'line-height'         => '450px',
            ));
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}