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
            array_push($descripcionPuntaje,$item->puntaje_descripcion."&nbsp; &nbsp;");
        }
        /*----------------- PERSONAL DE ADMINISTRACION -------------------*/
        $personal = new RadioGroup("personal_tratoAdministrativo", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
        /*
        $personal->setFilters([
            'striptags',
            'trim'
        ]);

        $personal->addValidators([
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
        $personal->setChecked(2);

        $this->add($personal);
        /*----------------- MUCAMAS -------------------*/


        $mucamas = new RadioGroup("personal_tratoMucamas", [
            'elements' => $descripcionPuntaje,
            'class' => 'pure-button button-white segment-item'
        ]);
/*
        $mucamas->setFilters([
            'striptags',
            'trim'
        ]);

        $mucamas->addValidators([
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
        $mucamas->setChecked(2);

        $this->add($mucamas);
        /*----------------- COMENTARIOS -------------------*/
        $comentarios = new \Phalcon\Forms\Element\TextArea("personal_comentarios",
            array(
                'maxlength'   => 150,
                'placeholder' => 'Ingrese su comentario...',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setLabel('Comentarios');
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);
    }
}