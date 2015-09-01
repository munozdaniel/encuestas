<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 01/09/2015
 * Time: 9:57
 */
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Radio;
class VillaUnidadForm extends \Phalcon\Forms\Form{
    /**
     * Inicializando el formulario de Villa La Angostura.
     * ( Con los datos de la tabla unidad )
     */
    public function initialize($entity = null, $options = array())
    {

        /*----------------- INCONVENIENTES -------------------*/
        $rbtInconvenienteSi = new Radio('rbtInconvenientesSi', array(
            'name' => 'inconvenientes',
            'value' => 0
        ));
        $this->add($rbtInconvenienteSi);
        $rbtInconvenienteNo= new Radio('rbtInconvenientesNo', array(
            'name' => 'inconvenientes',
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