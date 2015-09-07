<?php

class Encuestacomplejo extends \Phalcon\Mvc\Model
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
    public $complejo_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('complejo_id', 'Complejo', 'complejo_id', array('alias' => 'Complejo'));
        $this->belongsTo('encuesta_id', 'Encuesta', 'encuesta_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'encuestacomplejo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuestacomplejo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuestacomplejo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
