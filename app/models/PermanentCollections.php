<?php

class PermanentCollections extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $date_acquired;

    /**
     *
     * @var string
     */
    public $status;

    /**
     *
     * @var string
     */
    public $cost;

    /**
     *
     * @var string
     */
    public $art_Objects_id_no;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("permanent_collections");
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
        return 'permanent_collections';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PermanentCollections[]|PermanentCollections|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PermanentCollections|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
