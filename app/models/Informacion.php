<?php

class Informacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $informacion_id;

    /**
     *
     * @var string
     */
    protected $informacion_nombre;

    /**
     * Method to set the value of field informacion_id
     *
     * @param integer $informacion_id
     * @return $this
     */
    public function setInformacionId($informacion_id)
    {
        $this->informacion_id = $informacion_id;

        return $this;
    }

    /**
     * Method to set the value of field informacion_nombre
     *
     * @param string $informacion_nombre
     * @return $this
     */
    public function setInformacionNombre($informacion_nombre)
    {
        $this->informacion_nombre = $informacion_nombre;

        return $this;
    }

    /**
     * Returns the value of field informacion_id
     *
     * @return integer
     */
    public function getInformacionId()
    {
        return $this->informacion_id;
    }

    /**
     * Returns the value of field informacion_nombre
     *
     * @return string
     */
    public function getInformacionNombre()
    {
        return $this->informacion_nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('informacion_id', 'Adicional', 'adicional_informacionId', array('alias' => 'Adicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'informacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Informacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Informacion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
