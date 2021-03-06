<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 01/09/2015
 * Time: 12:41
 */
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Radio;
class PersonalForm extends \Phalcon\Forms\Form{
    /**
     * Inicializando el formulario de Villa La Angostura.
     * ( Con los datos de la tabla unidad )
     */
    public function initialize($entity = null, $options = array())
    {
        $listaPuntaje = Puntaje::find();
        $descripcionPuntaje = array();
        foreach($listaPuntaje as $item)
        {
            array_push($descripcionPuntaje,$item->getPuntajeNombre()."&nbsp; &nbsp;");
        }
        /*----------------- PERSONAL DE ADMINISTRACION -------------------*/
        $personal = new RadioGroup("personal_puntajeAdministrativoId", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item',
            'required'=>'true'
        ]);
        $personal->setLabel("Personal de Administración");
        $this->add($personal);
        /*----------------- MUCAMAS -------------------*/
        $mucamas = new RadioGroup("personal_puntajeMucamaId", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item',
            'required'=>'true'
        ]);
        $mucamas->setLabel("Mucamas");
        $this->add($mucamas);
        /*----------------- COMENTARIOS -------------------*/
        $elemento = new \Phalcon\Forms\Element\Select('personal_tieneInconvenientes',  array('0'=>'NO','1'=>'SI'), array(
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar ',
            'emptyValue' => '',
            'class'      => ' ',
            'required'=>'true',
            'onchange'=>'asignarRequired()'
        ));
        $elemento->setLabel('Hubo algún inconveniente?');
        $this->add($elemento);
        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("personal_comentario",
            array(
                'maxlength'   => 200,
                'placeholder' => 'INGRESE SU COMENTARIO (máx. 200 caracteres)',
                'rows'=>'4' ,'class'=>'col-xs-12 col-md-6 col-md-offset-3'
            ));
        $comentarios->setLabel('Comentarios');
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}