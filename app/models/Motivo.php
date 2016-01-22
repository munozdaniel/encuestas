<?php

class Motivo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $motivo_id;

    /**
     *
     * @var string
     */
    protected $motivo_nombre;

    /**
     * Method to set the value of field motivo_id
     *
     * @param integer $motivo_id
     * @return $this
     */
    public function setMotivoId($motivo_id)
    {
        $this->motivo_id = $motivo_id;

        return $this;
    }

    /**
     * Method to set the value of field motivo_nombre
     *
     * @param string $motivo_nombre
     * @return $this
     */
    public function setMotivoNombre($motivo_nombre)
    {
        $this->motivo_nombre = $motivo_nombre;

        return $this;
    }

    /**
     * Returns the value of field motivo_id
     *
     * @return integer
     */
    public function getMotivoId()
    {
        return $this->motivo_id;
    }

    /**
     * Returns the value of field motivo_nombre
     *
     * @return string
     */
    public function getMotivoNombre()
    {
        return $this->motivo_nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('motivo_id', 'Adicional', 'adicional_motivoId', array('alias' => 'Adicional'));
    }

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
