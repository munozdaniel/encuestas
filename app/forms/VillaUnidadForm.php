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
        $listaPuntaje = Puntaje::find();
        $descripcionPuntaje = array();
        foreach($listaPuntaje as $item)
        {
            array_push($descripcionPuntaje,$item->puntaje_descripcion."&nbsp; &nbsp;");
        }
        /*----------------- HIGIENE DE LAS INSTALACIONES -------------------*/
        $higiene = new RadioGroup("puntaje_higiene", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
        //FIXME: PARA QUE SE UTILIZAN LOS FILTERS EN LOS RADIOBUTTONS?
        /*$higiene->setFilters([
            'striptags',
            'trim'
        ]);*/
        //FIXME: PARA QUE SE UTILIZAN LOS ADDVALIDATORS EN LOS RADIOBUTTONS?


        $higiene->setChecked(2);

        $this->add($higiene);
        /*----------------- EQUIPAMIENTO -------------------*/
        $equipamiento = new RadioGroup("puntaje_equipamiento", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
/*
        $equipamiento->setFilters([
            'striptags',
            'trim'
        ]);
*/


        $equipamiento->setChecked(2);

        $this->add($equipamiento);
        /*----------------- CONFORT -------------------*/


        $confort = new RadioGroup("puntaje_confort", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
/*
        $confort->setFilters([
            'striptags',
            'trim'
        ]);*/
/*
        $confort->addValidators([
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
        ]);*/

        $confort->setChecked(2);
        $this->add($confort);
        /*----------------- INCONVENIENTES -------------------*/
        /* $rbtInconvenienteSi = new Radio('rbtInconvenienteSi', array(
             'name' => 'unidad_inconveniente',
             'value' => 0
         ));
         $this->add($rbtInconvenienteSi);
         $rbtInconvenienteNo= new Radio('rbtInconvenienteNo', array(
             'name' => 'unidad_inconveniente',
             'value' => 1
         ));
         $rbtInconvenienteNo->setAttribute('checked',true);
         $this->add($rbtInconvenienteNo);
 */

         $unidad_inconveniente = new RadioGroup("unidad_inconveniente", [
             'elements' => array('SI','NO'),
             'class' => 'pure-button button-white segment-item'
         ]);

         $unidad_inconveniente->setChecked(1);
         $this->add($unidad_inconveniente);
        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("unidad_comentarios",
            array(
                'maxlength'   => 150,
                'placeholder' => 'Ingrese su comentario...',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}