<?php

class WasShowBy extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $art_Objects_id_no;

    /**
     *
     * @var string
     */
    public $exhibitions_ex_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("was_show_by");
        $this->belongsTo(
            'Exhibitions_ex_id',
            'Exhibitions',
            'ex_id'
        );
        $this->belongsTo(
            'Art_Objects_id_no',
            'ArtObjects',
            'id_no'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'was_show_by';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WasShowBy[]|WasShowBy|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WasShowBy|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
