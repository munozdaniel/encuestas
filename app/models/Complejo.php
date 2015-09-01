<?php

class Complejo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $complejo_id;

    /**
     *
     * @var string
     */
    public $complejo_nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('complejo_id', 'Encuesta', 'complejo_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'complejo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Complejo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Complejo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
