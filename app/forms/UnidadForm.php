<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 01/09/2015
 * Time: 9:57
 */
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Radio;
class UnidadForm extends \Phalcon\Forms\Form{
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
        /*----------------- HIGIENE DE LAS INSTALACIONES -------------------*/

        $higiene = new RadioGroup("unidad_puntajeHigieneId", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item',
            'required'=>'true'
        ]);
        $higiene->setLabel('Higiene de las instalaciones');
        $this->add($higiene);
        /*----------------- EQUIPAMIENTO -------------------*/
        $equipamiento = new RadioGroup("unidad_puntajeEquipoId", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
            ,
            'required'=>'true'
        ]);
        $equipamiento->setLabel('Equipamiento');
        $this->add($equipamiento);
        /*----------------- CONFORT -------------------*/
        $confort = new RadioGroup("unidad_puntajeConfortId", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item',
            'required'=>'true'
        ]);
        $equipamiento->setLabel('Confort');
        $this->add($confort);
        /*----------------- INCONVENIENTES -------------------*/
        $unidad_inconveniente = new RadioGroup("unidad_tieneInconvenientes", [
            'elements' => array('SI','NO'),
            'class' => 'pure-button button-white segment-item sub-items'
        ]);
        $unidad_inconveniente->setLabel('Hubo algún inconveniente?');
        $unidad_inconveniente->setChecked(1);
        $this->add($unidad_inconveniente);
        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("unidad_comentario",
            array(
                'maxlength'   => 200,
                'placeholder' => 'INGRESE SU COMENTARIO (máx. 200 caracteres)',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setLabel('Comentarios');
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);

    }
}