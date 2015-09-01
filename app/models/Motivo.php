<?php

class Motivo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $motivo_id;

    /**
     *
     * @var string
     */
    public $motivo_nombre;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'motivo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Motivo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Motivo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
