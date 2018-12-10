<?php

class Painting extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $paint_type;

    /**
     *
     * @var string
     */
    public $draw_on;

    /**
     *
     * @var string
     */
    public $style;

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
        $this->setSource("painting");
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
        return 'painting';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Painting[]|Painting|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Painting|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
