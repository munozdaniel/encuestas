<?php

class Conocimiento extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $conocimiento_id;

    /**
     *
     * @var string
     */
    protected $conocimiento_nombre;

    /**
     * Method to set the value of field conocimiento_id
     *
     * @param integer $conocimiento_id
     * @return $this
     */
    public function setConocimientoId($conocimiento_id)
    {
        $this->conocimiento_id = $conocimiento_id;

        return $this;
    }

    /**
     * Method to set the value of field conocimiento_nombre
     *
     * @param string $conocimiento_nombre
     * @return $this
     */
    public function setConocimientoNombre($conocimiento_nombre)
    {
        $this->conocimiento_nombre = $conocimiento_nombre;

        return $this;
    }

    /**
     * Returns the value of field conocimiento_id
     *
     * @return integer
     */
    public function getConocimientoId()
    {
        return $this->conocimiento_id;
    }

    /**
     * Returns the value of field conocimiento_nombre
     *
     * @return string
     */
    public function getConocimientoNombre()
    {
        return $this->conocimiento_nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('conocimiento_id', 'Conocimientoadicional', 'conocimiento_id', array('alias' => 'Conocimientoadicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'conocimiento';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Conocimiento[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Conocimiento
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
