<?php

class Personal extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $personal_id;

    /**
     *
     * @var integer
     */
    public $personal_tratoAdministrativo;

    /**
     *
     * @var integer
     */
    public $personal_tratoMucamas;

    /**
     *
     * @var string
     */
    public $personal_comentarios;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('personal_tratoMucamas', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('personal_tratoAdministrativo', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'personal';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
