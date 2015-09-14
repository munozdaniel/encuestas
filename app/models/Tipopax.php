<?php

class Tipopax extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $tipoPax_id;

    /**
     *
     * @var string
     */
    public $tipoPax_nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("'tipoPax'");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipoPax';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tipopax[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tipopax
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
