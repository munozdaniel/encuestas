<?php

class Sorteo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $sorteo_id;

    /**
     *
     * @var string
     */
    protected $sorteo_nombreApellido;

    /**
     *
     * @var string
     */
    protected $sorteo_correo;

    /**
     *
     * @var string
     */
    protected $sorteo_telefono;

    /**
     *
     * @var string
     */
    protected $sorteo_ciudad;

    /**
     *
     * @var integer
     */
    protected $sorteo_habilitado;

    /**
     *
     * @var integer
     */
    protected $sorteo_participa;

    /**
     * Method to set the value of field sorteo_id
     *
     * @param integer $sorteo_id
     * @return $this
     */
    public function setSorteoId($sorteo_id)
    {
        $this->sorteo_id = $sorteo_id;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_nombreApellido
     *
     * @param string $sorteo_nombreApellido
     * @return $this
     */
    public function setSorteoNombreapellido($sorteo_nombreApellido)
    {
        $this->sorteo_nombreApellido = $sorteo_nombreApellido;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_correo
     *
     * @param string $sorteo_correo
     * @return $this
     */
    public function setSorteoCorreo($sorteo_correo)
    {
        $this->sorteo_correo = $sorteo_correo;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_telefono
     *
     * @param string $sorteo_telefono
     * @return $this
     */
    public function setSorteoTelefono($sorteo_telefono)
    {
        $this->sorteo_telefono = $sorteo_telefono;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_ciudad
     *
     * @param string $sorteo_ciudad
     * @return $this
     */
    public function setSorteoCiudad($sorteo_ciudad)
    {
        $this->sorteo_ciudad = $sorteo_ciudad;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_habilitado
     *
     * @param integer $sorteo_habilitado
     * @return $this
     */
    public function setSorteoHabilitado($sorteo_habilitado)
    {
        $this->sorteo_habilitado = $sorteo_habilitado;

        return $this;
    }

    /**
     * Method to set the value of field sorteo_participa
     *
     * @param integer $sorteo_participa
     * @return $this
     */
    public function setSorteoParticipa($sorteo_participa)
    {
        $this->sorteo_participa = $sorteo_participa;

        return $this;
    }

    /**
     * Returns the value of field sorteo_id
     *
     * @return integer
     */
    public function getSorteoId()
    {
        return $this->sorteo_id;
    }

    /**
     * Returns the value of field sorteo_nombreApellido
     *
     * @return string
     */
    public function getSorteoNombreapellido()
    {
        return $this->sorteo_nombreApellido;
    }

    /**
     * Returns the value of field sorteo_correo
     *
     * @return string
     */
    public function getSorteoCorreo()
    {
        return $this->sorteo_correo;
    }

    /**
     * Returns the value of field sorteo_telefono
     *
     * @return string
     */
    public function getSorteoTelefono()
    {
        return $this->sorteo_telefono;
    }

    /**
     * Returns the value of field sorteo_ciudad
     *
     * @return string
     */
    public function getSorteoCiudad()
    {
        return $this->sorteo_ciudad;
    }

    /**
     * Returns the value of field sorteo_habilitado
     *
     * @return integer
     */
    public function getSorteoHabilitado()
    {
        return $this->sorteo_habilitado;
    }

    /**
     * Returns the value of field sorteo_participa
     *
     * @return integer
     */
    public function getSorteoParticipa()
    {
        return $this->sorteo_participa;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('sorteo_id', 'Encuesta', 'encuesta_sorteoId', array('alias' => 'Encuesta'));
    }

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
