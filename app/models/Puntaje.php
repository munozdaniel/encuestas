<?php

class Puntaje extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $puntaje_id;

    /**
     *
     * @var string
     */
    protected $puntaje;

    /**
     * Method to set the value of field puntaje_id
     *
     * @param integer $puntaje_id
     * @return $this
     */
    public function setPuntajeId($puntaje_id)
    {
        $this->puntaje_id = $puntaje_id;

        return $this;
    }

    /**
     * Method to set the value of field puntaje
     *
     * @param string $puntaje
     * @return $this
     */
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    /**
     * Returns the value of field puntaje_id
     *
     * @return integer
     */
    public function getPuntajeId()
    {
        return $this->puntaje_id;
    }

    /**
     * Returns the value of field puntaje
     *
     * @return string
     */
    public function getPuntaje()
    {
        return $this->puntaje;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('puntaje_id', 'Personal', 'personal_puntajeAdministrativoId', array('alias' => 'Personal'));
        $this->hasMany('puntaje_id', 'Personal', 'personal_puntajeMucamaId', array('alias' => 'Personal'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_puntajeTratoId', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_puntajeNivelId', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_puntajeTiempoId', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Unidad', 'unidad_puntajeConfortId', array('alias' => 'Unidad'));
        $this->hasMany('puntaje_id', 'Unidad', 'unidad_puntajeHigieneId', array('alias' => 'Unidad'));
        $this->hasMany('puntaje_id', 'Unidad', 'unidad_puntajeEquipoId', array('alias' => 'Unidad'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'puntaje';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Puntaje[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Puntaje
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
