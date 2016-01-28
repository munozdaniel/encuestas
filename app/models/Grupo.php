<?php

class Grupo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $grupo_id;

    /**
     *
     * @var string
     */
    protected $grupo_respuesta;

    /**
     *
     * @var string
     */
    protected $grupo_otro;

    /**
     *
     * @var integer
     */
    protected $grupo_adicionalId;

    /**
     * Method to set the value of field grupo_id
     *
     * @param integer $grupo_id
     * @return $this
     */
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;

        return $this;
    }

    /**
     * Method to set the value of field grupo_respuesta
     *
     * @param string $grupo_respuesta
     * @return $this
     */
    public function setGrupoRespuesta($grupo_respuesta)
    {
        $this->grupo_respuesta = $grupo_respuesta;

        return $this;
    }

    /**
     * Method to set the value of field grupo_otro
     *
     * @param string $grupo_otro
     * @return $this
     */
    public function setGrupoOtro($grupo_otro)
    {
        $this->grupo_otro = $grupo_otro;

        return $this;
    }

    /**
     * Method to set the value of field grupo_adicionalId
     *
     * @param integer $grupo_adicionalId
     * @return $this
     */
    public function setGrupoAdicionalid($grupo_adicionalId)
    {
        $this->grupo_adicionalId = $grupo_adicionalId;

        return $this;
    }

    /**
     * Returns the value of field grupo_id
     *
     * @return integer
     */
    public function getGrupoId()
    {
        return $this->grupo_id;
    }

    /**
     * Returns the value of field grupo_respuesta
     *
     * @return string
     */
    public function getGrupoRespuesta()
    {
        return $this->grupo_respuesta;
    }

    /**
     * Returns the value of field grupo_otro
     *
     * @return string
     */
    public function getGrupoOtro()
    {
        return $this->grupo_otro;
    }

    /**
     * Returns the value of field grupo_adicionalId
     *
     * @return integer
     */
    public function getGrupoAdicionalid()
    {
        return $this->grupo_adicionalId;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('grupo_id', 'Grupoadicional', 'grupo_id', array('alias' => 'Grupoadicional'));
        $this->belongsTo('grupo_adicionalId', 'Adicional', 'adicional_id', array('alias' => 'Adicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'grupo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Grupo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Grupo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
