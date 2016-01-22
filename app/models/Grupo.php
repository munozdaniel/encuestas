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
    protected $grupo_nombre;

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
     * Method to set the value of field grupo_nombre
     *
     * @param string $grupo_nombre
     * @return $this
     */
    public function setGrupoNombre($grupo_nombre)
    {
        $this->grupo_nombre = $grupo_nombre;

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
     * Returns the value of field grupo_nombre
     *
     * @return string
     */
    public function getGrupoNombre()
    {
        return $this->grupo_nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('grupo_id', 'Adicional', 'adicional_grupoId', array('alias' => 'Adicional'));
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
