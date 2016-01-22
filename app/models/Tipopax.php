<?php

class Tipopax extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $tipoPax_id;

    /**
     *
     * @var string
     */
    protected $tipoPax_nombre;

    /**
     * Method to set the value of field tipoPax_id
     *
     * @param integer $tipoPax_id
     * @return $this
     */
    public function setTipopaxId($tipoPax_id)
    {
        $this->tipoPax_id = $tipoPax_id;

        return $this;
    }

    /**
     * Method to set the value of field tipoPax_nombre
     *
     * @param string $tipoPax_nombre
     * @return $this
     */
    public function setTipopaxNombre($tipoPax_nombre)
    {
        $this->tipoPax_nombre = $tipoPax_nombre;

        return $this;
    }

    /**
     * Returns the value of field tipoPax_id
     *
     * @return integer
     */
    public function getTipopaxId()
    {
        return $this->tipoPax_id;
    }

    /**
     * Returns the value of field tipoPax_nombre
     *
     * @return string
     */
    public function getTipopaxNombre()
    {
        return $this->tipoPax_nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('tipoPax_id', 'Alojamiento', 'alojamiento_tipoPaxId', array('alias' => 'Alojamiento'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipopax';
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
