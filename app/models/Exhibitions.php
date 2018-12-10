<?php

class Exhibitions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $ex_id;

    /**
     *
     * @var string
     */
    public $ex_name;

    /**
     *
     * @var string
     */
    public $start_date;

    /**
     *
     * @var string
     */
    public $end_date;

    /**
     *
     * @var integer
     */
    public $num_people;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("exhibitions");
        $this->hasManyToMany(
            'ex_id',
            'WasShowBy',
            'Exhibitions_ex_id','Art_Objects_id_no' ,
            'ArtObjects',
            'id_no'
        );
        $this->hasManyToMany(
            'ex_id',
            'WasBookBy',
            'Exhibitions_ex_id','Museum_Goer_goer_id' ,
            'MuseumGoer',
            'goer_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'exhibitions';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Exhibitions[]|Exhibitions|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Exhibitions|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
