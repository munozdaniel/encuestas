<?php

class Composicion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $composicion_id;

    /**
     *
     * @var string
     */
    public $composicion_nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('composicion_id', 'Encuesta', 'composicion_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'composicion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Composicion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Composicion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
