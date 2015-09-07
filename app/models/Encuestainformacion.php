<?php

class Encuestainformacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $encuesta_id;

    /**
     *
     * @var integer
     */
    public $informacion_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('informacion_id', 'Informacion', 'informacion_id', array('alias' => 'Informacion'));
        $this->belongsTo('encuesta_id', 'Encuesta', 'encuesta_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'encuestainformacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuestainformacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuestainformacion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
