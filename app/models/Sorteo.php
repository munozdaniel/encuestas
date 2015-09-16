<?php

class Sorteo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sorteo_id;

    /**
     *
     * @var string
     */
    public $sorteo_nombreApellido;

    /**
     *
     * @var string
     */
    public $sorteo_correo;

    /**
     *
     * @var string
     */
    public $sorteo_telefono;

    /**
     *
     * @var string
     */
    public $sorteo_ciudad;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sorteo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sorteo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sorteo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
