<?php

class Conocimientoadicional extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $conocimiento_id;

    /**
     *
     * @var integer
     */
    protected $adicional_id;

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
     * Method to set the value of field adicional_id
     *
     * @param integer $adicional_id
     * @return $this
     */
    public function setAdicionalId($adicional_id)
    {
        $this->adicional_id = $adicional_id;

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
     * Returns the value of field adicional_id
     *
     * @return integer
     */
    public function getAdicionalId()
    {
        return $this->adicional_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('adicional_id', 'Adicional', 'adicional_id', array('alias' => 'Adicional'));
        $this->belongsTo('conocimiento_id', 'Conocimiento', 'conocimiento_id', array('alias' => 'Conocimiento'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'conocimientoadicional';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Conocimientoadicional[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Conocimientoadicional
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
